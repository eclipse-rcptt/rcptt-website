---
title: Test Case Editor
slug: testeditor
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

Test case editor is a main editor for creating, running and executing test cases.

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-test-editor.png"></img>
  {# Name #}
  {% set overlayContent %}
  Test case name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.
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
  {% set top, left, width, height = 118, 590, 22, 22 %}
  {% include "overlay" %}

  {# Record button  #}
  {% set overlayContent %}
  Record test case. Before recording starts, all contexts added to this test case are applied. If test case script is not empty, existing script is replayed first and newly recorded actions are being appended at the end of a script.
  {% endset %}
  {% set top, left, width, height = 92, 622, 69, 22 %}
  {% include "overlay" %}

  {# Replay button  #}
  {% set overlayContent %}
  Replay test case. Result is displayed in {{m.uiElement("Execution", "#{site.url}/shared/img/ui-execution-view.png")}} view.
  {% endset %}
  {% set top, left, width, height = 118, 622, 69, 22 %}
  {% include "overlay" %}

  {# Description #}
  {% set overlayContent %}
  Arbitrary plain text associated with a test case, for example steps this test performs. It might be convenient to outline test case plan in description and follow it during recording (use {{m.uiElement("Description", "#{site.url}/shared/img/ui-description.gif")}} tab of <a href="{{site.url}}/documentation/userguide/controlpanel">Control Panel</a>).
  {% endset %}
  {% set top, left, width, height = 152, 69, 95, 20 %}
  {% include "overlay" %}

  {# Clear Description #}
  {% set overlayContent %}
  Click this button to erase current description contents
  {% endset %}
  {% set top, left, width, height = 154, 665, 19, 19 %}
  {% include "overlay" %}

  {# External reference #}
  {% set overlayContent %}
  Put a link on bugtracker or shared test plan
  {% endset %}
  {% set top, left, width, height = 247, 73, 300, 19 %}
  {% include "overlay" %}

  {# Contexts area #}
  {% set overlayContent %}
  <p>Context area lists current <a href="{{site.url}}/documentation/userguide/contexts/">contexts</a>. Drag contexts to change their order, drop contexts from Test Explorer to add. When test case is executed, contexts are applied in order they listed.</p>

  <p>Sometimes context order is important &ndash; for instance, if workbench context opens a file in editor, usually <a href="{{site.url}}/documentation/userguide/contexts/workspace">workspace</a> context which ensures this file exists should go before <a href="{{site.url}}/documentation/userguide/contexts/workbench">workbench</a> context.</p>
  {% endset %}
  {% set top, left, width, height = 298, 75, 610, 60 %}
  {% include "overlay" %}

  {# Add context #}
  {% set overlayContent %}
  Opens context selection dialog
  {% endset %}
  {% set top, left, width, height = 273, 598, 20, 20 %}
  {% include "overlay" %}

  {# Remove context #}
  {% set overlayContent %}
  Removes selected context(s)
  {% endset %}
  {% set top, left, width, height = 273, 620, 21, 20 %}
  {% include "overlay" %}

  {# Move up #}
  {% set overlayContent %}
  Moves selected context up
  {% endset %}
  {% set top, left, width, height = 273, 642, 20, 20 %}
  {% include "overlay" %}

  {# Move down #}
  {% set overlayContent %}
  Moves selected context down
  {% endset %}
  {% set top, left, width, height = 273, 664, 20, 20 %}
  {% include "overlay" %}

  {# Project settings link #}
  {% set overlayContent %}
  Open project settings editor
  {% endset %}
  {% set top, left, width, height = 364, 490, 195, 17 %}
  {% include "overlay" %}

  {# Script area  #}
  {% set overlayContent %}
  Test case script section. Script contents can be recorded or written manually from scratch. Hover a command with a mouse to get its documentation. Use <kbd>Ctrl+Space</kbd> for completion.
  {% endset %}
  {% set top, left, width, height = 385, 69, 64, 20 %}
  {% include "overlay" %}

  {# Clear scipt button  #}
  {% set overlayContent %}
  Click this button to erase current script contents
  {% endset %}
  {% set top, left, width, height = 387, 665, 19, 19 %}
  {% include "overlay" %}

  {# Verifications area  #}
  {% set overlayContent %}
  Configure test case verifications.
  {% endset %}
  {% set top, left, width, height = 487, 69, 102, 20 %}
  {% include "overlay" %}
</div>


