---
title: Text Verifications
slug: verifications/text
sidebar: userguide
layout: doc
---

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-text-verification-editor-1.png"></img>
  
  <!-- Name -->
 {{< annotate  >}}  Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with 
  underscore character.{{< / annotate >}}
  {% set top, left, width, height = 93, 118, 100, 19 %}

  <!-- Tags -->
 {{< annotate  >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  {% set top, left, width, height = 119, 118, 100, 19 %}
  
  <!-- Capture button  -->
  Make a snapshot of a text from AUT widget defined in {{< uielement >}}Widget{{< / uielement >}} field and copy it into this verification. 
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}

  <!-- Verify button  -->
  Verifies whether a text in a text {{< uielement >}}Widget{{< / uielement >}} equals the text from a verification. If {{< uielement >}}Ignore text styling and colors{{< / uielement >}} option is off,
  verifies text style as well.  
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  
  <!-- Widget -->
  AUT text widget from which a text is taken for verification. You can set the value manually or using {{< uielement >}}Pick...{{< / uielement >}} button.
  {% endset %}
  {% set top, left, width, height = 202, 126, 511, 22 %}
  
  <!-- Pick button -->
 {{< annotate  >}}  Use this button to select AUT text widget for verification.{{< / annotate >}}
  {% set top, left, width, height = 202, 643, 42, 22 %}
  
  <!-- Text area -->
  Verified text. If {{< uielement >}}Ignore text styling and colors{{< / uielement >}} option is on you can edit text value. 
  {% endset %}
  {% set top, left, width, height = 261, 75, 595, 159 %}
  
  
 </div>
 
 ### How it works
 
Let's say you need to check the result of creating *public static void main* method stubs while adding a new Java Class.

So you go through the following steps:

<ul>
- Create a new test case, add required [contexts](../../contexts) and start recording. 
Create new Java class and check "create public static void main stubs" option. Stop recording - your actions are recorded as ECL script:</li>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-text-verification-1.png"></img></div>
  
- In a test case editor go to **Verification** tab and press {{< uielement ui-add.gif >}} Add{{< / uielement >}} button.
Click {{< uielement ui-capture.gif >}}Capture{{< / uielement >}} button and select **Widget text** verification type. 
Set verification name and press Finish. Now, while you are in a Capture mode, select Java Class editor. Your verification will be added into a test:</li>


<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-text-verification-2.png"></img></div>

- If you open verification you can see that it contains the styled text to verify and the widget to take the text from. Verification checks both: widget 
content and text styles. If you want to verify a plain text only, then you should select {{< uielement >}}Ignore text styling and colors{{< / uielement >}} option.</li>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-text-verification-3.png"></img></div>
  
- Now, when you run your test case, it's verification result will be shown in a Execution View:</li>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-text-verification-4.png"></img></div>

</ul>

