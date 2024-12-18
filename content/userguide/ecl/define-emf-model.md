---
title: Define EMF model for ShowViews command
slug: define-emf-model
sidebar: userguide
menu:
  sidebar:
      parent: ecl
layout: doc
---

### Create Ecore Model

<ul>
- Create **model** folder in the root directory of your plugin</li>
- Right click on model folder and select **New > Other... > Eclipse Modeling Framework > Ecore Model > Next**</li>
- Choose a name for your model. In our case it will be **view.ecore**</li>
- Press {{< uielement >}}Finish{{< / uielement >}}</li>
</ul>

Created model will be opened in the editor and we need to specify package details using Properties View as shown below:

![](screenshot-new-command-guide-2.png)

### Add ShowViews command class

We need to create new EClass for our ECL command.
<ul>
- Create new EClass and change its name to **ShowViews** in the Properties View</li>
- Right click your editor and select {{< uielement >}}Load Resource...{{< / uielement >}} menu item</li>
- In the opened dialog press {{< uielement >}}Browse Workspace...{{< / uielement >}} button</li>
- Select **org.eclipse.rcptt.ecl.core/model/ecl.ecore** package:</li>
</ul>
<br>

![](screenshot-new-command-guide-3.png)
<ul>
- Add **Command** from the ECL package as a super type to your ShowViews class.</li>
</ul>

### Add View class

Now we need one more EClass to represent Eclipse View details.
<ul>
- Create EClass called **View**</li>
- Add three string attributes to this class: **id**, **label</b> and <b>description**</li>
</ul>

![](screenshot-new-command-guide-4.png)

### Generate java sources

We need to create generation model to build java sources for our model.
<ul>
- Right click on the **view.ecore</b> file in the <b>Package Explorer</b> and select <b>New > Other... > Eclipse Modeling Framework > EMF Generator Model > Next**</li>
- Default **view.genmodel** name for generator model is OK for us, so just press {{< uielement >}}Next{{< / uielement >}}</li>
- Select Ecore model item and press {{< uielement >}}Next{{< / uielement >}}</li>
- Click {{< uielement >}}Load{{< / uielement >}} button and press {{< uielement >}}Next{{< / uielement >}} again</li>
- Select view.ecore as a root package and add ECL and EMF packages as references. Press {{< uielement >}}Finish{{< / uielement >}}</li>
</ul>

![](screenshot-new-command-guide-5.png)
<ul>
- In the opened editor select View package and change base package attribute to **org.eclipse.rcptt.ecl.example**:</li>
</ul>

![](screenshot-new-command-guide-6.png)

<ul>
- Right click View package and select {{< uielement >}}Generate Model Core{{< / uielement >}}. All necessary java sources will be generated.</li>
</ul>

<div class="panel panel-warning">
<div class="panel-heading">
    <h3 class="panel-title">Important</h3>
  </div>
  <div class="panel-body">
    Please note, that you should set the same runtime version for **view.genmodel</b> as you have for <b>ecl.genmodel</b> in <b>org.eclipse.rcptt.ecl.core**.
 </div>
</div>
