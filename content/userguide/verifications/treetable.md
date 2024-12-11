---
title: Tree/Table Verifications
slug: verifications/treetable
sidebar: userguide
layout: doc
---

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-tree-verification.png"></img>
  
  {# Name #}
  {% set overlayContent %}
  Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with 
  underscore character.
  {% endset %}
  {% set top, left, width, height = 93, 118, 100, 19 %}
  {% include "overlay" %}

  {# Tags #}
  {% set overlayContent %}
  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>
  {% endset %}
  {% set top, left, width, height = 119, 118, 100, 19 %}
  {% include "overlay" %}
  
  {# Capture button  #}
  {% set overlayContent %}
  Make a snapshot of AUT widget defined in {{m.uiElement("Widget")}} field and copy it into verification. 
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}
  {% include "overlay" %}

  {# Verify button  #}
  {% set overlayContent %}
  Verifies whether AUT tree/table defined in {{m.uiElement("Widget")}} matches the tree/table from a verification.
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  {% include "overlay" %}
  
  {# Widget #}
  {% set overlayContent %}
  AUT tree/table widget for verification. You can set the value manually or using {{m.uiElement("Pick...")}} button.
  {% endset %}
  {% set top, left, width, height = 202, 126, 511, 22 %}
  {% include "overlay" %}
  
  {# Verify styles option  #}
  {% set overlayContent %}
  Styles option for verification. Can be All/Ignore Styles/Ignore Styled Text. 
  {% endset %}
  {% set top, left, width, height = 239, 155, 155, 22 %}
  {% include "overlay" %}
  
  {# Allow children #}
  {% set overlayContent %}
 Turned on by default. If this option is off - verification fails if there are uncaptured children in AUT tree. 
  {% endset %}
  {% set top, left, width, height = 239, 317, 165, 23 %}
  {% include "overlay" %}
  
  {# Verify icons #}
  {% set overlayContent %}
 Turned on by default. If this option is off - verification ignores icons. 
  {% endset %}
  {% set top, left, width, height = 239, 486, 110, 23 %}
  {% include "overlay" %}
  
  {# Tree area #}
  {% set overlayContent %}
  Captured tree/table. 
  {% endset %}
  {% set top, left, width, height = 284, 75, 610, 94 %}
  {% include "overlay" %}
  
  </div>
  
  ### Introduction
  
  Tree/Table verification is the most convenient way to assert the whole tree/table state at the end of the test case. 
  Comparing to assertions, where you select a separate tree/table items to verify their properties, tree/table verification makes 
  it more simple.
  
  ### Verify styles options
  
  There are three options for styles verification: All, Ignore Styles, Ignore Styled text:
  
  <ul>
  <li>**All.** Tree is verified as it is:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-tree-verification-all.png"></img>
  </li>
  
  <li>**Ignore Styles.** Styled text is verified as a plain text:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-tree-verification-ignore-styles.png"></img>
  </li>
  
  <li>**Ignore Styled Text.** If there is a styled text - it will be ignored:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-tree-verification-ignore-styled-text.png"></img>
  </li>
  
  </ul> 
