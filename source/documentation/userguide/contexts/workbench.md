---
title: Workbench Contexts
slug: contexts/workbench
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

Workbench contexts are used to control perspective, views and open editors of application under test

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-workbench-context-editor.png"></img>
  {# Name #}
  {% set overlayContent %}
  All you need to know about context name
  {% endset %}
  {% set top, left, width, height = 93, 118, 240, 19 %}
  {% include "overlay" %}

  {# Tags #}
  {% set overlayContent %}
  All you need to know about tags
  {% endset %}
  {% set top, left, width, height = 119, 118, 100, 19 %}
  {% include "overlay" %}

  {# Add Tags #}
  {% set overlayContent %}
  All you need to know about adding tags
  {% endset %}
  {% set top, left, width, height = 118, 584, 22, 22 %}
  {% include "overlay" %}

  

  {# Capture button  #}
  {% set overlayContent %}
  Make a snapshot of all current AUT perspective, opened views and editors and copy them into this context. 
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}
  {% include "overlay" %}

  {# Apply button  #}
  {% set overlayContent %}
  Opens given perspective, views and editors. If {{m.uiElement("Reset perspective")}} option is on, resets perspective to its default.
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  {% include "overlay" %}

  {# Description #}
  {% set overlayContent %}
   All you need to know about Description
  {% endset %}
  {% set top, left, width, height = 152, 69, 95, 20 %}
  {% include "overlay" %}

  {# Clear Description #}
  {% set overlayContent %}
  Click this button to erase current description contents
  {% endset %}
  {% set top, left, width, height = 154, 665, 19, 19 %}
  {% include "overlay" %}

  {# Perspective ID #}
  {% set overlayContent %}
  A perspective which should be open in AUT
  {% endset %}
  {% set top, left, width, height = 203, 73, 290, 19 %}
  {% include "overlay" %}

  {# Browse Perspective button #}
  {% set overlayContent %}
  Shows a perspective selection dialog populated with list of perspectives available in AUT
  {% endset %}
  {% set top, left, width, height = 202, 626, 59, 22 %}
  {% include "overlay" %}
  
  {# Reset perspective #}
  {% set overlayContent %}
  Whether to reset perspective to its defaults after opening
  {% endset %}
  {% set top, left, width, height = 230, 74, 120, 20 %}
  {% include "overlay" %}

  {# Close modal dialogs #}
  {% set overlayContent %}
  Close all modal dialogs if any
  {% endset %}
  {% set top, left, width, height = 255, 74, 150, 20 %}
  {% include "overlay" %}

  {# Clear clipboard #}
  {% set overlayContent %}
  Clear clipboard contents
  {% endset %}
  {% set top, left, width, height = 280, 74, 110, 20 %}
  {% include "overlay" %}
  
  {# Views section #}
  {% set overlayContent %}
  List of views which should be open. Also workbench context processor clears selection in views listed here.
  {% endset %}
  {% set top, left, width, height = 331, 75, 329, 120 %}
  {% include "overlay" %}

  {# Add new view #}
  {% set overlayContent %}
  Opens a view selection dialog populated with list of views from AUT (so there's no chance to enter an invalid view id)
  {% endset %}
  {% set top, left, width, height = 306, 317, 20, 20 %}
  {% include "overlay" %}

  {# Editors section #}
  {% set overlayContent %}
  List of editors to be open in AUT
  {% endset %}
  {% set top, left, width, height = 356, 416, 269, 95 %}
  {% include "overlay" %}

  {# Add Editor #}
  {% set overlayContent %}
  Allows to select a file from current RCPTT Project's workspace contexts to be open in an editor
  {% endset %}
  {% set top, left, width, height = 306, 598, 20, 20 %}
  {% include "overlay" %}
</div>

<h3>Introduction</h3>

The <span class="uiElement"><img src="{{site.url}}/shared/img/ui-capture.gif"></img> Capture</span> button in the upper-right corner lets you automatically capture the current workbench state of your AUT. However, your can customize your workbench context using the settings listed below:

<ul>
<li><b>Perspective id</b> - the perspective to be open in AUT before running the test. Use the Browse button to view the user-friendly list of all perspectives available in AUT</li>
<li><b>Reset perspective</b> - when this option is checked, the AUT perspective will be reset to its own defaults</li>
<li><b>Close all modal dialogs</b> - when this option is checked, the workbench context will close any modal dialogs opened in AUT. That is, if your test stops and leaves the New Project wizard opened, the workbench context of your current test will close it</li>
<li><b>Views</b> - the list of all views to be opened before running the test</li>
<li><b>Editors</b> - the list of all editors to be opened before running the test. You can add entries to this list manually (i.e. typing in the file path, such as /my_project/my_file) or browse for existing files in workspace contexts.</li>
<li><b>Close open editors</b> - optionally allows to close all other editors not listed in open editors list</li>
<li><b>Clear clipboard</b> - optionally allows to clear clipboard contents</li>
</ul>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">Important</h3>
  </div>
  <div class="panel-body">
    While it is not currently tracked by RCPTT, the Workbench context actually can depend on certain Workspace contexts. For example, you specify to open an editor for <i>/my_project/my_file</i>. In case there is no such file in the AUT workspace, applying this Workbench context will fail your test. When you are using <a href = "{{site.url}}/documentation/userguide/contexts/workspace">workspace contexts</a> and workbench contexts simultaneously (which is actually the recommended way), make sure that the workspace context goes before the workbench context.
Alternatively, unnecessary editors can be manually removed from the list of editors. 
  </div>
</div>



