---
title: Test Case Editor
slug: testeditor
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: userguide
---

Test case editor is the main editor for creating, running and executing test cases. Hover mouse cursor over the screenshot below to get context help.

{{< annotatedImage screenshot-test-editor.png >}}
  <!-- Name -->
 {{< annotate 118 93 612 112 >}}  Test case name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.{{< / annotate >}}

  <!-- Tags -->
 {{< annotate 118 119 587 138 >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}

  <!-- Add Tags -->
 {{< annotate 590 118 612 140 >}}  Use this button to open tag selection dialog with list of tags from another test resources.{{< / annotate >}}

  <!-- Record button  -->
 {{< annotate 622 92 691 114 >}}  Record test case. Before recording starts, all contexts added to this test case are applied. If test case script is not empty, existing script is replayed first and newly recorded actions are being appended at the end of a script.{{< / annotate >}}

  <!-- Replay button  -->
  {{< annotate 622 118 691 140 >}}
  Replay test case. Result is displayed in {{< uielement "../ui-execution-view.png" >}}Execution{{< / uielement >}} view.
  {{< / annotate >}}

  <!-- Description -->
  {{< annotate 75 180 684 240 >}}
  Arbitrary plain text associated with a test case, for example steps this test performs. It might be convenient to outline test case plan in description and follow it during recording (use {{< uielement "../ui-description.gif" >}}Description{{< / uielement >}} tab of <a href="../controlpanel">Control Panel</a>.
  {{< / annotate >}}

  <!-- Clear Description -->
 {{< annotate 665 154 684 173 >}}  Click this button to erase current description contents{{< / annotate >}}

  <!-- External reference -->
 {{< annotate 73 247 373 266 >}}  Put a link on bugtracker or shared test plan here{{< / annotate >}}

  <!-- Contexts area -->
  {{% annotate 75 298 685 358 %}}
  Context area lists current [contexts](../contexts/). Drag contexts to change their order, drop contexts from Test Explorer to add. When test case is executed, contexts are applied in order they listed.

  Sometimes context order is important &ndash; for instance, if a [workbench context](../contexts/workbench/) opens a file in editor, usually [workspace context](../contexts/workspace/) ensuring this file exists should go before [workbench](../contexts/workbench) context.
  {{% / annotate %}}

  <!-- Add context -->
 {{< annotate 598 273 618 293 >}}  Opens context selection dialog{{< / annotate >}}

  <!-- Remove context -->
 {{< annotate 620 273 641 293 >}}  Removes selected context(s){{< / annotate >}}

  <!-- Move up -->
 {{< annotate 642 273 662 293 >}}  Moves selected context up{{< / annotate >}}

  <!-- Move down -->
 {{< annotate 664 273 684 293 >}}  Moves selected context down{{< / annotate >}}

  <!-- Project settings link -->
 {{< annotate 490 364 685 381 >}}  Open project settings editor{{< / annotate >}}

  <!-- Script area  -->
  {{< annotate 73 411 670 481 >}}
  Test case script section. Script contents can be recorded or written manually from scratch. Hover a command with a mouse to get its documentation. Use {{< kbd >}}Ctrl+Space{{< / kbd >}} for completion.
  {{< / annotate >}}

  <!-- Clear scipt button  -->
 {{< annotate 665 387 684 406 >}}  Click this button to erase current script contents{{< / annotate >}}

  <!-- Verifications area  -->
 {{< annotate 69 487 171 507 >}}  Configure test case verifications.{{< / annotate >}}
{{< / annotatedImage >}}


