---
title: Tree/Table Verifications
slug: treetable
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: verifications
---

{{< annotatedImage screenshot-tree-verification.png >}}
  
  <!-- Name -->
 {{< annotate 118 93 606 112 >}}  Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with 
  underscore character.{{< / annotate >}}

  <!-- Tags -->
 {{< annotate 118 119 582 138 >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  
  <!-- Capture button  -->
  {{< annotate 616 92 691 114 >}} Make a snapshot of AUT widget defined in {{< uielement >}}Widget{{< / uielement >}} field and copy it into verification.  {{< / annotate >}}

  <!-- Verify button  -->
  {{< annotate 616 118 691 140 >}} Verifies whether AUT tree/table defined in {{< uielement >}}Widget{{< / uielement >}} matches the tree/table from a verification.
  {{< / annotate >}}
  
  <!-- Widget -->
  {{< annotate 126 202 637 224 >}} AUT tree/table widget for verification. You can set the value manually or using {{< uielement >}}Pick...{{< / uielement >}} button.
 {{< / annotate  >}}
  
  <!-- Verify styles option  -->
 {{< annotate 155 239 310 261 >}}  Styles option for verification. Can be All/Ignore Styles/Ignore Styled Text. {{< / annotate >}}
  
  <!-- Allow children -->
 {{< annotate 317 239 482 262 >}} Turned on by default. If this option is off - verification fails if there are uncaptured children in AUT tree. {{< / annotate >}}
  
  <!-- Verify icons -->
 {{< annotate 486 239 596 262 >}} Turned on by default. If this option is off - verification ignores icons. {{< / annotate >}}
  
  <!-- Tree area -->
 {{< annotate 75 284 685 378 >}}  Captured tree/table. {{< / annotate >}}
  
{{< / annotatedImage >}}

Tree/Table verification is the most convenient way to assert the whole tree/table state at the end of the test case. 
It is simpler than ECL assertions, where you explicitly select a separate tree/table items to verify their properties.

## Style verification options
There are three options for style verification:
- All
- Ignore Styles
- Ignore Styled text

### All
Tree appearance is verified as is:
![](screenshot-tree-verification-all.png)

Verification fails if text style or content changes.

### Ignore Styles
Styled text is verified as a plain text:
![](screenshot-tree-verification-ignore-styles.png)

Verification fails if text content changes. Any style is accepted.

### Ignore Styled Text
If there is a styled text - it will be ignored:
![](screenshot-tree-verification-ignore-styled-text.png)

Verification fails if any unstyled text changed. Styled text may have any styles or content.


  
