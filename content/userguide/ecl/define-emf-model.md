---
title: Define EMF model for ShowViews command
slug: userguide/ecl/define-emf-model
sidebar: userguide
layout: doc
---

### Create Ecore Model

<ul>
<li>Create **model** folder in the root directory of your plugin</li>
<li>Right click on model folder and select **New > Other... > Eclipse Modeling Framework > Ecore Model > Next**</li>
<li>Choose a name for your model. In our case it will be **view.ecore**</li>
<li>Press {{< uielement >}}Finish{{< / uielement >}}</li>
</ul>

Created model will be opened in the editor and we need to specify package details using Properties View as shown below:

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-2.png"></img>
</div>

### Add ShowViews command class

We need to create new EClass for our ECL command.
<ul>
<li>Create new EClass and change its name to **ShowViews** in the Properties View</li>
<li>Right click your editor and select {{< uielement >}}Load Resource...{{< / uielement >}} menu item</li>
<li>In the opened dialog press {{< uielement >}}Browse Workspace...{{< / uielement >}} button</li>
<li>Select **org.eclipse.rcptt.ecl.core/model/ecl.ecore** package:</li>
</ul>
<br>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-3.png"></img>
</div>
<ul>
<li>Add **Command** from the ECL package as a super type to your ShowViews class.</li>
</ul>

### Add View class

Now we need one more EClass to represent Eclipse View details.
<ul>
<li>Create EClass called **View**</li>
<li>Add three string attributes to this class: **id**, **label</b> and <b>description**</li>
</ul>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-4.png"></img>
</div>

### Generate java sources

We need to create generation model to build java sources for our model.
<ul>
<li>Right click on the **view.ecore</b> file in the <b>Package Explorer</b> and select <b>New > Other... > Eclipse Modeling Framework > EMF Generator Model > Next**</li>
<li>Default **view.genmodel** name for generator model is OK for us, so just press {{< uielement >}}Next{{< / uielement >}}</li>
<li>Select Ecore model item and press {{< uielement >}}Next{{< / uielement >}}</li>
<li>Click {{< uielement >}}Load{{< / uielement >}} button and press {{< uielement >}}Next{{< / uielement >}} again</li>
<li>Select view.ecore as a root package and add ECL and EMF packages as references. Press {{< uielement >}}Finish{{< / uielement >}}</li>
</ul>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-5.png"></img>
</div>
<ul>
<li>In the opened editor select View package and change base package attribute to **org.eclipse.rcptt.ecl.example**:</li>
</ul>

<div class="screenshot">
  <img src="{{site.url}}/shared/img/screenshot-new-command-guide-6.png"></img>
</div>

<ul>
<li>Right click View package and select {{< uielement >}}Generate Model Core{{< / uielement >}}. All necessary java sources will be generated.</li>
</ul>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">Important</h3>
  </div>
  <div class="panel-body">
    Please note, that you should set the same runtime version for **view.genmodel</b> as you have for <b>ecl.genmodel</b> in <b>org.eclipse.rcptt.ecl.core**.
 </div>
</div>
