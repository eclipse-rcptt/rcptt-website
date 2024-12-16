---
title: Error Log Verifications
slug: verifications/errorlog
sidebar: userguide
layout: doc
---

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-error-log-verification-editor.png"></img>
  
  <!-- Name -->
 {{< annotate  >}}  Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with 
  underscore character.{{< / annotate >}}
  {% set top, left, width, height = 93, 118, 150, 19 %}

  <!-- Tags -->
 {{< annotate  >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  {% set top, left, width, height = 119, 118, 150, 19 %}
  
  <!-- Capture button  -->
 {{< annotate  >}}  Make a snapshot of all Error Log messages which are thrown during the last test case execution. {{< / annotate >}}
  {% set top, left, width, height = 92, 616, 75, 22 %}

  <!-- Verify button  -->
 {{< annotate  >}}  Disabled for Error Log Verification{{< / annotate >}}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  
  <!-- Require area -->
 {{< annotate  >}}  Define the Error Log messages which are required here. Regular expressions are supported. You can drag and drop message 
  patterns from one rule area to another. {{< / annotate >}}
  {% set top, left, width, height = 206, 75, 610, 74 %}
  
  <!-- Add button -->
 {{< annotate  >}}  Add new message pattern{{< / annotate >}}
  {% set top, left, width, height = 181, 597, 21, 21 %}
  
   <!-- Remove button -->
 {{< annotate  >}}  Remove selected message pattern(s) {{< / annotate >}}
  {% set top, left, width, height = 181, 620, 21, 21 %}
  
  <!-- Order buttons -->
 {{< annotate  >}}  Change the order of patterns.  {{< / annotate >}}
  {% set top, left, width, height = 181, 643, 40, 21 %}
  
  <!-- Allow area -->
 {{< annotate  >}}  Define the Error Log messages which are allowed here. Regular expressions are supported. You can drag and drop message 
  patterns from one rule area to another. {{< / annotate >}}
  {% set top, left, width, height = 312, 75, 610, 74 %}
  
  <!-- Deny area -->
 {{< annotate  >}}  Define the Error Log messages which are not allowed here. Regular expressions are supported. You can drag and drop message 
  patterns from one rule area to another. {{< / annotate >}}
  {% set top, left, width, height = 418, 75, 610, 74 %}
  
  </div>
  
  Error Log Verification editor allows to define a set of rules which are used to check the changes of AUT Error Log 
  during a test case execution. You can describe which messages are allowed/required/denied by adding corresponding message patterns.
  Regular expressions are supported for Plugin Pattern/Message Pattern fields. 
  
