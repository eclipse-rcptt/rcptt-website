---
title: Getting Started
slug: getstarted
sidebar:
- userguide
menu:
  sidebar:
    identifier: getstarted
    parent: userguide
---

To get an impression what it looks like to work with RCPTT, you'll need the following:

- RCP Testing Tool IDE ([download it here](../../downloads)).
- Eclipse-based application to test. This guide assumes that you are using Eclipse Classic standard package, which can be downloaded from [Eclipse downloads](http://eclipse.org/downloads).

### Launch RCPTT IDE
Just like usual Eclipse packages, RCPTT IDE does not require installation and can be just unpacked anywhere. So, at first download and unpack RCPTT IDE and your application-under-test somewhere on disk and launch RCPTT IDE.

When you launch RCPTT IDE, you'll be prompted for a workspace location. If you don't know what is workspace in a context of Eclipse application, then just choose the default one (which is rcpttWorkspace folder in your Home directory).

### Add an application-under-test
To be able to record and replay tests in an application, RCPTT IDE should launch application by itself. To add an application-under-test, go to {{< uielement ui-applications.gif >}} Applications view {{< / uielement >}} and click {{< uielement ui-new-aut.gif >}} New&#8230;{{< / uielement >}} button on View toolbar (alternatively, you may right-click anywhere inside a view and choose {{< uielement ui-new-aut.gif >}} New&#8230;{{< / uielement >}} in a context menu).

In a dialog open, browse for an application-under-test (AUT) location on a disk. Once RCPTT IDE analyzes an AUT, it will automatically set its name to AUT's product id, however you may change it to whatever you like.

Click {{< uielement >}}Finish{{< / uielement >}} in a wizard and double-click newly created application-under-test to launch it. Now we are ready to create a first test case.

### Creating new test case
RCPTT stores test cases just as usual files on a file system, so that they can be easily stored in version control system, copied, merged between branches, etc. So in order to create a test case, it is required to create an RCPTT Project first.

Go to {{< uielement >}}File &#8594; New &#8594; {{< uielement ui-rcptt-project.png >}} RCP Testing Tool Project&#8230; {{< / uielement >}}{{< / uielement >}}, type any name, for example **First Project**, and click {{< uielement >}}Finish{{< / uielement >}}.

Once a project is created, right-click it in {{< uielement ui-workspace.gif >}} Test Explorer{{< / uielement >}} and select {{< uielement >}}New &#8594; {{< uielement ui-test.gif >}} Test Case{{< / uielement >}}{{< / uielement >}}. Again, type any name, like **First Test**, and click {{< uielement >}}Finish{{< / uielement >}}.

### Record a test case

RCPTT focuses on a productivity, and RCPTT team puts a great effort to make recorder as best as possible. So while it is possible to write a test script by hads, typically it is much faster to simply record actions and assertions, and then modify recorded script if necessary.

While it might sound a bit boring, as we are starting from scratch, let's create a very simple test case, which creates new Java project and makes sure that this project contains an empty source folder. Before starting recording, make sure that AUT is in *Java* perspective (don't worry, we'll show how to make sure test case automatically runs with necessary perspective pretty soon).

To make it easier for others to understand what a test case does, we can put a description of test case intention and performed actions into {{< uielement >}}Description{{< / uielement >}} section of a test case. Also we can change its name in an editor to **New Java Project** (note that once you save a test case, the name in {{< uielement >}}Test Explorer{{< / uielement >}} updates accordingly).

To start test case recording, simply click a {{< uielement ui-record.gif >}} Record{{< / uielement >}} button in test case editor. Once RCPTT goes to recording mode, the main RCPTT window minimizes itself and shows a [Control Panel](#), so it is more convenient to interact with an application-under-test. 

So, once recording started, simply do the following actions:

1. Select {{< uielement >}}File &#8594; New &#8594; Java Project{{< / uielement >}} in main menu
2. Type {{< kbd >}}sample{{< / kbd >}} into project name field
3. Click Finish
4. Once project is created, expand it in {{< uielement >}}Package Explorer{{< / uielement >}}. 

Note that {{< uielement >}}Control Panel{{< / uielement >}} contents is getting updated with recorded actions, but it doesn't include a tree item expansion action, as it assumes that this action is not really important enough.

Once we recorded actions, we also need to assert the state of the UI to make sure that the result of our actions is what we expect. To do this, we need to switch to *Assertion Mode* on Control Panel toolbar (). Once in Assertion mode, you can click on any UI element on a screen and get an {{< uielement >}}Assertion Window{{< / uielement >}} with element's properties. At this point, we are interested in **src/** folder, so click on it, check an **itemCount** in Assertion Window, and click {{< uielement ui-add.gif >}} Add{{< / uielement >}} button.

Once we are done, go to Control Panel toolbar, {{< uielement ui-stop.gif >}} Stop{{< / uielement >}}, {{< uielement ui-save.gif >}} Save{{< / uielement >}} and {{< uielement ui-home.gif >}} Return to RCPTT{{< / uielement >}}.


Now, let's replay the resulting test, but before make sure to manually remove project {{< kbd >}}sample{{< / kbd >}} from AUT's workspace and file system &ndash; we'll cover how to eleminate this manual step in a few minutes.

To replay a test case, simply click a {{< uielement ui-replay.gif >}} Replay{{< / uielement >}} button in a test case editor. An {{< uielement ui-execution-view.png >}} Execution{{< / uielement >}} view will display test result.

### ECL Script Intro
Before we go to [Contexts](../contexts/), let's take a look at recorded script:

```ecl
get-menu "File/New/Java Project" | click
with [get-window "New Java Project"] {
    get-editbox -after [get-label "Project name:"] | set-text sample
    get-button Finish | click
}
get-view "Package Explorer" | get-tree | get-item "sample/src"
    | get-property childCount | equals 0 | verify-true

```


It's probably understandable intuitively, but here's a brief description how of it works. A scripting language we use, [ECL](../ecl/) (which stands for Eclipse Command Language), is inspired by TCL and Powershell, and it consists of commands, connected by pipes.

A command takes some input, arguments and optionally writes something to an output. A pipe ({{< highlightInline ecl >}}|{{< / highlightInline >}}) can be used to redirect an output of the left command to the input of the right command. So, a line {{< highlightInline ecl >}}get-menu "File/New/Java Project" | click{{< / highlightInline >}} works like this:

1. {{< highlightInline ecl >}}get-menu{{< / highlightInline >}} command accepts a menu path (with segments separated by slashes) as an argument. Since there is no input (i.e. it is a first command in a pipeline), it assumes that given menu path addresses an application's main menu. So it makes sure that such menu path exists, and writes a reference to this menu item into its output.
2. {{< highlightInline ecl >}}click{{< / highlightInline >}} command takes a control reference from its input and sends events to emulate user's click

Next, get on a next line of a script, {{< highlightInline ecl >}}with{{< / highlightInline >}} command. Here we can see two important things:

1. An *output* of a command can be passed as an argument to another command by using square braces (i.e. {{< highlightInline ecl >}}[some-command]{{< / highlightInline >}}).
2. A *command* itself can be passed as an argument to another command by using curly braces (i.e. {{< highlightInline ecl >}}{ some-command }{{< / highlightInline >}}).

So, the {{< highlightInline ecl >}}with{{< / highlightInline >}} command works like this:

1. Takes an *object* as a first argument
2. Takes a *script* (just a sequence of pipelines) as a second argument
3. Executes a *script* by prepending an *object* to an output of each command.

In our test case above, a reference to a window is passed as an input to all commands in with-block, so that we don't need to explicitly tell each command that it should use a window as an input.

Another use of square braces in a script above, is identifying an editbox ({{< highlightInline ecl >}}get-editbox -after [get-label "Project name:"]{{< / highlightInline >}}). When we locate a textual input, we cannot rely on its text contents, so we are identifying it by its relative location to a label, hence we pass a label control (output of {{< highlightInline ecl >}}get-label{{< / highlightInline >}} command) as an argument to {{< highlightInline ecl >}}get-editbox{{< / highlightInline >}}. Also this line illustrates that commands may have named arguments, here {{< highlightInline ecl >}}-after{{< / highlightInline >}} is an argument name, while {{< highlightInline ecl >}}[get-label ...]{{< / highlightInline >}} is argument value.

The last line, which has been recorded when we clicked {{< uielement ui-add.gif >}} Add{{< / uielement >}} button in an {{< uielement >}}Assertion Window{{< / uielement >}}, should be pretty understandable now -- it takes a property from an object and verifies that its value is what we expect.

### Contexts
While creating and running our test case, we had to make manual actions to make sure that our test case passes, and we promised to show how to eleminate it to make a test case fully automated. So, two things we need to fix, are the following:

1. Make sure that there's no project {{< kbd >}}sample{{< / kbd >}} in Workspace
2. Make sure that current perspective is Java

In other words, our test case makes certain assumptions about an application state, and we need somehow to make sure that an application state matches to test case expectations. For this purpose, RCPTT has [contexts](../contexts/). There are several different types of contexts, which describe different parts of an application state, but in this guide we'll focus on two of them &ndash; [Workspace]({{site.url}}/documentation/userguide/contexts/workspace/) and [Workbench]({{site.url}}/documentation/userguide/contexts/workbench/).

### Workspace Context
As it can be guessed by its name, Workspace Context is used to describe a state of an application's workspace. To create a workspace context, follow these steps:

1. Right-click RCPTT project in {{< uielement >}}Test Explorer{{< / uielement >}}.
2. Select {{< uielement >}}New &#8594; {{< uielement ui-context.gif>}}Context{{< / uielement >}}{{< / uielement >}}. 
3. In a {{< uielement >}}New Context Wizard{{< / uielement >}}, type {{< kbd >}}Empty Workspace{{< / kbd >}} as a context name and select {{< uielement ui-workspace.gif >}} Workspace{{< / uielement >}}.
4. Click {{< uielement >}}Finish{{< / uielement >}}.

You can see in workspace context editor that it is empty by default and it has an option {{< uielement >}}Clear workspace{{< / uielement >}} turned on by default, so we don't need to do anything else with it, we just need to associate our test case with this context.

There are two ways to do that with a test case editor:

- Use {{< uielement ui-add.gif >}} Add&#8230;{{< / uielement >}} button on a {{< uielement >}}Contexts{{< / uielement >}} section toolbar and select required context from context selection dialog.
- Expand {{< uielement >}}Contexts{{< / uielement >}} section, drag a context from {{< uielement >}}Test Explorer{{< / uielement >}} and drop a context inside.

It is not necessary to run a test case to see a context in action &ndash; use {{< uielement ui-replay.gif >}} Apply{{< / uielement >}} button in context editor to see how a context affects an application state. In our case, we can see that applying an empty workspace context indeed removes all projects from application workspace.

### Workbench Context
Workbench context is used to describe a state of an application Workbench &ndash; which perspective is currently active and which views and editors are open. For our test case we need to specify that Java perpspective is open. To create a workbench context describing this, do the following:

1. As with workspace context, create a new context named {{< kbd >}}Java Perspective{{< / kbd >}} of {{< uielement ui-workbench.gif >}} Workbench{{< / uielement >}} type.
2. In workbench context editor, use {{< uielement ui-capture.gif >}} Capture{{< / uielement >}} button to make a snapshot of a current application state. Assuming that Java perspective is open, the contents of a workbench text editor should be populated with a Java perspective and open views.

Now, once a test case refers to two contexts, we don't need to do any manual steps to make test case passing &ndash; it can be successfully replayed several times in a row.

Contexts are highly important for RCPTT test cases and greately improve QA Engineer productivity and overall reliability of test base. 

- *Contexts can be reused* &ndash; multiple test cases can refer to the same context. Thus it is possible to create a set of contexts describing an application state and create as many test cases starting from this state as necessary.
- *Contexts isolate test cases from each other* &ndash; if some test case fails, it won't affect further test cases, allowing to get rid of false negative results.

### Conclusion
In this guide we have covered how to add and launch an application under test, how to create and record test cases, how to add assertions for properties of UI elements, how a test script looks like, how to create and capture contexts and add them to test cases. For more information on these topics, browse a documentation reference using a navigation tree on a left.
