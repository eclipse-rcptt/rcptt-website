---
title: Getting Started
slug: getstarted
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

To get an impression what it looks like to work with RCPTT, you'll need the following:

- RCP Testing Tool IDE ([download it here](https://eclipse.org/rcptt/download)).
- Eclipse-based application to test. This guide assumes that you are using Eclipse Classic standard package, which can be downloaded from [Eclipse downloads](http://eclipse.org/downloads).

### Launch RCPTT IDE
Just like usual Eclipse packages, RCPTT IDE does not require installation and can be just unpacked anywhere. So, at first download and unpack RCPTT IDE and your application-under-test somewhere on disk and launch RCPTT IDE.

When you launch RCPTT IDE, you'll be prompted for a workspace location. If you don't know what is workspace in a context of Eclipse application, then just choose the default one (which is rcpttWorkspace folder in your Home directory).

### Add an application-under-test
To be able to record and replay tests in an application, RCPTT IDE should launch application by itself. To add an application-under-test, go to <span class="uiElement"><img src="{{site.url}}/shared/img/ui-applications.gif"></img> Applications</span> view and click <span class="uiElement"><img src="{{site.url}}/shared/img/ui-new-aut.gif"></img> New&#8230;</span> button on View toolbar (alternatively, you may right-click anywhere inside a view and choose <span class="uiElement"><img src="{{site.url}}/shared/img/ui-new-aut.gif"></img> New&#8230;</span> in a context menu).

In a dialog open, browse for an application-under-test (AUT) location on a disk. Once RCPTT IDE analyzes an AUT, it will automatically set its name to AUT's product id, however you may change it to whatever you like.

Click <span class="uiElement">Finish</span> in a wizard and double-click newly created application-under-test to launch it. Now we are ready to create a first test case.

### Creating new test case
RCPTT stores test cases just as usual files on a file system, so that they can be easily stored in version control system, copied, merged between branches, etc. So in order to create a test case, it is required to create an RCPTT Project first.

Go to <span class="uiElement">File &#8594; New &#8594; <img src="{{site.url}}/shared/img/ui-rcptt-project.png"></img> RCP Testing Tool Project&#8230;</span>, type any name, for example **First Project**, and click <span class="uiElement">Finish</span>.

Once a project is created, right-click it in <span class="uiElement"><img src="{{site.url}}/shared/img/ui-workspace.gif"></img> Test Explorer</span> and select <span class="uiElement">New &#8594; <img src="{{site.url}}/shared/img/ui-test.gif"></img> Test Case</span>. Again, type any name, like **First Test**, and click <span class="uiElement">Finish</span>.

### Record a test case

RCPTT focuses on a productivity, and RCPTT team puts a great effort to make recorder as best as possible. So while it is possible to write a test script by hads, typically it is much faster to simply record actions and assertions, and then modify recorded script if necessary.

While it might sound a bit boring, as we are starting from scratch, let's create a very simple test case, which creates new Java project and makes sure that this project contains an empty source folder. Before starting recording, make sure that AUT is in *Java* perspective (don't worry, we'll show how to make sure test case automatically runs with necessary perspective pretty soon).

To make it easier for others to understand what a test case does, we can put a description of test case intention and performed actions into <span class="uiElement">Description</span> section of a test case. Also we can change its name in an editor to **New Java Project** (note that once you save a test case, the name in <span class="uiElement">Test Explorer</span> updates accordingly).

To start test case recording, simply click a <span class="uiElement"><img src="{{site.url}}/shared/img/ui-record.gif"></img> Record</span> button in test case editor. Once RCPTT goes to recording mode, the main RCPTT window minimizes itself and shows a [Control Panel](#), so it is more convenient to interact with an application-under-test. 

So, once recording started, simply do the following actions:

1. Select <span class="uiElement">File &#8594; New &#8594; Java Project</span> in main menu
2. Type <kbd>sample</kbd> into project name field
3. Click Finish
4. Once project is created, expand it in <span class="uiElement">Package Explorer</span>. 

Note that <span class="uiElement">Control Panel</span> contents is getting updated with recorded actions, but it doesn't include a tree item expansion action, as it assumes that this action is not really important enough.

Once we recorded actions, we also need to assert the state of the UI to make sure that the result of our actions is what we expect. To do this, we need to switch to *Assertion Mode* on Control Panel toolbar (). Once in Assertion mode, you can click on any UI element on a screen and get an <span class="uiElement">Assertion Window</span> with element's properties. At this point, we are interested in **src/** folder, so click on it, check an **itemCount** in Assertion Window, and click <span class="uiElement"><img src="{{site.url}}/shared/img/ui-add.gif"></img> Add</span> button.

Once we are done, go to Control Panel toolbar, <span class="uiElement"><img src="{{site.url}}/shared/img/ui-stop.gif"></img> Stop</span>, <span class="uiElement"><img src="{{site.url}}/shared/img/ui-save.gif"></img> Save</span> and <span class="uiElement"><img src="{{site.url}}/shared/img/ui-home.gif"></img> Return to RCPTT</span>.


Now, let's replay the resulting test, but before make sure to manually remove project <kbd>sample</kbd> from AUT's workspace and file system &ndash; we'll cover how to eleminate this manual step in a few minutes.

To replay a test case, simply click a <span class="uiElement">Replay <img src="{{site.url}}/shared/img/ui-replay.gif"></img></span> button in a test case editor. An <span class="uiElement"><img src="{{site.url}}/shared/img/ui-execution-view.png"></img> Execution</span> view will display test result.

### ECL Script Intro
Before we go to <a href="{{site.url}}/documentation/userguide/contexts/">Contexts</a>, let's take a look at recorded script:

{% set snippet %}
get-menu "File/New/Java Project" | click
with [get-window "New Java Project"] {
    get-editbox -after [get-label "Project name:"] | set-text sample
    get-button Finish | click
}
get-view "Package Explorer" | get-tree | get-item "sample/src"
    | get-property childCount | equals 0 | verify-true
{% endset %}

{{m.ecl("#{snippet}")}}

It's probably is understandable intuitively, but here's a brief description how does it work. A scripting language we use, <a href="{{site.url}}/documentation/userguide/ecl/">ECL</a> (which stands for Eclipse Command Language), is inspired by TCL and Powershell, and it consists of commands, connected by pipes.

A command takes some input, arguments and optionally writes something to an output. A pipe ({{m.eclInline("|")}}) can be used to redirect an output of the left command to the input of the right command. So, a line {{m.eclInline('get-menu "File/New/Java Project" | click')}} works like this:

1. {{m.eclInline("get-menu")}} command accepts a menu path (with segments separated by slashes) as an argument. Since there is no input (i.e. it is a first command in a pipeline), it assumes that given menu path addresses an application's main menu. So it makes sure that such menu path exists, and writes a reference to this menu item into its output.
2. {{m.eclInline("click")}} command takes a control reference from its input and sends events to emulate user's click

Next, get on a next line of a script, {{m.eclInline("with")}} command. Here we can see two important things:

1. An *output* of a command can be passed as an argument to another command by using square braces (i.e. {{m.eclInline("[some-command]")}}).
2. A *command* itself can be passed as an argument to another command by using curly braces (i.e. {{m.eclInline("{ some-command }")}}).

So, the {{m.eclInline("with")}} command works like this:

1. Takes an *object* as a first argument
2. Takes a *script* (just a sequence of pipelines) as a second argument
3. Executes a *script* by prepending an *object* to an output of each command.

In our test case above, a reference to a window is passed as an input to all commands in with-block, so that we don't need to explicitly tell each command that it should use a window as an input.

Another use of square braces in a script above, is identifying an editbox ({{m.eclInline('get-editbox -after [get-label "Project name:"]')}}</code>). When we locate a textual input, we cannot rely on its text contents, so we are identifying it by its relative location to a label, hence we pass a label control (output of {{m.eclInline("get-label")}} command) as an argument to {{m.eclInline("get-editbox")}}. Also this line illustrates that commands may have named arguments, here {{m.eclInline("-after")}} is an argument name, while {{m.eclInline("[get-label ...]")}} is argument value.

The last line, which has been recorded when we clicked <span class="uiElement"><img src="{{site.url}}/shared/img/ui-add.gif"></img> Add</span> button in an <span class="uiElement">Assertion Window</span>, should be pretty understandable now -- it takes a property from an object and verifies that its value is what we expect.

### Contexts
While creating and running our test case, we had to make manual actions to make sure that our test case passes, and we promised to show how to eleminate it to make a test case fully automated. So, two things we need to fix, are the following:

1. Make sure that there's no project <kbd>sample</kbd> in Workspace
2. Make sure that current perspective is Java

In other words, our test case makes certain assumptions about an application state, and we need somehow to make sure that an application state matches to test case expectations. For this purpose, RCPTT has <a href="{{site.url}}/documentation/userguide/contexts/">contexts</a>. There are several different types of contexts, which describe different parts of an application state, but in this guide we'll focus on two of them &ndash; [Workspace]({{site.url}}/documentation/userguide/contexts/workspace/) and [Workbench]({{site.url}}/documentation/userguide/contexts/workbench/).

### Workspace Context
As it can be guessed by its name, Workspace Context is used to describe a state of an application's workspace. To create a workspace context, follow these steps:

1. Right-click RCPTT project in <span class="uiElement">Test Explorer</span>.
2. Select <span class="uiElement">New &#8594; <img src="{{site.url}}/shared/img/ui-context.gif"></img>Context </span>. 
3. In a <span class="uiElement">New Context Wizard</span>, type <kbd>Empty Workspace</kbd> as a context name and select <span class="uiElement"><img src="{{site.url}}/shared/img/ui-workspace.gif"></img> Workspace</span>.
4. Click <span class="uiElement">Finish</span>.

You can see in workspace context editor that it is empty by default and it has an option <span class="uiElement">Clear workspace</span> turned on by default, so we don't need to do anything else with it, we just need to associate our test case with this context.

There are two ways to do that with a test case editor:

- Use <span class="uiElement"><img src="{{site.url}}/shared/img/ui-add.gif"></img> Add&#8230;</span> button on a <span class="uiElement">Contexts</span> section toolbar and select required context from context selection dialog.
- Expand <span class="uiElement">Contexts</span> section, drag a context from <span class="uiElement">Test Explorer</span> and drop a context inside.

It is not necessary to run a test case to see a context in action &ndash; use <span class="uiElement"><img src="{{site.url}}/shared/img/ui-replay.gif"></img> Apply</span> button in context editor to see how a context affects an application state. In our case, we can see that applying an empty workspace context indeed removes all projects from application workspace.

### Workbench Context
Workbench context is used to describe a state of an application Workbench &ndash; which perspective is currently active and which views and editors are open. For our test case we need to specify that Java perpspective is open. To create a workbench context describing this, do the following:

1. As with workspace context, create a new context named <kbd>Java Perspective</kbd> of <span class="uiElement"><img src="{{site.url}}/shared/img/ui-workbench.gif"></img> Workbench</span> type.
2. In workbench context editor, use <span class="uiElement"><img src="{{site.url}}/shared/img/ui-capture.gif"></img> Capture</span> button to make a snapshot of a current application state. Assuming that Java perspective is open, the contents of a workbench text editor should be populated with a Java perspective and open views.

Now, once a test case refers to two contexts, we don't need to do any manual steps to make test case passing &ndash; it can be successfully replayed several times in a row.

Contexts are highly important for RCPTT test cases and greately improve QA Engineer productivity and overall reliability of test base. 

- *Contexts can be reused* &ndash; multiple test cases can refer to the same context. Thus it is possible to create a set of contexts describing an application state and create as many test cases starting from this state as necessary.
- *Contexts isolate test cases from each other* &ndash; if some test case fails, it won't affect further test cases, allowing to get rid of false negative results.

### Conclusion
In this guide we have covered how to add and launch an application under test, how to create and record test cases, how to add assertions for properties of UI elements, how a test script looks like, how to create and capture contexts and add them to test cases. For more information on these topics, browse a documentation reference using a navigation tree on a left.
