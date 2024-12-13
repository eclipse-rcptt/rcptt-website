---
title: Group Contexts
slug: group
sidebar: userguide
menu:
  sidebar:
      parent: contexts
---

The Group context represents combined references to contexts of other type which might help in context management. 
It is possible to group together [Workspace](../workspace), [Workbench](../workbench), [Preferences](../preferences), etc., contexts together and refer to this group as 
a single Group context in the Test Editor. The Group Context editor looks quite similar to the Contexts panel in 
the [Test Editor](../../testeditor).

{{< annotatedImage "screenshot-group-context-editor.png" >}}
<!-- Name -->
{{< annotate 118 93 606 112 >}} A searchable name to quickly identify and find the context among others{{< / annotate >}}
  
  <!-- Tags -->
 {{< annotate 118 119 581 138 >}} Tags allow arbitrary grouping of contexts. Use Tags view to see the groups.{{< / annotate >}}

  <!-- Add Tags -->
 {{< annotate 584 118 606 140 >}} Add tags interactively{{< / annotate >}}
  
  <!-- Capture button  -->
 {{< annotate 616 92 691 114 >}} Group Context capture is not available{{< / annotate >}}
 
	<!-- Add context -->
 {{< annotate 598 181 618 201 >}} Add another child context {{< / annotate >}}
  
  <!-- Remove -->
 {{< annotate 620 181 640 201 >}} Removes selected child context {{< / annotate >}}

  <!-- Move up -->
 {{< annotate 642 181 662 201 >}} Moves selected context up {{< / annotate >}}

  <!-- Move down -->
 {{< annotate 664 181 684 201 >}} Moves selected context down {{< / annotate >}}
  
  <!-- Replay button  -->
 {{< annotate 616 118 691 140 >}} Applies the contexts one by one in the order they are displayed. {{< / annotate >}}

 <!-- Contexts area -->
 {{% annotate 75 206 685 319 %}} 
  Context area lists current [contexts](../). Drag contexts to change their order, drop contexts from Test Explorer to add. When group context is executed, contexts are applied in order they listed.

  Sometimes context order is important &ndash; for instance, if workbench context opens a file in editor, usually [workspace context](../workspace) which ensures this file exists should go before [workbench context](../workbench).
  {{% / annotate %}}
{{< / annotatedImage >}}
