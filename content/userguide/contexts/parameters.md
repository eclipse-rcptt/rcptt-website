---
title: Parameters Contexts
slug: parameters
sidebar: userguide
layout: doc
---

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-parameters-context-editor.png"></img>
  
  {# Name #}
  {% set overlayContent %}
  Context name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.
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
  {% set top, left, width, height = 118, 583, 22, 22 %}
  {% include "overlay" %}

  {# Capture button  #}
  {% set overlayContent %}
  Disabled for Parameters Context
  {% endset %}
  {% set top, left, width, height = 92, 615, 75, 22 %}
  {% include "overlay" %}

  {# Add #}
  {% set overlayContent %}
  Add new parameter in a Parameters Context
  {% endset %}
  {% set top, left, width, height = 210, 610, 74, 22 %}
  {% include "overlay" %}
  
  {# Remove #}
  {% set overlayContent %}
  Remove parameter(s) from a Context
  {% endset %}
  {% set top, left, width, height = 239, 610, 74, 22 %}
  {% include "overlay" %}
  
  {# Parameters list #}
  {% set overlayContent %}
  A list of parameters with their values
  {% endset %}
  {% set top, left, width, height = 210, 75, 529, 110 %}
  {% include "overlay" %}
  
  </div>
  
  ### Introduction
  
  One of the most asked features for RCPTT is to execute a same test with different parameters. 
  I'm going to demonstrate how it is possible to achieve the same effect using Parameters Context. 
  As an example, let's test error messages in JDT New Class Wizard. We start with a Java project with a single class:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-parameters-context-tree-2.png"></img>
  </div>
  At first, let's record an initial script which launches new class wizard, sets package and class name and asserts an error message:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-parameters-context-3.png"></img>
  </div>
  Now, what we really want is to type various values into 
  Package and Name fields and make sure that error message changes accordingly. 
  As a next step, let's parameterize a script using Parameters Context:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-parameters-context-4.png"></img>
  </div>
  
  Next, let's place a Parameters Context into a Test Case and use **$paramName** in a script:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-parameters-context-5.png"></img>
  </div>
  
 Please learn more about more efficient way of script parametrization by 
 using [ Super Context](../super)
  
  
  
  
