---
title: New Command Guide
slug: new-command-guide
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: ecl
---

In this guide we show different ways of extending an existing ECL commands functionality, such as:

<ul>
- Retrieve an existing method of Java Object with **get-object | invoke** commands</li>
- Create static methods and use it with **invoke-static** command</li>
- Create your own custom ECL command</li>
</ul>

<h2>Use *invoke* command to call an existing method of Java object.</h2>

Let's say we need to resize a window with given width and height.  There is now such a command in ECL script, 
but we know that there is a corresponding <b>*setSize(int width, int height)*</b> method for Window Object. 

So using {{< eclCommand get-object >}} and {{< eclCommand invoke >}} ECL commands we can call this method:

<div class="panel panel-default">
  <div class="panel-body">
![](screenshot-invoke-1.png)
</div>
</div>

You can define <a href ="{{site.url}}/userguide/procedures">ECL procedure</a>, to make it more convenient:

<div class="panel panel-default">
  <div class="panel-body">
![](screenshot-invoke-2.png)
</div>
</div>

<h2>Create your own custom ECL command</h2>

We are going to show how to create custom ECL commands. As an example we create two ECL commands for Eclipse Views. 
First one will show us all registered views in our Eclipse. And the second one will open specified view by ID.

### Import RCPTT sources plugins

First of all you need to import RCPTT sources plugins from <a href="http://git.eclipse.org/c/rcptt/org.eclipse.rcptt.git/">RCPTT Git repository</a>

### Create Plug-in Project

First of all we'll create new plugin project for our ECL commands called **org.eclipse.rcptt.ecl.example.view**. 
You can use any existing plug-in as well.

![](screenshot-new-command-guide-1.png)


### Define EMF model for ECL command

We need to create two EMF classes to show registered plugins with ECL:

<ul><li>**ShowViews</b> which will be used as an ECL command. This EClass should extend <b>Command</b> EClass from the <b>org.eclipse.rcptt.ecl.core/model/ecl.ecore** package</li>
- **View** which will be used to store view details. It should contains three string properties: id, label and description.</li>
</ul>

![](screenshot-new-command-guide-4.png)

If you're not experienced EMF user you can find detailed instruction on the [Define EMF model for ShowViews command](../ecl/define-emf-model/) page.

### Implement ShowViews command

Now we need to implement ECL command. Make sure you have all necessary dependencies:

![](screenshot-new-command-guide-7.png)

<h4>Implement ICommandService interface</h4>

Add new class **ShowViewsService</b> which implements <b>org.eclipse.rcptt.ecl.runtime.ICommandService** interface as shown below:

<pre>
public class ShowViewsService implements ICommandService {
 
    @Override
    public IStatus service(Command command, IProcess context) throws InterruptedException, CoreException {
        final IWorkbench workbench = PlatformUI.getWorkbench();
        final List<View> views = new ArrayList<View>();
        workbench.getDisplay().syncExec(new Runnable() {
            @Override
            public void run() {
                for (IViewDescriptor descriptor : workbench.getViewRegistry().getViews()) {
                    View view = ViewFactory.eINSTANCE.createView();
                    view.setId(descriptor.getId());
                    view.setLabel(descriptor.getLabel());
                    view.setDescription(descriptor.getLabel());
                    views.add(view);
                }
            }
        });
        IPipe output = context.getOutput();
        for (View view : views) {
            output.write(view);
        }
        return Status.OK_STATUS;
    }
 
}</pre>

As you can see the implementation is very simple. We use platform **IViewRegistry** to collect details of Eclise Views and store this information using EMF View objects. 
Then we write collected information to the output pipe. Note that view service will be executed using Eclipse Jobs, so we use Workbench Display to access view info in the UI thread.

<h4>Register ECL command implementation</h4>

Finally we need to register our service using **org.eclipse.rcptt.ecl.core.scriptlet** extension point:

![](screenshot-new-command-guide-8.png)
<ul>
- **name** - name of the EClass which we use for ECL command</li>
- **namespace** - EMF Package URI</li>
- **class</b> - command implementation class. Should implement <b>ICommandService** interface</li>
</ul>

By default name of the command EClass will be transformed to the ECL command name. For example, in our case commands will be named show-views.
 However you can override this name using **friendly_name</b> part of the <b>org.eclipse.rcptt.ecl.core.scriptlet** extension point.
 
 ### Use show-views command
 
 <ul>
- Let's start new Eclipse instance with the following plugins installed:</li>

<ul>
- **org.eclipse.rcptt.ecl.example.view**</li>
- **org.eclipse.rcptt.ecl.core**</li>
- **org.eclipse.rcptt.ecl.parser**</li>
- **org.eclipse.rcptt.ecl.shell**</li>
- **org.eclipse.rcptt.ecl.telnet.server**</li>
- **org.eclipse.rcptt.ecl.telnet.server.ui**</li>
- **org.eclipse.rcptt.tesla.jface.fragment**</li>
- **org.eclipse.rcptt.tesla.swt.fragment**</li>
</ul>


- Connect to the ECL telnet server started in this Eclipse (on the 2323 port by default) using any telnet client</li>
- Enter show-views command</li>


- As a result of your command you will see something like this:</li>
</ul>

![](screenshot-new-command-guide-12.png)

### Add show-view command

In the previous sections we discussed how to collect information from Eclipse using ECL. 
Now let's add another command which will open some view by id.

<h4>Add ShowView EClass</h4>

Create one more EClass called **ShowView</b> with one string field <b>id**. This is ECL command and should 
extend **Command** EClass.

![](screenshot-new-command-guide-10.png)

<h4>Implement ShowView command</h4>

Add **ShowViewService** java class:

<pre>
public class ShowViewService implements ICommandService {
 
    @Override
    public IStatus service(Command command, IProcess context) throws InterruptedException, CoreException {
        ShowView view = (ShowView) command;
        final String id = view.getId();
        PlatformUI.getWorkbench().getDisplay().syncExec(new Runnable() {
 
            @Override
            public void run() {
                try {
                    PlatformUI.getWorkbench().getActiveWorkbenchWindow().getActivePage().showView(id);
                } catch (PartInitException e) {
                    throw new RuntimeException(e.getMessage(), e);
                }
            }
        });
        return Status.OK_STATUS;
    }
 
}
</pre>

We added this service specially for ShowView command, so we can freely cast specified command to ShowView interface. 
This allows us to get id of the view we need to open. Next we use Eclipse Platform API to open view by id in the UI thread.

<h4>Register ShowView command</h4>

Finally we need to register new command through **org.eclipse.rcptt.ecl.core.scriptlet** extension point:

![](screenshot-new-command-guide-9.png)

<h4>Use show-view command</h4>

Now we can run our plugin and open necessary view by id:

![](screenshot-new-command-guide-13.png)
<br>
By the way, you can use **show-views** command to find id of a view you want to open.

<div class="panel panel-danger">
  <div class="panel-heading">Important!</div>
  <div class="panel-body">
    Please note that to make your new custom command work you need to include a plugin with your custom command into your AUT configuration. 
  </div>
  </div>
