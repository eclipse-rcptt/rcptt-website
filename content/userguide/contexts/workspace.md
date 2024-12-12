---
title: Workspace Contexts
slug: workspace
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: contexts
---

Workspace contexts are used to control the state of an application workspace.

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-workspace-context-editor.png"></img>
  {# Name #}
  {% set overlayContent %}
  Context name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.
  {% endset %}
  {% set top, left, width, height = 93, 118, 100, 19 %}
  {% include "overlay" %}

  {# Tags #}
  {% set overlayContent %}
  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>
  {% endset %}
  {% set top, left, width, height = 119, 118, 100, 19 %}
  {% include "overlay" %}

  {# Add Tags #}
  {% set overlayContent %}
  Use this button to open tag selection dialog with list of tags from another test resources.
  {% endset %}
  {% set top, left, width, height = 118, 584, 22, 22 %}
  {% include "overlay" %}

  {# Capture button  #}
  {% set overlayContent %}
  Make a snapshot of all projects inside AUT workspace and copy them into this context. Previous contents of this workspace context is overridden with new projects.
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}
  {% include "overlay" %}

  {# Apply button  #}
  {% set overlayContent %}
  Copies given projects into AUT workspace. If {{< uielement >}}Clear workspace{{< / uielement >}} option is on, removes existing projects from AUT at first.
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  {% include "overlay" %}

  {# Description #}
  {% set overlayContent %}
  Arbitrary plain text associated with a context.
  {% endset %}
  {% set top, left, width, height = 152, 69, 95, 20 %}
  {% include "overlay" %}

  {# Clear Description #}
  {% set overlayContent %}
  Click this button to erase current description contents
  {% endset %}
  {% set top, left, width, height = 154, 665, 19, 19 %}
  {% include "overlay" %}

  {# Clear workspace #}
  {% set overlayContent %}
  Turned on by default. Whether existing projects should be removed before applying new ones.
  {% endset %}
  {% set top, left, width, height = 200, 75, 110, 21 %}
  {% include "overlay" %}
  
  {# Keep projects #}
  {% set overlayContent %}
  When {{< uielement >}}Clear workspace{{< / uielement >}} is on, this option allows to specify a list of projects, which should be kept intact in AUT workspace.
  {% endset %}
  {% set top, left, width, height = 248, 75, 610, 19 %}
  {% include "overlay" %}

  {# Project list #}
  {% set overlayContent %}
  Projects in current context
  {% endset %}
  {% set top, left, width, height = 295, 75, 112, 36 %}
  {% include "overlay" %}

  {# Create Empty Project #}
  {% set overlayContent %}
  Create new general project without any nature
  {% endset %}
  {% set top, left, width, height = 295, 519, 166, 22 %}
  {% include "overlay" %}

  {# Create Empty Folder #}
  {% set overlayContent %}
  Create new empty folder in currently selected project/folder
  {% endset %}
  {% set top, left, width, height = 320, 519, 166, 22 %}
  {% include "overlay" %}

  {# Import buttons #}
  {% set overlayContent %}
  Pretty much the same as Eclipse's standard Project/Filesystem import wizards, but imported resources go directly inside Workspace context, not inside RCPTT workspace.
  {% endset %}
  {% set top, left, width, height = 345, 519, 166, 47 %}
  {% include "overlay" %}

  {# Linking buttons #}
  {% set overlayContent %}
  Instead of embedding contents inside workspace context, put links on resources from RCPTT workspace. This is particularly useful when resources for AUT need to be modified often, or used somewhere else.
  {% endset %}
  {% set top, left, width, height = 395, 519, 166, 72 %}
  {% include "overlay" %}

  {# Remove button #}
  {% set overlayContent %}
  Removes selected resource(s) from workspace context
  {% endset %}
  {% set top, left, width, height = 470, 519, 166, 22 %}
  {% include "overlay" %}

  {# Remove button #}
  {% set overlayContent %}
  Opens a file in a text editor. This may be useful for examining file contents, but at the moment file cannot be modified and saved
  {% endset %}
  {% set top, left, width, height = 495, 519, 166, 22 %}
  {% include "overlay" %}
</div>

### Introduction

Workspace Contexts are responsible for preparing the initial workspace content for your test case. 
The Workspace Context contains projects and files you need to place on your workspace before running your test. It also has an option to clear the workspace before applying your Context. That is, if the Clear workspace option is turned on, the Workspace context just replaces the entire workspace contents. 
Otherwise it verifies that all of its items are present in the workspace and have the same properties. If not, it creates missing items or replaces modified items correspondingly.

The Workspace Context editor allows either to manually construct/modify the content of your Context or capture the workspace state from the AUT.

With the {{< uielement ui-capture.gif >}} Capture{{< / uielement >}} button in the upper-right corner above the Context name field you can capture the current state of the AUT workspace. With a single click all the project with all their files and subfolders will be added to your Context.

Otherwise, you can manually add/import Projects and Files using the corresponding buttons. 

