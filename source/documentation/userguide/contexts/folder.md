---
title: Folder Contexts
slug: contexts/folder
nav_name: userguide
layout: doc
---
<h3>Introduction</h3>

If you need to prepare your AUT workspace you use a <a href = "{{site.url}}/documentation/userguide/contexts/workspace">Workspace context</a> which places files on a workspace before a 
test execution. But sometimes you may need to put data somewhere outside your AUT workspace - anywhere on your disc
 space. Folder Context was coined for this purpose. When it is applied it puts files into a selected root folder. 
 
{% import "macros" as m %}
{% include "screenshot-guide" %}
<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-folder-context-editor.png"></img>
  {# Name #}
  {% set overlayContent %}
  All you need to know about context name
  {% endset %}
  {% set top, left, width, height = 93, 118, 100, 19 %}
  {% include "overlay" %}
  
  {# Tags #}
  {% set overlayContent %}
  All you need to know about tags
  {% endset %}
  {% set top, left, width, height = 119, 118, 100, 19 %}
  {% include "overlay" %}

  {# Add Tags #}
  {% set overlayContent %}
  All you need to know about adding tags
  {% endset %}
  {% set top, left, width, height = 118, 584, 22, 22 %}
  {% include "overlay" %}
  
  {# Capture button  #}
  {% set overlayContent %}
  Make a snapshot of resources from a root path and copy them into this context
  {% endset %}
  {% set top, left, width, height = 92, 616, 75, 22 %}
  {% include "overlay" %}

  {# Apply button  #}
  {% set overlayContent %}
  Copy given resources into root. If {{m.uiElement("Clear root folder")}} option is on, removes existing resources from a root first.
  {% endset %}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  {% include "overlay" %}
  
  {# Browse button  #}
  {% set overlayContent %}
  Launch Open File dialog to select root path 
  {% endset %}
  {% set top, left, width, height = 202, 626, 59, 22 %}
  {% include "overlay" %}
  
  {# Root path  #}
  {% set overlayContent %}
  When a context is applied - given resources are copied into a root location. If {{m.uiElement("Clear root folder")}} option is on, existing resources are removed from a root first.
  {% endset %}
  {% set top, left, width, height = 202, 145, 471, 22 %}
  {% include "overlay" %}
  
  {# Clear root  #}
  {% set overlayContent %}
  Turned off by default. Whether a root folder should be cleaned before the context is applied
  {% endset %}
  {% set top, left, width, height = 232, 75, 280, 22 %}
  {% include "overlay" %}
  
  {# Resource area  #}
  {% set overlayContent %}
  Resources area lists current resources
  {% endset %}
  {% set top, left, width, height = 262, 75, 499, 72 %}
  {% include "overlay" %}
  
  {# Add Files  #}
  {% set overlayContent %}
  Import files into a context 
  {% endset %}
  {% set top, left, width, height = 262, 584, 101, 22 %}
  {% include "overlay" %}
  
  {# Add Folder  #}
  {% set overlayContent %}
  Import folder into a context.   
  {% endset %}
  {% set top, left, width, height = 287, 584, 101, 22 %}
  {% include "overlay" %}
  
  {# Remove  #}
  {% set overlayContent %}
  Remove selected resource(s) from a folder context
  {% endset %}
  {% set top, left, width, height = 312, 584, 101, 22 %}
  {% include "overlay" %}
  
  </div>
  
  Above is a Folder Context which puts <i>img1.jpg</i> and <i>img2.jpg</i> files  in a <i>TestData</i> folder on a <i>C</i> disc.  
  You can also add a folder with files:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-folder-context-editor-2.png"></img>
  </div>
  
  <i>TestImages</i> folder with 2 files will be added to a root location when the context above is applied.
  
  <h3>Root Path</h3>
  
  Folder context can use a relative path to a current User Directory or to AUT workspace.
  
  Let's say you need to place img1 and img2 files into <i>C://CurrentUserDirectory/TestData/</i>. 
  When you select it as a root path you will see that RCPTT replaces it with <i>home://TestData/</i>
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-folder-context-editor-3.png"></img>
  </div>
  
  Which means that a folder context will pass regardless of the Current User Directory name.

  Likewise, AUT workspace path is replaced with <i>workspace://</i> which makes Folder Context act almost 
  like a <a href = "{{site.url}}/documentation/userguide/contexts/workspace">Workspace context</a>:
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-folder-context-editor-4.png"></img>
  </div>
  
  If there is no TestData folder  - it will be created.

  If there already is TestData folder - its content will be <b>merged</b> with a context 
  content (only if {{m.uiElement("Clear root folder")}} option is disabled).
  
  <h3>Clear root folder option</h3>
  
  Like in a <a href = "{{site.url}}/documentation/userguide/contexts/workspace">Workspace context</a> there is an option - Clear root 
  folder before context application (disabled when the context is created).
  
  <div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-folder-context-editor-5.png"></img>
  
  {# Clear root  #}
  {% set overlayContent %}
  Turned off by default. Whether a root folder should be cleaned before the context is applied
  {% endset %}
  {% set top, left, width, height = 232, 75, 280, 22 %}
  {% include "overlay" %}
  </div>
  
  Been enabled it leads to clearing a root folder before the context is applied.
  
  When the context above is applied all TestData content is deleted and then <i>TestImages</i> folder with <i>img1</i>, <i>img2</i> files are placed there.
  
  <div class="panel panel-danger">
  <div class="panel-heading">Important</div>
  <div class="panel-body">
    Please be careful with root folder path - once you set something 
    like <i>home://</i> or <i>file://C:/</i> and enable {{m.uiElement("Clear root folder")}} option - all your 
    root content will be completely deleted once a context is applied. 
    Please make sure that your root path is followed by any other folder like <i>home://TestData</i>.
  </div>
  </div>
  <h3>Test example: File Import</h3>
  
  Let's say you need to test that file import works correctly. 
  To do this you're going to import two files from a <i>//Desktop/TestData</i> into your Project1 using a Resource Perspective.  

  You need the following contexts for your test:
  
  <ol>
    <li>
      <a href="{{site.url}}/documentation/userguide/contexts/workspace">Workspace context</a> - to clear your AUT workspace and put Project1 there:
      <div class="screenshot">
	<img src="{{site.url}}/shared/img/screenshot-folder-context-editor-6.png"></img>
      </div>
    </li>
    <li>
      <a href="{{site.url}}/documentation/userguide/contexts/workspace">Workbench context</a> - to open a Resource Perspective with Project Explorer view:
      <div class="screenshot">
	<img src="{{site.url}}/shared/img/screenshot-folder-context-editor-7.png"></img>
      </div>
    </li>
    <li>Folder Context - to put files for import into a <i>home://Desktop/TestData folder</i> (or to create this folder if there's no any):
      <div class="screenshot">
	<img src="{{site.url}}/shared/img/screenshot-folder-context-editor-8.png"></img>
      </div>
    </li>
    
    <div>
      Next, create a test case and add these three contexts into it and start recording - the contexts will be applied to make everything ready for a file Import:
    </div>
    <div class="screenshot">
      <img src="{{site.url}}/shared/img/screenshot-folder-context-editor-9.png"></img>
    </div>
    Do not forget to add an <a href="{{site.url}}/documentation/userguide/assertions">assertion</a> to verify that the images were successfully imported into a Project1 (see the selected script).
  </ol>
   
   
