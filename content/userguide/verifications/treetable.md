---
title: Tree/Table Verifications
slug: verifications/treetable
sidebar: userguide
layout: doc
---

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-tree-verification.png"></img>
  
  <!-- Name -->
 {{< annotate  >}}  Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with 
  underscore character.{{< / annotate >}}
  {% set top, left, width, height = 93, 118, 100, 19 %}

  <!-- Tags -->
 {{< annotate  >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  {% set top, left, width, height = 119, 118, 100, 19 %}
  
  <!-- Capture button  -->
  Make a snapshot of AUT widget defined in {{< uielement >}}Widget{{< / uielement >}} field and copy it into verification. 
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}

  <!-- Verify button  -->
  Verifies whether AUT tree/table defined in {{< uielement >}}Widget{{< / uielement >}} matches the tree/table from a verification.
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  
  <!-- Widget -->
  AUT tree/table widget for verification. You can set the value manually or using {{< uielement >}}Pick...{{< / uielement >}} button.
  {% endset %}
  {% set top, left, width, height = 202, 126, 511, 22 %}
  
  <!-- Verify styles option  -->
 {{< annotate  >}}  Styles option for verification. Can be All/Ignore Styles/Ignore Styled Text. {{< / annotate >}}
  {% set top, left, width, height = 239, 155, 155, 22 %}
  
  <!-- Allow children -->
 {{< annotate  >}} Turned on by default. If this option is off - verification fails if there are uncaptured children in AUT tree. {{< / annotate >}}
  {% set top, left, width, height = 239, 317, 165, 23 %}
  
  <!-- Verify icons -->
 {{< annotate  >}} Turned on by default. If this option is off - verification ignores icons. {{< / annotate >}}
  {% set top, left, width, height = 239, 486, 110, 23 %}
  
  <!-- Tree area -->
 {{< annotate  >}}  Captured tree/table. {{< / annotate >}}
  {% set top, left, width, height = 284, 75, 610, 94 %}
  
  </div>
  
  ### Introduction
  
  Tree/Table verification is the most convenient way to assert the whole tree/table state at the end of the test case. 
  Comparing to assertions, where you select a separate tree/table items to verify their properties, tree/table verification makes 
  it more simple.
  
  ### Verify styles options
  
  There are three options for styles verification: All, Ignore Styles, Ignore Styled text:
  
    <li>**All.** Tree is verified as it is:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-tree-verification-all.png"></img>
  
  
  <li>**Ignore Styles.** Styled text is verified as a plain text:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-tree-verification-ignore-styles.png"></img>
  
  
  <li>**Ignore Styled Text.** If there is a styled text - it will be ignored:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-tree-verification-ignore-styled-text.png"></img>
  
  
  </ul> 
