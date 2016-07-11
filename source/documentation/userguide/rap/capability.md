---
title: Capability Contexts
slug: rap/capability
nav_name: userguide
layout: doc
---

{% import "macros" as m %}

The capability context allows to describe sets of contexts for certain platforms (e3, e4. rap).  At implementation of data the context automatically defines a platform and returns the necessary set of contexts.

1. For creation of a CapabilityContext you should to  select Capability item in the new context wizard.

<img src="{{site.url}}/shared/img/rap/pasted-image-20.png"></img>
<br><br>

2. For creation of section with a set of contexts for the RAP platform. Click on buttons of addition «New capability».

<img src="{{site.url}}/shared/img/rap/pasted-image-24.png" width="500"></img>        <img src="{{site.url}}/shared/img/rap/pasted-image-27.png" width="200"></img>
<br><br>

3. In dialog select the RAP runtime platform. Next Press OK button. (The dialog allows to choose several runtime platform)

4. The RAP capability section  appears in the editor of capability context the section RAP . The section allows to add specific contexts for the RAP runtime platform.

5. The buttons: <img src="{{site.url}}/shared/img/rap/pasted-image-33.png"></img>(Add,Delete,Move Up, Move Down) allows managed a section structure. . (Add, Delete, MoveUp MoveDown). The button <img src="{{site.url}}/shared/img/rap/pasted-image-36.png"></img>(Edit) allows to change set of runtime platform for section . The button <img src="{{site.url}}/shared/img/rap/pasted-image-38.png"></img>(Remove) a section with all contained contexts.

6. Add new ECL context to the rap section. Click on "Add" button. 

<img src="{{site.url}}/shared/img/rap/pasted-image-40.png"></img>
<br><br>

7. Next in a select context dialog click on "New..." button, and create ECL context

<img src="{{site.url}}/shared/img/rap/pasted-image-43.png"></img>
<br><br>

8. The created context appears in the section RAP.

<img src="{{site.url}}/shared/img/rap/pasted-image-46.png" width="700"></img>
<img src="{{site.url}}/shared/img/rap/pasted-image-52.png" width="700"></img>
<br><br>

9. Add e3+e4 a capability section.Also having added to it ECL Context

<img src="{{site.url}}/shared/img/rap/pasted-image-49.png"></img>
<br><br>

10. Create simple test case and add reference to our capability context

<img src="{{site.url}}/shared/img/rap/pasted-image-55.png" width="700"></img>
<br><br>

11. Execute the test case on the rap AUT. You can see that our context is replaced on contexts from a suitable runtime platform.

<img src="{{site.url}}/shared/img/rap/pasted-image-58.png"></img>
<br><br>

Sometimes it is necessary to convert the existing context into  a capability context. For this purpose it is necessary to open the context menu on convertible object and to click on the "Convert to CapabilityContext" menu item.  

<h3>Replacing existing context with Capability context.</h3>

To set the name of created context and to choose the capability modes. After pressing the ok buttons. All referring objects on a context will update the references.

<img src="{{site.url}}/shared/img/rap/pasted-image-61.png" width="400"></img>
<img src="{{site.url}}/shared/img/rap/pasted-image-64.png" width="300"></img>
<br><br>