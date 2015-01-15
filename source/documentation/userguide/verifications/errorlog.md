---
title: Error Log Verifications
slug: verifications/errorlog
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-error-log-verification-editor.png"></img>
  
  {# Name #}
  {% set overlayContent %}
  Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with 
  underscore character.
  {% endset %}
  {% set top, left, width, height = 93, 118, 150, 19 %}
  {% include "overlay" %}

  {# Tags #}
  {% set overlayContent %}
  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>
  {% endset %}
  {% set top, left, width, height = 119, 118, 150, 19 %}
  {% include "overlay" %}
  
  {# Capture button  #}
  {% set overlayContent %}
  Make a snapshot of all Error Log messages which are thrown during the last test case execution. 
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}
  {% include "overlay" %}

  {# Verify button  #}
  {% set overlayContent %}
  Disabled for Error Log Verification
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  {% include "overlay" %}
  
  {# Require area #}
  {% set overlayContent %}
  Define the Error Log messages which are required here. Regular expressions are supported. You can drag and drop message 
  patterns from one rule area to another. 
  {% endset %}
  {% set top, left, width, height = 206, 75, 610, 74 %}
  {% include "overlay" %}
  
  {# Add button #}
  {% set overlayContent %}
  Add new message pattern
  {% endset %}
  {% set top, left, width, height = 181, 597, 21, 21 %}
  {% include "overlay" %}
  
   {# Remove button #}
  {% set overlayContent %}
  Remove selected message pattern(s) 
  {% endset %}
  {% set top, left, width, height = 181, 620, 21, 21 %}
  {% include "overlay" %}
  
  {# Order buttons #}
  {% set overlayContent %}
  Change the order of patterns.  
  {% endset %}
  {% set top, left, width, height = 181, 643, 40, 21 %}
  {% include "overlay" %}
  
  {# Allow area #}
  {% set overlayContent %}
  Define the Error Log messages which are allowed here. Regular expressions are supported. You can drag and drop message 
  patterns from one rule area to another. 
  {% endset %}
  {% set top, left, width, height = 312, 75, 610, 74 %}
  {% include "overlay" %}
  
  {# Deny area #}
  {% set overlayContent %}
  Define the Error Log messages which are not allowed here. Regular expressions are supported. You can drag and drop message 
  patterns from one rule area to another. 
  {% endset %}
  {% set top, left, width, height = 418, 75, 610, 74 %}
  {% include "overlay" %}
  
  </div>
  
  Error Log Verification editor allows to define a set of rules which are used to check the changes of AUT Error Log 
  during a test case execution. You can describe which messages are allowed/required/denied by adding corresponding message patterns.
  Regular expressions are supported for Plugin Pattern/Message Pattern fields. 
  
