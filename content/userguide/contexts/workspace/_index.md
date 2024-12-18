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

{{< annotatedImage screenshot-workspace-context-editor.png >}}
  <!-- Name -->
 {{< annotate 118 93 606 112 >}}  Context name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.{{< / annotate >}}

  <!-- Tags -->
 {{< annotate 118 119 581 138 >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}

  <!-- Add Tags -->
 {{< annotate 584 118 606 140 >}}  Use this button to open tag selection dialog with list of tags from another test resources.{{< / annotate >}}

  <!-- Capture button  -->
 {{< annotate 616 92 691 114 >}}  Make a snapshot of all projects inside AUT workspace and copy them into this context. Previous contents of this workspace context is overridden with new projects.{{< / annotate >}}

  <!-- Apply button  -->
  {{< annotate 616 118 691 140 >}} Copies given projects into AUT workspace. If {{< uielement >}}Clear workspace{{< / uielement >}} option is on, removes existing projects from AUT at first.
  {{< / annotate >}}

  <!-- Description -->
 {{< annotate 69 152 164 172 >}}  Arbitrary plain text associated with a context.{{< / annotate >}}

  <!-- Clear Description -->
 {{< annotate 665 154 684 173 >}}  Click this button to erase current description contents{{< / annotate >}}

  <!-- Clear workspace -->
 {{< annotate 75 200 185 221 >}}  Turned on by default. Whether existing projects should be removed before applying new ones.{{< / annotate >}}
  
  <!-- Keep projects -->
  {{< annotate 75 248 685 267 >}} When {{< uielement >}}Clear workspace{{< / uielement >}} is on, this option allows to specify a list of projects, which should be kept intact in AUT workspace.
  {{< / annotate >}}

  <!-- Project list -->
 {{< annotate 75 295 187 331 >}}  Projects in current context{{< / annotate >}}

  <!-- Create Empty Project -->
 {{< annotate 519 295 685 317 >}}  Create new general project without any nature{{< / annotate >}}

  <!-- Create Empty Folder -->
 {{< annotate  519 320 685 342 >}}  Create new empty folder in currently selected project/folder{{< / annotate >}}

  <!-- Import buttons -->
 {{< annotate 519 345 685 392 >}}  Pretty much the same as Eclipse's standard Project/Filesystem import wizards, but imported resources go directly inside Workspace context, not inside RCPTT workspace.{{< / annotate >}}

  <!-- Linking buttons -->
 {{< annotate 519 395 685 467 >}}  Instead of embedding contents inside workspace context, put links on resources from RCPTT workspace. This is particularly useful when resources for AUT need to be modified often, or used somewhere else.{{< / annotate >}}

  <!-- Remove button -->
 {{< annotate 519 470 685 492 >}}  Removes selected resource(s) from workspace context{{< / annotate >}}

  <!-- Remove button -->
 {{< annotate 519 495 685 517 >}}  Opens a file selected in context in a text editor. This may be useful for examining file contents, but at the moment file cannot be modified and saved{{< / annotate >}}
{{< / annotatedImage >}}

## Introduction

Workspace Contexts prepare the initial workspace content for your test case. 
A Workspace Context contains projects and files you need to place on your workspace before running your test. It can also clear the workspace before placing new files. That is, if the {{< uielement >}}Clear workspace{{< / uielement >}} option is turned on, the Workspace context just replaces the entire workspace contents. 
Otherwise it verifies that all of its items are present in the workspace and have the same properties. If not, it creates missing items or replaces modified items correspondingly.

The Workspace Context editor allows either to manually construct/modify the content of your Context or capture the workspace state from the AUT.

With the {{< uielement "../../ui-capture.gif" >}} Capture{{< / uielement >}} button in the upper-right corner above the Context name field you can capture the current state of the AUT workspace. With a single click all the project with all their files and subfolders will be added to your Context.

Otherwise, you can manually add/import Projects and Files using the corresponding buttons. 

