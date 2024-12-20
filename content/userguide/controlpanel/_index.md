---
title: Control Panel
sidebar: userguide
menu:
  sidebar:
      parent: userguide
---

Control panel is automatically opened when recording starts and provides a quick access to main test case properties. When recording is in progress, its {{< uielement ui-script.gif >}}Script{{< / uielement >}} tab immediately updates with recorded actions.

There are two ways to start recording and open Control Panel:

- Use {{< uielement "../ui-record.gif" >}}Record{{< / uielement >}} button in [Test Case Editor](../testeditor).
- Use {{< uielement "ui-snippet.png" >}}Record a Snippet{{< / uielement >}} button on RCPTT main toolbar. This mode is convenient for quick experiments or recording short snippets which can be pasted to other test cases later. As well it is possible to save recorded script as a new test case.

See Control Panel screenshot below for more information.
{{< annotatedImage screenshot-cp.png >}}

  <!-- Home Button -->
 {{% annotate 74 64 93 83 %}} Return to IDE. Close control panel and restore main RCPTT IDE window. If recording is in progress, stop it automatically. If test case is not saved, prompt for a save.{{< / annotate >}}
  


  <!-- Save button -->
  {{< annotate 95 64 123 83 >}} Save. Saves current test case. If there's no current test case (i.e. Control Panel has been started by {{< uielement "ui-snippet.png" >}}Record a Snippet{{< / uielement >}} button), prompts for a test case location.
  {{< / annotate >}}
  
  

  <!-- Record button -->
 {{< annotate 136 64 155 83 >}}  Record/Stop button. Used to control recording. {{< / annotate >}}
  

  <!-- Replay button -->
 {{< annotate 157 64 176 83 >}}  Replay button.
  Replay current test case.{{< / annotate >}}
  

  <!-- Capture/Assertion modes -->
  {{< annotate 186 60 234 86 >}}
  Mode buttons.
  When recording is in progress, these buttons allow to switch between two modes:
          <li>{{< uielement "ui-capture-mode.gif" >}}Capture Mode{{< / uielement >}} &ndash; all user actions in AUT are recorded in a script. This is a default mode when recording starts.
      <li>{{< uielement "ui-assert-mode.gif" >}}Assertion Mode{{< / uielement >}} &ndash; this mode allows to select any widget inside AUT to add [assertions](../assertions/) for it's properties.
      .
  {{< / annotate >}}
  

  <!-- Script tab -->
 {{< annotate 62 91 116 111 >}}  Script tab (active by default).
  Current test script. When recording is in progress, it is automatically appended with newly recorded actions. When recording is stopped, its contents is editable.{{< / annotate >}}
  

  <!--Contexts tab -->
 {{< annotate 130 91 202 111 >}}  Contexts tab.
  Allows to add/remove [contexts](../contexts/) to current test case.{{< / annotate >}}
  

  <!-- Verifications tab -->
 {{< annotate 210 91 297 111 >}}  Verifications tab.
  Allows to add/remove [verifications](../verifications/) to current test case.{{< / annotate >}}
  

  <!-- Description tab -->
 {{< annotate 303 91 387 111 >}}  Description tab.
  Allows to view/edit a description of a current test case. This tab can be activated while recording in progress, so it might be convenient to put test steps into description section before starting recording and then follow those steps to avoid recoding of unnecessary actions.{{< / annotate >}}
  

  <!-- Options tab -->
 {{< annotate 392 91 459 111 >}}  Options tab.
  Contains a few rarely used options controlling the way in which user actions are being recorded.{{< / annotate >}}
  

  <!-- AUT name -->
 {{< annotate 330 37 452 55 >}}  AUT name.
  Indicates which application this control panel is currently working with.{{< / annotate >}}
  

  <!-- [Recording] -->
 {{< annotate 453 37 529 55 >}}  Indicates that recording is in progress now.{{< / annotate >}}

 {{< annotate 97 115 687 302>}}Capture results. This ECL code is executed, will reproduce actions done by user during recording. When {{< uielement "../ui-record.gif" >}} Record {{< / uielement >}} mode is inactive, this area is editable. Polish and refactor captured code before saving. {{< / annotate >}}
  

  
{{< / annotatedImage >}}
