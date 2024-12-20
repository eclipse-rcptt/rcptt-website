---
title: Text Verifications
slug: text
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: verifications
---

{{< annotatedImage "screenshot-text-verification-editor-1.png" >}}
  
  <!-- Name -->
 {{< annotate 118 93 606 112 >}}  Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with 
  underscore character.{{< / annotate >}}

  <!-- Tags -->
 {{< annotate 118 119 581 138 >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  
  <!-- Capture button  -->
  {{< annotate 616 92 691 114 >}}Make a snapshot of a text from AUT widget defined in {{< uielement >}}Widget{{< / uielement >}} field and copy it into this verification. 
  {{< / annotate >}}

  <!-- Verify button  -->
  {{< annotate 616 118 691 140 >}} Verifies whether a text in a text {{< uielement >}}Widget{{< / uielement >}} equals the text from a verification. If {{< uielement >}}Ignore text styling and colors{{< / uielement >}} option is off, verifies text style as well. {{< / annotate >}}

  <!-- Widget -->
  {{< annotate 126 202 637 224 >}} AUT text widget from which a text is taken for verification. You can set the value manually or using {{< uielement >}}Pick...{{< / uielement >}} button.
  {{< / annotate >}}
  
  <!-- Pick button -->
 {{< annotate 643 202 685 224 >}}  Use this button to select AUT text widget for verification.{{< / annotate >}}
  
  <!-- Text area -->
  {{< annotate 75 261 670 420 >}} Verified text. If {{< uielement >}}Ignore text styling and colors{{< / uielement >}} option is on you can edit text value. {{< / annotate >}}
  
  <!-- Ignore text styling and colors -->
  {{< annotate 75 443 254 460 >}} Verification will pass even if color, font or other text formatiing does not match {{< / annotate >}}
 {{< / annotatedImage >}}

## Example
Let's say you need to check the result of creating *public static void main* method stubs while adding a new Java Class.

So you go through the following steps:

- Create a new test case, add required [contexts](../../contexts)
- Start recording. 
  - Create new Java class and check "create public static void main stubs" option.
- Stop recording - your actions have been recorded as ECL script:
  ![](screenshot-text-verification-1.png)
- In a test case editor go to **Verification** tab and press {{< uielement "../../ui-add.gif" >}} Add{{< / uielement >}} button Click {{< uielement  "../../ui-capture.gif" >}}Capture{{< / uielement >}} button and select **Widget text** verification type. Set verification name and press Finish. Now, while you are in a Capture mode, select Java Class editor. Your verification will be added into a test:
  ![](screenshot-text-verification-2.png)
- If you open verification you can see that it contains the styled text to verify and the widget to take the text from. Verification checks both:
  - text content
  - and text styles.

  If you want to verify a plain text only, then select {{< uielement >}}Ignore text styling and colors{{< / uielement >}} option.
  ![](screenshot-text-verification-3.png)
  
- Now, when you run your test case, it's verification result will be shown in a Execution View:
  ![](screenshot-text-verification-4.png)


