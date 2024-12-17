---
title: Preferences Contexts
slug: preferences
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: contexts
---

###  Introduction
Preferences contexts ensure that correct Application-Under-Test preferences are configured before test execution. 
This can be particularly useful when preferences which control the behavior of pop-up dialogs are being set in your AUT. 
The well-known example, while not completely relevant to test execution, is the Confirm Exit dialog, which has the "Always exit without prompt" checkbox.

The Preferences Context editor displays tree of all available preferences and allows modifying/removing some of their values. 

{{< annotatedImage screenshot-preferences-context-editor.png >}}
  <!-- Name -->
 {{< annotate 118 93 605 112 >}}  Context name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.{{< / annotate >}}
  
  <!-- Tags -->
 {{< annotate 118 119 582 138 >}}Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}

  <!-- Add Tags -->
 {{< annotate 584 118 606 140 >}}  Use this button to open tag selection dialog with list of tags from another test resources{{< / annotate >}}
  
  <!-- Capture button  -->
 {{< annotate 616 92 691 114 >}}  Make a snapshot of AUT preferences and copy them into this context{{< / annotate >}}

  <!-- Apply button  -->
  {{< annotate 616 118 691 140 >}}
  Applies preferences to AUT.   If {{< uielement >}}Clear preferences{{< / uielement >}} option is on, clears existing AUT preferences first
  {{< / annotate >}}
  
   <!-- Description -->
 {{< annotate 69 152 164 172 >}}  Arbitrary plain text associated with a context{{< / annotate >}}

  <!-- Clear Preferences -->
 {{< annotate 75 200 190 221 >}}  Click this button to clear current AUT preferences first{{< / annotate >}}
  
  <!-- Import buttons -->
 {{< annotate 541 227 685 249 >}}  Pretty much the same as Eclipse's standard Project/FileSystem import wizards, but imported resources go directly inside Preferences context, not inside RCPTT workspace.{{< / annotate >}}
  
  <!-- Add buttons -->
 {{< annotate 541 256 685 278 >}}  You can manually add a preference into a context with this button{{< / annotate >}}
  
  <!-- Remove button -->
 {{< annotate 541 285 685 307 >}}  Removes selected preference(s) from a context{{< / annotate >}}
  
  <!-- Preferences section -->
 {{< annotate 75 227 535 457 >}}  List of preferences which should be applied. You can change the value of any preference.{{< / annotate >}}
  
  {{< / annotatedImage >}}
  
 
## Example
  In [UML Lab](http://uml-lab.com) when a user saves an UML diagram for the first time, the dialog popup appears which asks whether to turn automatic code generation on or off. 
  Based on user input, it modifies its internal property `com.yattasolutions.codegen.GenerateCodeOnSave` and also sets `com.yattasolutions.umllab.dontshow.generateCodeOnSave` to `true`.

Thus, if a test case is recorded for the first time, clicking on any option on the dialog popup is recorded as well, but later this dialog does not appear and, as a result, execution fails since it cannot find the specified dialog. 
There are two ways to ensure that test always passes in this case:

- Create preferences context with `dontshow.generateCodeOnSave` set to `false`
- Create preferences context with `dontshow.generateCodeOnSave` set to `true` and remove script lines responsible for this dialog in the Test Editor

## Interaction with [Workspace context](../workspace)
Project-specific preferences are associated with Eclpse workspace projects. Preferences context with such preferences will fail if associated projects are not present in the workspace. Therefore Preferences context may depend on [workspace context](../workspace) to set projects up.
To prevent this, either:
- manually remove corresponding project preference nodes from Preference context
- or use a paired [workspace context](../workspace).
  - Ensure that your preference context runs after the workspace context (i.e. the preference context is placed below the workspace context in the Contexts section of the Test Editor or Group context).
