---
title: Parameters Contexts
slug: parameters
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: contexts
---

{{< annotatedImage screenshot-parameters-context-editor.png >}}
  
  <!-- Name -->
 {{< annotate 118 93 606 112 >}}Context name. This name is automatically synced with file system name. Symbols in name which are not allowed in file names are replaced with underscore character.{{< / annotate >}}

  <!-- Tags -->
 {{< annotate 118 119 580 138 >}}Comma-separated list of arbitrary hierarchical tags, i.e. <code>resourcePerspective, jira/PC-1352, windows-only</code>{{< / annotate >}}
  
  <!-- Add Tags -->
 {{< annotate 583 118 605 140 >}}  Use this button to open tag selection dialog with list of tags from another test resources.{{< / annotate >}}

  <!-- Capture button  -->
 {{< annotate 615 92 690 114 >}} Unavailable for Parameters Context{{< / annotate >}}

  <!-- Add -->
 {{< annotate 610 210 684 232 >}}  Add new parameter in a Parameters Context{{< / annotate >}}
  
  <!-- Remove -->
 {{< annotate 610 239 684 261 >}}  Remove parameter(s) from a Context{{< / annotate >}}
  
  <!-- Parameters list -->
 {{< annotate 75 210 604 320 >}}  A list of parameters with their values{{< / annotate >}}
  
  {{< / annotatedImage >}}
  
### Introduction

One of the most asked features for RCPTT is to execute a same test with different parameters. 
This article demonstrates how Parameters Context and [Super Context](../super) achieve this. 
As an example, let's test error messages in *JDT New Class* Wizard. We start with a Java project with a single class:

![](screenshot-parameters-context-tree-2.png)

First, let's record an initial script which launches a new class wizard, sets package and class name and asserts an error message:
  
![](screenshot-parameters-context-3.png)

Now, what we really want is to type various values into 
*Package* and *Name* fields and make sure that error message changes accordingly. 
As a next step, let's parameterize a script using Parameters Context:
  
![](screenshot-parameters-context-4.png)
  
Next, let's place a Parameters Context into a Test Case and use `$paramName` in a script:
  
![](screenshot-parameters-context-5.png)
  
Please learn more about more efficient way of script parametrization by using [Super Context](../super)
  
  
  
  
