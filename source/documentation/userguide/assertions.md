---
title: Assertions
slug: assertions
layout: doc
nav_name: userguide
---

{% import "macros" as m %}
<h3>Introduction</h3>

RCPTT supports two recording modes: the Recording mode and the Assertion mode. 
You can select any of them by clicking on the corresponding button of the 
the <a href="{{site.url}}/documentation/userguide/controlpanel/">Control Panel</a> toolbar. 
You can also use hotkeys to switch between them, which is useful for some cases when a mouse click affects the 
current state of any AUT elements. The hotkey hint is shown in the bottom 
of the <a href="{{site.url}}/documentation/userguide/controlpanel/">Control Panel</a> window.

In assertion mode you can verify any property of any widget (tree, button, text, canvas, etc.).

<h3>How it works</h3>

During a test recording switch to assertion mode:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-assertion-1.png"></img>
  
  {# Assertion mode button #}
  {% set overlayContent %}
 Use button to switch to assertion mode
  {% endset %}
  {% set top, left, width, height = 62, 210, 22, 22 %}
  {% include "overlay" %}

  {# Hotkeys #}
  {% set overlayContent %}
  You can also use hotkeys to switch to assertion mode
  {% endset %}
  {% set top, left, width, height = 250, 55, 300, 22 %}
  {% include "overlay" %}
  </div>
  
  Select any AUT widget you want to assert (you will see red frames). 
  Let's say we need to assert that Finish button is disabled in New Java Class Dialog:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-assertion-2.png"></img>
  </div>
  
  Once you select a button the assertion window appears containing widget properties with their values.
  Select the required one and press <span class="uiElement"><img src="{{site.url}}/shared/img/ui-add.gif"></img> Add</span> button:
  
   <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-assertion-3.png"></img>
  </div>
  
  The assertion code is added to your test script immidiately:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-assertion-4.png"></img>
  </div>
  
  <h3>Negative case. How to assert the absence of the elements?</h3>
  
  Sometimes we need to verify the absence of some UI element, like when we've deleted an item from a tree we 
  need to verify that there is no such an item anymore.
  
  We can do it with the help of {{m.eclCommand("verify-error")}} command.
  Let's say we need to verify that there is no <b>New/Java Project</b> menu when we are in a Plug-in Development Perspective.
  So we add a negative assertion manually:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-assertion-5.png"></img>
  </div>
   
  
  
