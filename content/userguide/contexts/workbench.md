---
title: Workbench Contexts
slug: workbench
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: contexts
---

Workbench contexts are used to control perspective, views and open editors of application under test

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-workbench-context-editor.png"></img>
  <!-- Name -->
 {{< annotate  >}}  All you need to know about context name{{< / annotate >}}
  {% set top, left, width, height = 93, 118, 240, 19 %}

  <!-- Tags -->
 {{< annotate  >}}  All you need to know about tags{{< / annotate >}}
  {% set top, left, width, height = 119, 118, 100, 19 %}

  <!-- Add Tags -->
 {{< annotate  >}}  All you need to know about adding tags{{< / annotate >}}
  {% set top, left, width, height = 118, 584, 22, 22 %}

  

  <!-- Capture button  -->
 {{< annotate  >}}  Make a snapshot of all current AUT perspective, opened views and editors and copy them into this context. {{< / annotate >}}
  {% set top, left, width, height = 92, 616, 75, 22 %}

  <!-- Apply button  -->
  {% set overlayContent %}
  Opens given perspective, views and editors. If {{< uielement >}}Reset perspective{{< / uielement >}} option is on, resets perspective to its default.
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}

  <!-- Description -->
 {{< annotate  >}}   All you need to know about Description{{< / annotate >}}
  {% set top, left, width, height = 152, 69, 95, 20 %}

  <!-- Clear Description -->
 {{< annotate  >}}  Click this button to erase current description contents{{< / annotate >}}
  {% set top, left, width, height = 154, 665, 19, 19 %}

  <!-- Perspective ID -->
 {{< annotate  >}}  A perspective which should be open in AUT{{< / annotate >}}
  {% set top, left, width, height = 203, 73, 290, 19 %}

  <!-- Browse Perspective button -->
 {{< annotate  >}}  Shows a perspective selection dialog populated with list of perspectives available in AUT{{< / annotate >}}
  {% set top, left, width, height = 202, 626, 59, 22 %}
  
  <!-- Reset perspective -->
 {{< annotate  >}}  Whether to reset perspective to its defaults after opening{{< / annotate >}}
  {% set top, left, width, height = 230, 74, 120, 20 %}

  <!-- Close modal dialogs -->
 {{< annotate  >}}  Close all modal dialogs if any{{< / annotate >}}
  {% set top, left, width, height = 255, 74, 150, 20 %}

  <!-- Clear clipboard -->
 {{< annotate  >}}  Clear clipboard contents{{< / annotate >}}
  {% set top, left, width, height = 280, 74, 110, 20 %}
  
  <!-- Views section -->
 {{< annotate  >}}  List of views which should be open. Also workbench context processor clears selection in views listed here.{{< / annotate >}}
  {% set top, left, width, height = 331, 75, 329, 120 %}

  <!-- Add new view -->
 {{< annotate  >}}  Opens a view selection dialog populated with list of views from AUT (so there's no chance to enter an invalid view id){{< / annotate >}}
  {% set top, left, width, height = 306, 317, 20, 20 %}

  <!-- Editors section -->
 {{< annotate  >}}  List of editors to be open in AUT{{< / annotate >}}
  {% set top, left, width, height = 356, 416, 269, 95 %}

  <!-- Add Editor -->
 {{< annotate  >}}  Allows to select a file from current RCPTT Project's workspace contexts to be open in an editor{{< / annotate >}}
  {% set top, left, width, height = 306, 598, 20, 20 %}
</div>

### Introduction

The {{< uielement ui-capture.gif >}} Capture{{< / uielement >}} button in the upper-right corner lets you automatically capture the current workbench state of your AUT. However, your can customize your workbench context using the settings listed below:

<ul>
<li>**Perspective id** - the perspective to be open in AUT before running the test. Use the Browse button to view the user-friendly list of all perspectives available in AUT</li>
<li>**Reset perspective** - when this option is checked, the AUT perspective will be reset to its own defaults</li>
<li>**Close all modal dialogs** - when this option is checked, the workbench context will close any modal dialogs opened in AUT. That is, if your test stops and leaves the New Project wizard opened, the workbench context of your current test will close it</li>
<li>**Views** - the list of all views to be opened before running the test</li>
<li>**Editors** - the list of all editors to be opened before running the test. You can add entries to this list manually (i.e. typing in the file path, such as /my_project/my_file) or browse for existing files in workspace contexts.</li>
<li>**Close open editors** - optionally allows to close all other editors not listed in open editors list</li>
<li>**Clear clipboard** - optionally allows to clear clipboard contents</li>
</ul>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">Important</h3>
  </div>
  <div class="panel-body">
    While it is not currently tracked by RCPTT, the Workbench context actually can depend on certain Workspace contexts. For example, you specify to open an editor for */my_project/my_file*. In case there is no such file in the AUT workspace, applying this Workbench context will fail your test. When you are using [workspace contexts](../workspace) and workbench contexts simultaneously (which is actually the recommended way), make sure that the workspace context goes before the workbench context.
Alternatively, unnecessary editors can be manually removed from the list of editors. 
  </div>
</div>



