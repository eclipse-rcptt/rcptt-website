---
title: How to assert native message boxes?
slug: assert-native-message-box
nav_name: faq
layout: faq
---
{% import "macros" as m %}

<div class="panel panel-default">
  <div class="panel-body">
   <i> I want to record the "Information" message box  which pops up in my tool. 
   <br> How to use assert in this automation?
</i>
  </div>
</div>

Dealing with native message boxes, RCPTT might not show them during replay, 
but instead remember its return value during recording (by adding a command 'set-dialog-result' to a script) 
and automatically 'substitute' its value to your application's caller code (we have to do that, because RCPTT 
does not work on an operating system level, hence if it would open this dialog, there won't be a way to automatically close it).

But sometimes it may be needed to verify some properties of native message box like 'title' or 'message text'.

Now you can do it using <a href="https://ci.eclipse.org/rcptt/job/master/lastSuccessfulBuild/artifact/releng/doc/target/doc/ecl/index.html#get-last-message-box">get-last-message-box</a> ECL command.

Please note that this command can't be automatically recorded (you still can't select message box in assertion mode), instead, you should manually insert it into your test script:

{% set snippet %}
set-dialog-result MessageBox 128
get-view "Q7 Quality Mockups" | get-group "MessageBox Test" | get-button "Message Box with YES/NO Buttons" | click
get-last-message-box | get-property title | equals "Warning" | verify-true
get-last-message-box | get-property message | equals "This MessageBox with warning" | verify-true
{% endset %}
{{m.ecl(snippet)}}