---
title: Is it possible to order tests in a Test Suite?
slug: suite-order
nav_name: faq
layout: faq
---

{% import "macros" as m %}

<div class="panel panel-default">
  <div class="panel-body">
    <i>Is it possible to change the test case order inside a test suite? Currently it is organized in an alphabetical order...</i>
  </div>
</div>

One of core RCPTT principles is test independence (from each other), so you should not rely on test execution order. 
Test cases independency is one of core principles of testing, and we believe RCPTT plays extremely well to implement 
this principle with <a href="{{site.url}}/documentation/userguide/contexts/">Contexts</a>. 

However, there is a possibility to change test case order (disabled by defaut).

To do this, please open rcptt.ini file and add <b><i>-Dorg.eclipse.rcptt.legacy.testSuite.manualOrdering=true</i></b> line after -vmargs.

Once RCPTT is started you can see Move Up/Move Down buttons in Test Suite editor:

{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-test-suite-editor.png"></img>
  {# Order buttons #}
  {% set overlayContent %}
  Change order of test cases in a Test Suite (make the Test Suite orderable). 
  {% endset %}
  {% set top, left, width, height = 405, 519, 153, 80 %}
  {% include "overlay" %}

</div>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">Important</h3>
  </div>
  <div class="panel-body">
  <ul>
<li>Internally test suites store an option flag - ordered/unordered. By default all test suites are unordered</li>
<li>If test suite is ordered OR there's an option in ini-file - test suite editor shows up/down buttons to change test case order.</li>
<li>Changing test order automatically converts unordered test suite to ordered.</li>
</ul>
Therefore, this ini-file option is just a 'hidden' way to convert unordered test suites to ordered. Once a test suite is saved as ordered, any user who opens it should see buttons for changing test order in a test suite disregarding of whether they have this option or not.
  </div>
</div>

