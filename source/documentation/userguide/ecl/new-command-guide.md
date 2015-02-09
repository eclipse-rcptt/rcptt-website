---
title: New Command Guide
slug: ecl/new-command-guide
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

In this guide we show different ways of extending an existing ECL commands functionality, such as:

<ul>
<li>Retrieve an existing method of Java Object with <b>get-object | invoke</b> commands</li>
<li>Create static methods and use it with <b>invoke-static</b> command</li>
<li>Create your own custom ECL command</li>
</ul>

<h2>Use <i>invoke</i> command to call an existing method of Java object.</h2>

Let's say we need to resize a window with given width and height.  There is now such a command in ECL script, 
but we know that there is a corresponding <b><i>setSize(int width, int height)</i></b> method for Window Object. 

So using {{m.eclCommand("get-object")}} and {{m.eclCommand("invoke")}} ECL commands we can call this method:

<div class="panel panel-default">
  <div class="panel-body">
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-invoke-1.png"></img>
</div>
</div>
</div>

You can define <a href ="{{site.url}}/userguide/procedures">ECL procedure</a>, to make it more convenient:

<div class="panel panel-default">
  <div class="panel-body">
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-invoke-2.png"></img>
</div>
</div>
</div>

<h2>Create your own custom ECL command</h2>

We are going to show how to create custom ECL commands. As an example we create two ECL commands for Eclipse Views. 
First one will show us all registered views in our Eclipse. And the second one will open specified view by ID.

<h3>Import RCPTT sources plugins</h3>

First of all you need to import RCPTT sources plugins from <a href="http://git.eclipse.org/c/rcptt/org.eclipse.rcptt.git/">RCPTT Git repository</a>

<h3>Create Plug-in Project</h3>

First of all we'll create new plugin project for our ECL commands called <b>org.eclipse.rcptt.ecl.example.view</b>. 
You can use any existing plug-in as well.

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-1.png"></img>
</div>


<h3>Define EMF model for ECL command</h3>

We need to create two EMF classes to show registered plugins with ECL:

<ul><li><b>ShowViews</b> which will be used as an ECL command. This EClass should extend <b>Command</b> EClass from the <b>org.eclipse.rcptt.ecl.core/model/ecl.ecore</b> package</li>
<li><b>View</b> which will be used to store view details. It should contains three string properties: id, label and description.</li>
</ul>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-4.png"></img>
</div>

If you're not experienced EMF user you can find detailed instruction on the <a href="{{site.url}}/documentation/userguide/ecl/define-emf-model/">Define EMF model for ShowViews command</a> page.

<h3>Implement ShowViews command</h3>

Now we need to implement ECL command. Make sure you have all necessary dependencies:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-7.png"></img>
</div>

<h4>Implement ICommandService interface</h4>

Add new class <b>ShowViewsService</b> which implements <b>org.eclipse.rcptt.ecl.runtime.ICommandService</b> interface as shown below:

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

As you can see the implementation is very simple. We use platform <b>IViewRegistry</b> to collect details of Eclise Views and store this information using EMF View objects. 
Then we write collected information to the output pipe. Note that view service will be executed using Eclipse Jobs, so we use Workbench Display to access view info in the UI thread.

<h4>Register ECL command implementation</h4>

Finally we need to register our service using <b>org.eclipse.rcptt.ecl.core.scriptlet</b> extension point:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-8.png"></img>
</div>
<ul>
<li><b>name</b> - name of the EClass which we use for ECL command</li>
<li><b>namespace</b> - EMF Package URI</li>
<li><b>class</b> - command implementation class. Should implement <b>ICommandService</b> interface</li>
</ul>

By default name of the command EClass will be transformed to the ECL command name. For example, in our case commands will be named show-views.
 However you can override this name using <b>friendly_name</b> part of the <b>org.eclipse.rcptt.ecl.core.scriptlet</b> extension point.
 
 <h3>Use show-views command</h3>
 
 <ul>
<li>Let's start new Eclipse instance with the following plugins installed:</li>

<ul>
<li><b>org.eclipse.rcptt.ecl.example.view</b></li>
<li><b>org.eclipse.rcptt.ecl.core</b></li>
<li><b>org.eclipse.rcptt.ecl.parser</b></li>
<li><b>org.eclipse.rcptt.ecl.shell</b></li>
<li><b>org.eclipse.rcptt.ecl.telnet.server</b></li>
<li><b>org.eclipse.rcptt.ecl.telnet.server.ui</b></li>
<li><b>org.eclipse.rcptt.tesla.jface.fragment</b></li>
<li><b>org.eclipse.rcptt.tesla.swt.fragment</b></li>
</ul>


<li>Connect to the ECL telnet server started in this Eclipse (on the 2323 port by default) using any telnet client</li>
<li>Enter show-views command</li>


<li>As a result of your command you will see something like this:</li>
</ul>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-12.png"></img>
</div>

<h3>Add show-view command</h3>

In the previous sections we discussed how to collect information from Eclipse using ECL. 
Now let's add another command which will open some view by id.

<h4>Add ShowView EClass</h4>

Create one more EClass called <b>ShowView</b> with one string field <b>id</b>. This is ECL command and should 
extend <b>Command</b> EClass.

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-10.png"></img>
</div>

<h4>Implement ShowView command</h4>

Add <b>ShowViewService</b> java class:

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

Finally we need to register new command through <b>org.eclipse.rcptt.ecl.core.scriptlet</b> extension point:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-9.png"></img>
</div>

<h4>Use show-view command</h4>

Now we can run our plugin and open necessary view by id:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-13.png"></img>
</div>
<br>
By the way, you can use <b>show-views</b> command to find id of a view you want to open.

<div class="panel panel-danger">
  <div class="panel-heading">Important!</div>
  <div class="panel-body">
    Please note that to make your new custom command work you need to include a plugin with your custom command into your AUT configuration. 
  </div>
  </div>
