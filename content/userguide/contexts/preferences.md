---
title: Preferences Contexts
slug: preferences
sidebar: userguide
layout: doc
---

###  Introduction

Preferences contexts allow to ensure that correct Application-Under-Test preferences are applied before test execution. 
This can be particularly useful when preferences which control the behavior of pop-up dialogs are being set in your AUT. 
The well-known example, while not completely relevant to test execution, is the Confirm Exit dialog, which has the "Always exit without prompt" checkbox.

The Preferences Context editor displays tree of all available preferences and allows modifying/removing some of their values. 

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-preferences-context-editor.png"></img>
  {# Name #}
  {% set overlayContent %}
  Context name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.
  {% endset %}
  {% set top, left, width, height = 93, 118, 120, 19 %}
  {% include "overlay" %}
  
  {# Tags #}
  {% set overlayContent %}
  All you need to know about tags
  {% endset %}
  {% set top, left, width, height = 119, 118, 100, 19 %}
  {% include "overlay" %}

  {# Add Tags #}
  {% set overlayContent %}
  Use this button to open tag selection dialog with list of tags from another test resources
  {% endset %}
  {% set top, left, width, height = 118, 584, 22, 22 %}
  {% include "overlay" %}
  
  {# Capture button  #}
  {% set overlayContent %}
  Make a snapshot of AUT preferences and copy them into this context
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}
  {% include "overlay" %}

  {# Apply button  #}
  {% set overlayContent %}
  Applies preferences to AUT.   If {{< uielement >}}Clear preferences{{< / uielement >}} option is on, clears existing AUT preferences first
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  {% include "overlay" %}
  
   {# Description #}
  {% set overlayContent %}
  Arbitrary plain text associated with a context
  {% endset %}
  {% set top, left, width, height = 152, 69, 95, 20 %}
  {% include "overlay" %}

  {# Clear Preferences #}
  {% set overlayContent %}
  Click this button to clear current AUT preferences first
  {% endset %}
  {% set top, left, width, height = 200, 75, 115, 21 %}
  {% include "overlay" %}
  
  {# Import buttons #}
  {% set overlayContent %}
  Pretty much the same as Eclipse's standard Project/FileSystem import wizards, but imported resources go directly inside Preferences context, not inside RCPTT workspace.
  {% endset %}
  {% set top, left, width, height = 227, 541, 144, 22 %}
  {% include "overlay" %}
  
  {# Add buttons #}
  {% set overlayContent %}
  You can manually add a preference into a context with this button
  {% endset %}
  {% set top, left, width, height = 256, 541, 144, 22 %}
  {% include "overlay" %}
  
  {# Remove button #}
  {% set overlayContent %}
  Removes selected preference(s) from a context
  {% endset %}
  {% set top, left, width, height = 285, 541, 144, 22 %}
  {% include "overlay" %}
  
  {# Preferences section #}
  {% set overlayContent %}
  List of preferences which should be applied. You can change the value of any preference.
  {% endset %}
  {% set top, left, width, height = 227, 75, 460, 230 %}
  {% include "overlay" %}
  
  </div>
  
 
  <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Preferences context example</h3>
  </div>
  <div class="panel-body">
    In the <a href="http://uml-lab.com">UML Lab</a> product when a user saves the UML diagram for the first time, the dialog popup appears which asks whether to turn automatic code generation on or off. 
    Based on user input, it modifies its internal property *com.yattasolutions.codegen.GenerateCodeOnSave* and also sets *com.yattasolutions.umllab.dontshow.generateCodeOnSave* to **true**.
    <br><br>
	Thus, if a test case is recorded for the first time, clicking on any option on the dialog popup is recorded as well, but later this dialog does not appear and, as a result, execution fails since it cannot find the specified dialog. 
	There are two ways to ensure that test always passes in this case:
	<br><br>
<ul>
<li>Create preferences context with *dontshow.generateCodeOnSave* set to **false**</li>
<li>Create preferences context with *dontshow.generateCodeOnSave* set to **true** and remove script lines responsible for this dialog in the Test Editor</li>
<ul>  
  </div>
</div>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">Important</h3>
  </div>
  <div class="panel-body">
    While it is currently not tracked by RCPTT, the Preferences context may depend on AUT workspace content since the context may contain project-specific preferences. 
    Therefore, it may also depend on a [workspace context](../contexts/workspace), if there is one assigned to the test case. 
    In some cases, applying the Preference context fails if referred projects do not exist in the workspace.
     In order to prevent this, you should either manually remove corresponding project preference nodes or use this context coupled with the workspace context. 
     In latter case, please ensure that your preference context runs after the workspace context (i.e. the preference context 
     is placed below the workspace context in the Contexts section of the Test Editor).
  </div>
</div>


  
