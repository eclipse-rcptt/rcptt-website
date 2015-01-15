---
title: How to resize a window.
slug: resize-window
nav_name: faq
layout: faq
---
{% import "macros" as m %}

Sometimes you may want a window to be a certain size. 

<ol>
<li>To <b>maximize</b> a window you may use {{m.eclCommand("maximize")}} ECL command:</li><br>
<ul>
<li>to maximize main Eclipse window:<br><br>

<div class="panel panel-default">
  <div class="panel-body">
    get-eclipse-window | maximize
  </div>
</div>
</li>

<li>to maximize any window:<br><br>

<div class="panel panel-default">
  <div class="panel-body">
    get-window "WindowTitle" | maximize
  </div>
</div>


or
<br><br>
<div class="panel panel-default">
  <div class="panel-body">
    get-eclipse-window | get-object | invoke setMaximized true
  </div>
</div>

</li>
</ul>

<li>To <b>minimize</b> a window:<br> <br>
 <div class="panel panel-default">
  <div class="panel-body">
    get-eclipse-window | get-object | invoke setMinimized true
  </div>
</div>
Note: sometimes you need to set Maximized to 'false' before minimizing.
 <div class="panel panel-default">
  <div class="panel-body">
    get-eclipse-window | get-object | invoke setMaximized false<br>
get-eclipse-window | get-object | invoke setMinimized true
  </div>
</div></li>
<li>To <b>resize</b> a window:<br> <br>
<div class="panel panel-default">
  <div class="panel-body">
    get-eclipse-window | get-object | invoke setSize 700 700
  </div>
</div>

</ol>
