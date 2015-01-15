---
title: How to extract an SWT widget from ECL command?
slug: extract-widget
nav_name: faq
layout: faq
---
{% import "macros" as m %}

<div class="panel panel-default">
  <div class="panel-body">
   <i> I am trying to make a custom ECL command to extract a data from table in order to make my custom assertions on that data. 
    I want to use the result of: get-table | ...<br>
But when I read an object from process.getInput().read(), I get an object of the class ControlHandlerImpl and I don't know how to handle this further. 
 Do you have some examples using the input pipe?</i>
  </div>
</div>

When RCPTT passes controls around (like in 'get-view "..." | get-tree), it does not operate on widgets, instead, a special descriptor EMF objects used. 
There is a special command get-object, which allows to extract an actual widget object and pass it to other command.<br>
Therefore, while writing custom command, it is better to declare an input parameter in EMF model as EJavaObject and then use it like this:<br> <br>

<div class="panel panel-default">
  <div class="panel-body">
    get-view "Package Explorer" | get-tree | get-object | my-custom-tree-command
  </div>
</div>
  
A good starting point to look at might be an {{m.eclCommand("invoke")}} command, which takes a Java object from input and invokes methods via reflection. 

It's model is described like this:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-invoke-model.png"></img>
</div>

<p>
  An implementation of {{m.eclCommand("invoke")}} command can be found at RCPTT repo.</p>
