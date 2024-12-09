---
title: How to assert native message boxes?
date: 2019-10-17
slug: assert-native-message-box
---

> I want to record the "Information" message box  which pops up in my tool. How to use assert in this automation?

RCPTT does not show native message dialogs during replay, but instead remembers their results during recording (by adding a command {{< eclCommand set-dialog-result >}} to a script) and automatically returns the remembered value to your application's caller code during replay (it has to do that, because there is no way to automatically close a system-level dialog).

But sometimes it may be needed to verify some properties of native message box like 'title' or 'message text'.

Now you can do it using  {{< eclCommand get-last-message-box >}} ECL command.

Please note that this command can't be automatically recorded (you still can't select message box in assertion mode), instead, you should manually insert it into your test script:

```
set-dialog-result MessageBox 128
get-view "Q7 Quality Mockups" | get-group "MessageBox Test" | get-button "Message Box with YES/NO Buttons" | click
get-last-message-box | get-property title | equals "Warning" | verify-true
get-last-message-box | get-property message | equals "This MessageBox with warning" | verify-true
```
