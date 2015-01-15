---
title: Define EMF model for ShowViews command
slug: userguide/ecl/define-emf-model
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

<h3>Create Ecore Model</h3>

<ul>
<li>Create <b>model</b> folder in the root directory of your plugin</li>
<li>Right click on model folder and select <b>New > Other... > Eclipse Modeling Framework > Ecore Model > Next</b></li>
<li>Choose a name for your model. In our case it will be <b>view.ecore</b></li>
<li>Press <span class="uiElement">Finish</span></li>
</ul>

Created model will be opened in the editor and we need to specify package details using Properties View as shown below:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-2.png"></img>
</div>

<h3>Add ShowViews command class</h3>

We need to create new EClass for our ECL command.
<ul>
<li>Create new EClass and change its name to <b>ShowViews</b> in the Properties View</li>
<li>Right click your editor and select <span class="uiElement">Load Resource...</span> menu item</li>
<li>In the opened dialog press <span class="uiElement">Browse Workspace...</span> button</li>
<li>Select <b>org.eclipse.rcptt.ecl.core/model/ecl.ecore</b> package:</li>
</ul>
<br>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-3.png"></img>
</div>
<ul>
<li>Add <b>Command</b> from the ECL package as a super type to your ShowViews class.</li>
</ul>

<h3>Add View class</h3>

Now we need one more EClass to represent Eclipse View details.
<ul>
<li>Create EClass called <b>View</b></li>
<li>Add three string attributes to this class: <b>id</b>, <b>label</b> and <b>description</b></li>
</ul>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-4.png"></img>
</div>

<h3>Generate java sources</h3>

We need to create generation model to build java sources for our model.
<ul>
<li>Right click on the <b>view.ecore</b> file in the <b>Package Explorer</b> and select <b>New > Other... > Eclipse Modeling Framework > EMF Generator Model > Next</b></li>
<li>Default <b>view.genmodel</b> name for generator model is OK for us, so just press <span class="uiElement">Next</span></li>
<li>Select Ecore model item and press <span class="uiElement">Next</span></li>
<li>Click <span class="uiElement">Load</span> button and press <span class="uiElement">Next</span> again</li>
<li>Select view.ecore as a root package and add ECL and EMF packages as references. Press <span class="uiElement">Finish</span></li>
</ul>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-5.png"></img>
</div>
<ul>
<li>In the opened editor select View package and change base package attribute to <b>org.eclipse.rcptt.ecl.example</b>:</li>
</ul>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-6.png"></img>
</div>

<ul>
<li>Right click View package and select <span class="uiElement">Generate Model Core</span>. All necessary java sources will be generated.</li>
</ul>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">Important</h3>
  </div>
  <div class="panel-body">
    Please note, that you should set the same runtime version for <b>view.genmodel</b> as you have for <b>ecl.genmodel</b> in <b>org.eclipse.rcptt.ecl.core</b>.
 </div>
</div>
