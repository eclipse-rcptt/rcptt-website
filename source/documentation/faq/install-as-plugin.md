---
title: Can RCPTT be installed as Eclipse plugin?
slug: faq/install-as-plugin
nav_name: faq
layout: faq
---

{% import "macros" as m %}

RCPTT consists of two parts - RCPTT IDE, which is used for launching AUTs, developing and running test cases, 
and RCPTT Runtime (hidden), which is automatically put inside AUT in order to provide recording/replaying of user actions.

RCPTT IDE can be installed as an Eclipse plug-in (from marketplace or update site), but only into Eclipse 3.7 Indigo, as it uses some internal APIs. 
Installing RCPTT IDE into Eclipse allows you to launch your AUT from sources.

RCPTT Runtime supports all Eclipse versions from 3.5 to 4.4

If you want to use RCPTT to connect to AUT from sources, then you should be able to do it like this:

<ol>
<li>Install RCPTT into Eclipse 3.7</li>
<li>Set target platform to Eclipse 4.3</li>
<li>Checkout your sources and create Eclipse Application launch configuration as you would normally do.</li>
<li>In Run->Run configurations dialog find an 'Eclipse Application under Test' launch configuration type, create a new one and on launch configuration property page select your existing Eclipse Application launch configuration.
If you switch to RCPTT perspective then, you should be able to see your AUT in Applications view and launch it.</li>
</ol>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">Juno/Luna/Kepler IDE integration planned at some time ?</h3>
  </div>
  <div class="panel-body">
    We plan to support current Eclipse release, and probably will start with Luna or Kepler. You can design tests and run them for all versions of Eclipse with RCPTT. 
    No restrictions on this.
  </div>
</div>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">If AUT from sources launching fails with error message: No org.eclipse.equinox.weaving.hook plugin</h3>
  </div>
  <div class="panel-body">
    Solutions:<br><br>

<ol>
<li>If you open your target platforms in preferences, you can see a copy of your configured target, created with RCPTT. 
Remove it and launch configuration with RCPTT again (target platform should be recreated).
</li>
<li>
Copy four plugins from <br><br>

<ul>

<li>rcptt/plugins/org.eclipse.rcptt.updates.aspectj.e3x_&lt;version>/dependencies/plugins (from Eclipse 3.4 to 3.7) </li>
<li>rcptt/plugins/org.eclipse.rcptt.updates.aspectj.e38x_&lt;version>/dependencies/plugins (from Eclipse 3.8 to 4.3) </li>
<li>rcptt/plugins/org.eclipse.rcptt.updates.aspectj.e44x_&lt;version>/dependencies/plugins (from Eclipse 4.4 and higher) </li><br>
</ul>
right into eclipse/plugins folder(or whatever where Equinox plugins are located):<br><br>

<ul>
<li>org.eclipse.equinox.weaving.aspectj_qualifier.jar</li>
<li>org.eclipse.equinox.weaving.hook_qualifier.jar</li>
<li>org.aspectj.runtime_qualifier.jar</li>
<li>org.aspectj.weaver_qualifier.jar</li> </ul>
</li>
</ol>

  </div>
</div>
