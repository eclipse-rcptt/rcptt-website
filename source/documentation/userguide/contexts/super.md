---
title: Super Contexts
slug: contexts/super
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

<h3>Introduction</h3>

A test case in RCPTT consists of two parts:

<ul>

<li>list of contexts, defining an application state</li>
<li>ECL script describing UI actions and validating that application behavior in given state is correct.</li>
</ul>
In some cases it might be required to execute same actions with just a few variances in initial state or arguments 
of script commands. Common examples are:
<ul>
<li>Test case verifies that a project can be built. An executed action is just a verification that Problems view is empty,
 but this should be done for several different projects. We can say that we have the same behavior for different states of workspace.</li>
<li>Test case verifies some form (like a validation of new Java Class dialog). We execute basically the same actions 
(type values in fields and check error message), but with different command arguments.</li>
</ul>
So we have added supercontexts which can be used to cover both of scenarios above. A supercontext is a list of contexts 
of the same type, which can be refered in test cases just as usual contexts, but during an execution, a test case will
 be executed several times with each of these contexts. In this blog post we are going to describe how to create test cases
  for two examples mentioned above.
  
<h3>First example - building Java projects</h3>

We are going to create a test case which verifies that Problems view contains no errors for the following states of a workspace:
<ul>
<li>empty workspace</li>
<li>empty Java project</li>
<li>"Hello, World!" Java project</li>
<li>two referencing Java projects</li>
</ul>


We start with a creation of a usual test case which verifies that Problems view contains no errors.  

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-super-context-1.png"></img>
</div>

Next, we create three more workspace contexts:
<ul>
<li>Empty Java Project</li>
<li>HelloWorld java Project</li>
<li>Two Java Projects</li>

</ul>
Then we create a new workspace supercontext (by selecting New -> Super Context) in a context menu in Test Explorer and add all 
our four workspace contexts into it: 

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-super-context-editor-2.png"></img>
</div>

Now we can get back to originally created test case and replace Emtpy Workspace context with Workspaces supercontext.
 If we execute this test case, an Execution view shows it has been executed four times, each time with different workspace context:
 
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-super-context-3.png"></img>
</div>

<h3>Second example - validating New Java Project dialog</h3>

For the next test case we are going to reuse Java Perspective workbench context and HelloWorld Java Project workspace context.

We record a filling values in New Java project and validating an error message:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-super-context-script-example.png"></img>
</div>
<br>
Now we need to parameterize it - at first we create Parameters context "Valid Input" with parameters we are going to change:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-super-context-4.png"></img>
</div>

At second we replace string values in script with <b>$paramName</b> and adding parameters context to a test case:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-super-context-5.png"></img>
</div>

And the rest is straightforward - create parameters context for each set of input values, put them into parameters supercontext and put this supercontext into testcase.

Once test case is executed, we can see that all inputs were iterated:
<br>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-super-context-6.png"></img>
</div>

<h3>More about supercontexts</h3>

If a test case refers to more that one supercontext, then all possible combinations of tuples from these supercontexts 
will be used. For instance, for our example above if we would like to check that all these Java projects can be built both 
with Java 1.6 and Java 1.5 compiler settings, we could create Preferences supercontext with two contexts <b>1.6</b> and <b>1.5</b>, add 
it to a test case, so that it will be executed 8 times and Execution view would show a list like this:
<ul>
<li>No Build Errors (Empty Workspace, 1.5)</li>
<li>No Build Errors (Empty Workspace, 1.6)</li>
<li>No Build Errors (Empty Java Project, 1.5)</li>
<li>No Build Errors (Empty Java Project, 1.6)</li>
<li>No Build Errors (HelloWorld Java Project, 1.5)</li>
<li>No Build Errors (HelloWorld Java Project, 1.6)</li>
<li>No Build Errors (Two Java Projects, 1.5)</li>
<li>No Build Errors (Two Java Projects, 1.6)</li>
</ul>

 In case we need to iterate over context pairs without this 'cartesian product' 
 (like, workspace context and parameters context specific for this workspace), this can be done by 
 creating a single group supercontext, referencing to several group contexts. For instance, if we create a test case 
 which validates a build error count, then we can have a structure like this:
<ul>
 <li>build errors (group supercontext)</li>
<ul><li>one build error (group context)</li>
<ul><li>workspace1 (workspace context)</li>
<li>params1 (params context)</li></ul>
<li>two build errors (group context)</li>
<ul><li>workspace2 (workspace context)</li>
<li>params2 (params context)</li>
</ul>
</ul>
</ul> 
<h3>Conclusion</h3>
Supercontexts are powerful but might be hard for inexperienced users. In case when there are only a few variances of a test case which are 
unlikely to be changed, it might be much more easier and faster to create few separate test cases instead of dealing with parameterization.
