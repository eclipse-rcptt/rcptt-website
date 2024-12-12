---
title: Group Contexts
slug: group
sidebar: userguide
menu:
  sidebar:
      parent: contexts
---

The Group context represents combined references to contexts of other type which might help in context management. 
It is possible to group together [Workspace](../workspace), [Workbench](../workbench), [Preferences](../preferences), etc., contexts together and refer to this group as 
a single Group context in the Test Editor. The Group Context editor looks quite similar to the Contexts panel in 
the <a href = "{{site.url}}/documentation/userguide/testeditor">Test Editor</a>.


{% include "screenshot-guide" %}

<div class="screenshot">
<img src="{{site.url}}/shared/img/screenshot-group-context-editor.png"></img>

{# Name #}
  {% set overlayContent %}
  All you need to know about context name
  {% endset %}
  {% set top, left, width, height = 93, 118, 100, 19 %}
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
  Capturing is disabled for Group Context
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}
  {% include "overlay" %}

	{# Add context #}
  {% set overlayContent %}
  Opens context selection dialog
  {% endset %}
  {% set top, left, width, height = 181, 598, 20, 20 %}
  {% include "overlay" %}
  
  {# Move up #}
  {% set overlayContent %}
  Moves selected context up
  {% endset %}
  {% set top, left, width, height = 181, 642, 20, 20 %}
  {% include "overlay" %}

  {# Move down #}
  {% set overlayContent %}
  Moves selected context down
  {% endset %}
  {% set top, left, width, height = 181, 664, 20, 20 %}
  {% include "overlay" %}
  
  {# Replay button  #}
  {% set overlayContent %}
  Applies the contexts one by one in the order they are displayed. 
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  {% include "overlay" %}
  
  {# Contexts area #}
  {% set overlayContent %}
  <p>Context area lists current [contexts](../contexts/). Drag contexts to change their order, drop contexts from Test Explorer to add. When group context is executed, contexts are applied in order they listed.</p>

  <p>Sometimes context order is important &ndash; for instance, if workbench context opens a file in editor, usually [workspace</a> context which ensures this file exists should go before <a href="{{site.url}}/documentation/userguide/contexts/workbench">workbench](../contexts/workspace) context.</p>
  {% endset %}
  {% set top, left, width, height = 206, 75, 610, 113 %}
  {% include "overlay" %}
  
  

</div>
