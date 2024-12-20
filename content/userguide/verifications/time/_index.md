---
title: Execution Time Verifications
slug: time
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: verifications
---

{{< annotatedImage screenshot-time-verification-editor.png >}}
  
  <!-- Name -->
 {{< annotate 118 93 606 112 >}}  Verification name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with 
  underscore character.{{< / annotate >}}

  <!-- Tags -->
 {{< annotate 118 119 580 138 >}}  Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  
  <!-- Capture button  -->
 {{< annotate 616 92 691 114 >}}  Disabled for time verification {{< / annotate >}}

  <!-- Verify button  -->
 {{< annotate 616 118 691 140 >}}  Disabled for time verification{{< / annotate >}}
  
  <!-- Executiontime  -->
 {{< annotate 100 228 320 255 >}}  Verification checks that a test case is executed no longer than specified amount of time{{< / annotate >}}
  
  <!-- Include context option  -->
 {{< annotate 75 265 382 287 >}}  Disabled by default. If this option is on, verification checks the test execution time including a time of contexts execution{{< / annotate >}}

{{< / annotatedImage >}}
  
  Execution time verification can be used for performance testing. Being added to a test case verification makes sure that test case execution taked no longer then a specified
  amount of time. 
  
> Please note that there is a launch timeout for a test case execution in RCP TT Preferences (300 sec by default).  If your test case needs to be executed for longer - you need to change timeout value. When the configured timeout is reached, test will be aborted independently of time verification configuration.
