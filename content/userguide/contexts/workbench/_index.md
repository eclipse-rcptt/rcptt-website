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

{{< annotatedImage screenshot-workbench-context-editor.png >}}
  <!-- Name -->
 {{< annotate 118 93 605 112 >}}Context name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.{{< / annotate >}}

  <!-- Tags -->
 {{< annotate 118 119 580 138 >}}Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}

  <!-- Add Tags -->
 {{< annotate 584 118 606 140 >}}  All you need to know about adding tags{{< / annotate >}}

  <!-- Capture button  -->
 {{< annotate 616 92 691 114 >}}  Make a snapshot of all current AUT perspective, opened views and editors and copy them into this context. {{< / annotate >}}

  <!-- Apply button  -->
  {{< annotate 616 118 691 140 >}} Opens given perspective, views and editors. If {{< uielement >}}Reset perspective{{< / uielement >}} option is on, resets perspective to its default.
  {{< / annotate >}}

  <!-- Description -->
 {{< annotate 69 152 164 172 >}} All you need to know about Description{{< / annotate >}}

  <!-- Clear Description -->
 {{< annotate 665 154 684 173 >}} Click this button to erase current description contents{{< / annotate >}}

  <!-- Perspective ID -->
 {{< annotate 73 203 363 222 >}}  A perspective which should be open in AUT{{< / annotate >}}

  <!-- Browse Perspective button -->
 {{< annotate 626 202 685 224 >}}  Shows a perspective selection dialog populated with list of perspectives available in AUT{{< / annotate >}}
  
  <!-- Reset perspective -->
 {{< annotate 74 230 194 250 >}}  Whether to reset perspective to its defaults after opening{{< / annotate >}}

  <!-- Close modal dialogs -->
 {{< annotate 74 255 224 275 >}}  Close all modal dialogs if any{{< / annotate >}}

  <!-- Clear clipboard -->
 {{< annotate 74 280 184 300 >}}  Clear clipboard contents{{< / annotate >}}
  
  <!-- Views section -->
 {{< annotate 75 331 404 451 >}}  List of views which should be open. Also workbench context processor clears selection in views listed here.{{< / annotate >}}

  <!-- Add new view -->
 {{< annotate 317 306 337 326 >}}  Opens a view selection dialog populated with list of views from AUT (so there's no chance to enter an invalid view id){{< / annotate >}}

  <!-- Editors section -->
 {{< annotate 416 356 685 451 >}}  List of editors to be open in AUT{{< / annotate >}}

  <!-- Add Editor -->
 {{< annotate 598 306 618 326 >}}  Allows to select a file from current RCPTT Project's workspace contexts to be open in an editor{{< / annotate >}}
{{< / annotatedImage >}}

### Introduction

The {{< uielement "../../ui-capture.gif" >}} Capture{{< / uielement >}} button in the upper-right corner lets you automatically capture the current workbench state of your AUT. However, you can customize your workbench context using the settings listed below:

- **Perspective id** - the perspective to be open in AUT before running the test. Use the Browse button to view the user-friendly list of all perspectives available in AUT
- **Reset perspective** - when this option is checked, the AUT perspective will be reset to its own defaults
- **Close all modal dialogs** - when this option is checked, the workbench context will close any modal dialogs opened in AUT. That is, if your test stops and leaves the New Project wizard opened, the workbench context of your current test will close it
- **Views** - the list of all views to be opened before running the test
- **Editors** - the list of all editors to be opened before running the test. You can add entries to this list manually (i.e. typing in the file path, such as /my_project/my_file) or browse for existing files in workspace contexts.
- **Close open editors** - optionally allows to close all other editors not listed in open editors list
- **Clear clipboard** - optionally allows to clear clipboard contents


> While it is not currently tracked by RCPTT, the Workbench context actually can depend on certain Workspace contexts. For example, you specify to open an editor for */my_project/my_file*. In case there is no such file in the AUT workspace, applying this Workbench context will fail your test. When you are using [workspace contexts](../workspace) and workbench contexts simultaneously (which is actually the recommended way), make sure that the workspace context goes before the workbench context.
Alternatively, unnecessary editors can be manually removed from the list of editors. 




