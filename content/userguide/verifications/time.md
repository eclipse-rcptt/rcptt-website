---
title: Execution Time Verifications
slug: verifications/time
sidebar: userguide
layout: doc
---

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-time-verification-editor.png"></img>
  
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
  Disabled for time verification 
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}
  {% include "overlay" %}

  {# Verify button  #}
  {% set overlayContent %}
  Disabled for time verification
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  {% include "overlay" %}
  
  {# Execution time  #}
  {% set overlayContent %}
  Verification checks that a test case is executed no longer than specified amount of time
  {% endset %}
  {% set top, left, width, height = 228, 100, 220, 27 %}
  {% include "overlay" %}
  
  {# Include context option  #}
  {% set overlayContent %}
  Disabled by default. If this option is on, verification checks the test execution time including a time of contexts execution
  {% endset %}
  {% set top, left, width, height = 265, 75, 307, 22 %}
  {% include "overlay" %}
  </div>
  
  Execution time verification can be used for performance testing. Being added to a test case verification makes sure that test case execution taked no longer then a specified
  amount of time. 
  
  <div class="panel panel-info">
  <div class="panel-heading">Important</div>
  <div class="panel-body">
    Please note that there is a launch timeout for a test case execution in RCP TT Preferences (300 sec by default). 
    If your test case needs to be executed more then this time - you need to change timeout value. 
  </div>
  </div>
  
  
