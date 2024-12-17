---
title: Folder Contexts
slug: folder
sidebar: userguide
menu:
  sidebar:
    parent: contexts
---
# Introduction

If you need to prepare your AUT workspace you use a [Workspace context](../workspace) [Workspace context](../workspace) which places files on a workspace before a 
test execution. But sometimes you may need to put data somewhere outside your AUT workspace - anywhere on your disc
 space. Folder Context was coined for this purpose. When applied it puts files into a selected root folder. 
 
 {{< annotatedImage screenshot-folder-context-editor.png >}}
 <!-- Name -->
 {{< annotate 118 93 606 112 >}}A searchable name to quickly identify and find the context among others{{< / annotate >}} 
 <!-- Tags -->
 {{< annotate 118 119 582 138 >}}Tags allow arbitrary grouping of contexts. Use Tags view to see the groups.{{< / annotate >}} 
 <!-- Add Tags -->
 {{< annotate 584 118 606 140 >}}Add tags interactively{{< / annotate >}}
 <!-- Capture -->
 {{< annotate 616 92 691 114 >}}Make a snapshot of resources from a root path and copy them into this context{{< / annotate >}} 
 <!-- Apply -->
 {{< annotate 616 118 691 140 >}}Copy files from context into root. If {{< uielement >}}Clear root folder{{< / uielement >}} option is on, removes existing files from a root first. If the option is off, exising files are still replaced with matching ones from the context.{{< / annotate >}}
 <!-- Root path -->
 {{< annotate 145 202 616 224 >}}A destination for files. When a context is applied - its resources are copied into this location. If {{< uielement >}}Clear root folder{{< / uielement >}} option is on, it is wiped beforehand.{{< / annotate >}}
 <!-- Browse... -->
 {{< annotate 626 202 685 224 >}}Show Open File dialog to select root path{{< / annotate >}}
 <!-- Clear root folder before context application -->
 {{< annotate 75 232 355 254 >}}Clean (delete everything from, wipe) root before the context is applied. Dangerous - a typo in the {{< uielement >}}Root path{{< / uielement >}} may delete anything from filesystem irreversibly.{{< / annotate >}}
 {{< annotate 75 262 574 334 >}}Current content of the context. These files will owerwrite the data in the {{< uielement >}}Root path{{< / uielement >}} when context is applied.{{< / annotate >}}
  <!-- Add Files... -->
 {{< annotate 584 262 685 284 >}}Import files into the context. Allows to exlpicitly manage the content when {{< uielement "../../ui-capture.gif" >}}Capture{{< / uielement >}} is not suitable.{{< / annotate >}}
  <!-- Add Folder... -->
 {{< annotate 584 287 685 309 >}}Recursively import folder into a context. Allows to exlpicitly manage the content when {{< uielement "../../ui-capture.gif" >}}Capture{{< / uielement >}} is not suitable.{{< / annotate >}}
  <!-- Remove -->
 {{< annotate 584 312 685 334 >}}Remove selected resource(s) from this context. The resources in root path are untouched, but wil no logner be updated on {{< uielement "../ui-replay.gif">}}Apply{{< / uielement >}}{{< / annotate >}}
 {{< / annotatedImage >}}

  Above is a Folder Context which puts *img1.jpg* and *img2.jpg* files  in a *TestData* folder on a *C* disc.  
  You can also add a folder with files:
  
 
  
  *TestImages* folder with 2 files will be added to a root location when the context above is applied.
  
  # Root Path
  
  Folder context can use a relative path to a current User Directory or to AUT workspace.
  
  Let's say you need to place img1 and img2 files into *C://CurrentUserDirectory/TestData/*. 
  When you select it as a root path you will see that RCPTT replaces it with *home://TestData/*
  
  
![](screenshot-folder-context-editor-3.png)

  
  Which means that a folder context will pass regardless of the Current User Directory name.

  Likewise, AUT workspace path is replaced with *workspace://* which makes Folder Context act almost 
  like a [Workspace context](../workspace):
  
  ![](screenshot-folder-context-editor-4.png)
  
  If there is no TestData folder  - it will be created.

  If there already is TestData folder - its content will be **merged** with a context 
  content (only if {{< uielement >}}Clear root folder{{< / uielement >}} option is disabled).
  
  >  Even without {{< uielement >}}Clear root folder{{< / uielement >}} option, some of existing content may be overwritten and lost during *merge* operation.
  
# Clear root folder option
Like in a [Workspace context](../workspace) there is an option - Clear root 
folder before context application (disabled when the context is created).
{{< annotatedImage "screenshot-folder-context-editor-5.png" >}}
<!--  Clear root  -->
{{< annotate 75 232 280 22 >}}Turned off by default. Whether a root folder should be cleaned before the context is applied{{< / annotate >}} 
{{< / annotatedImage >}}
If enabled it leads to clearing a root folder before the context is applied.
  
  When the context above is applied all TestData content is deleted and then *TestImages* folder with *img1*, *img2* files are placed there.
  
  > ## Important
  >  Please be careful with root folder path - once you set something 
  >  like *home://* or *file://C:/* and enable {{< uielement >}}Clear root folder{{< / uielement >}} option - all your 
  >  root content will be completely deleted once a context is applied. 
  >  Please make sure that your root path is followed by any other folder like *home://TestData*.
  
# Test example: File Import

Let's say you need to test that file import works correctly. 
To do this you're going to import two files from a *//Desktop/TestData* into your Project1 using a Resource Perspective.  

You need the following contexts for your test:
  
## Workspace context
[Workspace context](../workspace) - to clear your AUT workspace and put Project1 there:
![](screenshot-folder-context-editor-6.png)

## Workbench context
[Workbench context](../workspace) - to open a Resource Perspective with Project Explorer view:
![](screenshot-folder-context-editor-7.png)

## Folder context
Folder Context - to put files for import into a *home://Desktop/TestData folder* (or to create this folder if there's no any):
![](screenshot-folder-context-editor-8.png)

Next, create a test case and add these three contexts into it and start recording - the contexts will be applied to make everything ready for a file Import:
![](screenshot-folder-context-editor-9.png)

Do not forget to add an [assertion](../../assertions) to verify that the images were successfully imported into a Project1 (see the selected script).
   
   
