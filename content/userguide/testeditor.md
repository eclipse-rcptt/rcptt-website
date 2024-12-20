---
title: Test Case Editor
slug: testeditor
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: userguide
---

Test case editor is a main editor for creating, running and executing test cases.

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-test-editor.png"></img>
  <!-- Name -->
 {{< annotate  >}}  Test case name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.{{< / annotate >}}
  {% set top, left, width, height = 93, 118, 100, 19 %}

  <!-- Tags -->
 {{< annotate  >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  {% set top, left, width, height = 119, 118, 100, 19 %}

  <!-- Add Tags -->
 {{< annotate  >}}  Use this button to open tag selection dialog with list of tags from another test resources.{{< / annotate >}}
  {% set top, left, width, height = 118, 590, 22, 22 %}

  <!-- Record button  -->
 {{< annotate  >}}  Record test case. Before recording starts, all contexts added to this test case are applied. If test case script is not empty, existing script is replayed first and newly recorded actions are being appended at the end of a script.{{< / annotate >}}
  {% set top, left, width, height = 92, 622, 69, 22 %}

  <!-- Replay button  -->
  Replay test case. Result is displayed in {{< uielement "ui-execution-view.png" >}}Execution{{< / uielement >}} view.
  {% endset %}
  {% set top, left, width, height = 118, 622, 69, 22 %}

  <!-- Description -->
  Arbitrary plain text associated with a test case, for example steps this test performs. It might be convenient to outline test case plan in description and follow it during recording (use {{< uielement "ui-description.gif" >}}Description{{< / uielement >}} tab of [Control Panel](../controlpanel)).
  {% endset %}
  {% set top, left, width, height = 152, 69, 95, 20 %}

  <!-- Clear Description -->
 {{< annotate  >}}  Click this button to erase current description contents{{< / annotate >}}
  {% set top, left, width, height = 154, 665, 19, 19 %}

  <!-- External reference -->
 {{< annotate  >}}  Put a link on bugtracker or shared test plan{{< / annotate >}}
  {% set top, left, width, height = 247, 73, 300, 19 %}

  <!-- Contexts area -->
  <p>Context area lists current [contexts](../contexts/). Drag contexts to change their order, drop contexts from Test Explorer to add. When test case is executed, contexts are applied in order they listed.</p>

  <p>Sometimes context order is important &ndash; for instance, if workbench context opens a file in editor, usually [workspace</a> context which ensures this file exists should go before <a href="{{site.url}}/documentation/userguide/contexts/workbench">workbench](../contexts/workspace) context.</p>
  {% endset %}
  {% set top, left, width, height = 298, 75, 610, 60 %}

  <!-- Add context -->
 {{< annotate  >}}  Opens context selection dialog{{< / annotate >}}
  {% set top, left, width, height = 273, 598, 20, 20 %}

  <!-- Remove context -->
 {{< annotate  >}}  Removes selected context(s){{< / annotate >}}
  {% set top, left, width, height = 273, 620, 21, 20 %}

  <!-- Move up -->
 {{< annotate  >}}  Moves selected context up{{< / annotate >}}
  {% set top, left, width, height = 273, 642, 20, 20 %}

  <!-- Move down -->
 {{< annotate  >}}  Moves selected context down{{< / annotate >}}
  {% set top, left, width, height = 273, 664, 20, 20 %}

  <!-- Project settings link -->
 {{< annotate  >}}  Open project settings editor{{< / annotate >}}
  {% set top, left, width, height = 364, 490, 195, 17 %}

  <!-- Script area  -->
  Test case script section. Script contents can be recorded or written manually from scratch. Hover a command with a mouse to get its documentation. Use {{< kbd >}}Ctrl+Space{{< / kbd >}} for completion.
  {% endset %}
  {% set top, left, width, height = 385, 69, 64, 20 %}

  <!-- Clear scipt button  -->
 {{< annotate  >}}  Click this button to erase current script contents{{< / annotate >}}
  {% set top, left, width, height = 387, 665, 19, 19 %}

  <!-- Verifications area  -->
 {{< annotate  >}}  Configure test case verifications.{{< / annotate >}}
  {% set top, left, width, height = 487, 69, 102, 20 %}
</div>


