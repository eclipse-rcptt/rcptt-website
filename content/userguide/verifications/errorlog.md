---
title: Error Log Verifications
slug: verifications/errorlog
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: verifications
---

{{< annotatedImage "../screenshot-error-log-verification-editor.png" >}}
  
  <!-- Name -->
 {{< annotate 118 93 605 112 >}}Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.{{< / annotate >}}

  <!-- Tags -->
 {{< annotate 118 119 581 138 >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  
  <!-- Capture button  -->
 {{< annotate 616 92 691 114 >}}  Make a snapshot of all Error Log messages which are thrown during the last test case execution. {{< / annotate >}}

  <!-- Verify button  -->
 {{< annotate 616 118 691 140 >}}  Disabled for Error Log Verification{{< / annotate >}}
  
  <!-- Require area -->
 {{< annotate 75 206 685 280 >}}  Define the Error Log messages which are required here. Regular expressions are supported. You can drag and drop message 
  patterns from one rule area to another. {{< / annotate >}}
  
  <!-- Add button -->
 {{< annotate 597 181 618 202 >}}  Add new message pattern{{< / annotate >}}
  
   <!-- Remove button -->
 {{< annotate 620 181 641 202 >}}  Remove selected message pattern(s) {{< / annotate >}}
  
  <!-- Order buttons -->
 {{< annotate 643 181 683 202 >}}  Change the order of patterns.  {{< / annotate >}}
  
  <!-- Allow area -->
 {{< annotate 75 312 685 386 >}}  Define the Error Log messages which are allowed here. Regular expressions are supported. You can drag and drop message patterns from one rule area to another. {{< / annotate >}}

  
  <!-- Deny area -->
 {{< annotate 75 418 685 492 >}}  Define the Error Log messages which are not allowed here. Regular expressions are supported. You can drag and drop message patterns from one rule area to another. {{< / annotate >}}
  
  {{< / annotatedImage >}}
  
  Error Log Verification editor allows to define a set of rules which are used to check the changes of AUT Error Log 
  during a test case execution. You can describe which messages are allowed/required/denied by adding corresponding message patterns.
  Regular expressions are supported for Plugin Pattern/Message Pattern fields. 
  
