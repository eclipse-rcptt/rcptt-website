---
title: Control Panel
slug: controlpanel
sidebar: userguide
layout: doc
---



Control panel is automatically opened when recording starts and provides a quick access to main test case properties. When recording is in progress, its {{m.uiElement("Script", "#{site.url}/shared/img/ui-script.gif")}} tab immediately updates with recorded actions.

There are two ways to start recording and open Control Panel:

- Use {{m.uiElement("Record", "#{site.url}/shared/img/ui-record.gif")}} button in [Test Case Editor](../testeditor).
- Use {{m.uiElement("Record a Snippet", "#{site.url}/shared/img/ui-snippet.png")}} button on RCPTT main toolbar. This mode is convenient for quick experiments or recording short snippets which can be pasted to other test cases later. As well it is possible to save recorded script as a new test case.

See Control Panel screenshot below for more information.
{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-cp.png"></img>

  {# Home Button #}
  {% set overlayContent %}
  <h5>Return to IDE button</h5>

  <p>Closes control panel and restores main RCPTT IDE window. If recording is in progress, it is automatically stopped. If test case is not saved, prompts for a save.</p>
  {% endset %}
  {% set top, left, width, height = 64, 74, 19, 19 %}
  {% include "overlay" %}


  {# Save button #}
  {% set overlayContent %}
  
  <h5>Save Button</h5>
  <p>Saves current test case. If there's no current test case (i.e. Control Panel has been started by {{m.uiElement("Record a Snippet", "#{site.url}/shared/img/ui-snippet.png")}} button), prompts for a test case location.</p>

  {% endset %}
  {% set top, left, width, height = 64, 95, 28, 19  %}
  {% include "overlay" %}
  

  {# Record button #}
  {% set overlayContent %}
  <h5>Record/Stop button</h5>

  <p>Used to control recording</p>

  {% endset %}
  {% set top, left, width, height = 64, 136, 19, 19 %}
  {% include "overlay" %}

  {# Replay button #}
  {% set overlayContent %}
  <h5>Replay button</h5>
  <p>Replay current test case</p>
  {% endset %}
  {% set top, left, width, height = 64, 157, 19, 19 %}
  {% include "overlay" %}

  {# Capture/Assertion modes #}
  {% set overlayContent %}
  <h5>Mode buttons</h5>
  <p>When recording is in progress, these buttons allow to switch between two modes:
    <ul>
      <li>{{m.uiElement("Capture Mode", "#{site.url}/shared/img/ui-capture-mode.gif")}} &ndash; all user actions in AUT are recorded in a script. This is a default mode when recording starts.</li>
      <li>{{m.uiElement("Assertion Mode", "#{site.url}/shared/img/ui-assert-mode.gif")}} &ndash; this mode allows to select any widget inside AUT to add [assertions](../assertions/) for it's properties.
    </ul>
  </p>
  {% endset %}
  {% set top, left, width, height = 60, 186, 48, 26 %}
  {% include "overlay" %}

  {# Script tab #}
  {% set overlayContent %}
  <h5>Script tab (active by default)</h5>
  <p>Current test script. When recording is in progress, it is automatically appended with newly recorded actions. When recording is stopped, its contents is editable.</p>
  {% endset %}
  {% set top, left, width, height = 91, 62, 54, 20 %}
  {% include "overlay" %}

  {#Contexts tab #}
  {% set overlayContent %}
  <h5>Contexts tab</h5>
  <p>Allows to add/remove [contexts](../contexts/) to current test case.</p>
  {% endset %}
  {% set top, left, width, height = 91, 130, 72, 20 %}
  {% include "overlay" %}

  {# Verifications tab #}
  {% set overlayContent %}
  <h5>Verifications tab</h5>
  <p>Allows to add/remove [verifications](../verifications/) to current test case.</p>
  {% endset %}
  {% set top, left, width, height = 91, 210, 87, 20 %}
  {% include "overlay" %}

  {# Description tab #}
  {% set overlayContent %}
  <h5>Description tab</h5>
  <p>Allows to view/edit a description of a current test case. This tab can be activated while recording in progress, so it might be convenient to put test steps into description section before starting recording and then follow those steps to avoid recoding of unnecessary actions.</p>
  {% endset %}
  {% set top, left, width, height = 91, 303, 84, 20 %}
  {% include "overlay" %}

  {# Options tab #}
  {% set overlayContent %}
  <h5>Options tab</h5>
  <p>Contains a few rarely used options controlling the way in which user actions are being recorded.</p>
  {% endset %}
  {% set top, left, width, height = 91, 392, 67, 20 %}
  {% include "overlay" %}

  {# AUT name #}
  {% set overlayContent %}
  <h5>AUT name</h5>
  <p>Indicates which application this control panel is currently working with.</p>
  {% endset %}
  {% set top, left, width, height = 37, 330, 122, 18 %}
  {% include "overlay" %}

  {# [Recording] #}
  {% set overlayContent %}
  <p>Indicates that recording is in progress now.</p>
  {% endset %}
  {% set top, left, width, height = 37, 453, 76, 18 %}
  {% include "overlay" %}

  
</div>
