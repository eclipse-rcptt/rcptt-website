---
title: Eclipse Command Language
slug: ecl
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

ECL stands for Eclipse Command Language, and it was developed and initially introduced by Xored at EclipseCon '08 in California. 
ECL has its own story. It goes back to the early history of Eclipse Platform which had always experienced a lack of Scripting and 
Automation solutions. This problem is not related to a particular programming
(scripting) language but goes way further including an object model to script against it, data and code interoperability, and many more.

There were several projects trying to add easy scripting and automation to the platform; the most successful one was Eclipse Monkey 
(it was pretty dead before adopted widely). Monkey was using JavaScript as a scripting language and provided the object model (DOM) 
as a part of the project, which covered high level aspects of Eclipse APIs. However, we were not satisfied with Monkey's approach 
either, including JavaScript used by this project.

What we did want from a Scripting-and-Automation solution is the following:

<ul>

<li>The scripting language should be CLI-oriented, which means an end user (software engineers, testers, etc.) 
must be able to do virtually anything with Eclipse from a console window, for example, the same way as with the Unix shell. 
Here is a simple but actual ECL sample:
<br><br>
<div class="panel panel-default">
  <div class="panel-body">
    ecl-shell> create-project MyJavaProject -kind Java
  </div>
</div>
 
</li>
<li>

The scripting solution should be expressive. Our goal is to save time for software engineers and/or users, 
allowing to perform tasks faster then they would do with Java or JavaScript, or even using Eclipse UI. 
Please review the following code:
<br><br>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-ecl-1.png"></img>
  </div>
  </div>
</div>

Try to put the same code in Java using Eclipse APIs and it'll become several lines instead of a couple.<br><br>
</li>

<li>

The scripting solution must be a general purpose instrument. 
End users should be able to do virtually anything with their Eclipse environment using such a solution/language. As an example:<br><br>

<div class="panel panel-default">
  <div class="panel-body">
    <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-ecl-2.png"></img>
  </div>
  </div>
</div>
</li>

<li>

The scripting language should be extendable and let different adopters develop their own commands, which will be interoperable with other commands (such as Unix commands, for example). 
Moreover, these commands and internal data structures should be also interoperable with Eclipse Frameworks.

</li>
</ul>

<div class="panel panel-info">
<div class="panel-heading">
    Important
  </div>
  <div class="panel-body">
    To see the full list of ECL commands with their usage examples, please take a look at generated documentation <a href="https://hudson.eclipse.org/rcptt/job/rcptt-all/ws/releng/doc/target/doc/ecl/index.html">here</a>. 
  </div>
</div>
