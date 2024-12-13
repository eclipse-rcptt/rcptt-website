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
{{< annotate 118 93 606 112 >}}A searchable name to quickly identify and find the context among others{{< / annotate >}}
  
  <!-- Tags -->
 {{< annotate 118 119 581 138 >}}  All you need to know about tags{{< / annotate >}}
  {% set top, left, width, height = 119, 118, 100, 19 %}

  <!-- Add Tags -->
 {{< annotate  >}}  All you need to know about adding tags{{< / annotate >}}
  {% set top, left, width, height = 118, 584, 22, 22 %}
  
  <!-- Capture button  -->
 {{< annotate  >}}  Capturing is disabled for Group Context{{< / annotate >}}
  {% set top, left, width, height = 92, 616, 75, 22 %}

	<!-- Add context -->
 {{< annotate  >}}  Opens context selection dialog{{< / annotate >}}
  {% set top, left, width, height = 181, 598, 20, 20 %}
  
  <!-- Move up -->
 {{< annotate  >}}  Moves selected context up{{< / annotate >}}
  {% set top, left, width, height = 181, 642, 20, 20 %}

  <!-- Move down -->
 {{< annotate  >}}  Moves selected context down{{< / annotate >}}
  {% set top, left, width, height = 181, 664, 20, 20 %}
  
  <!-- Replay button  -->
 {{< annotate  >}}  Applies the contexts one by one in the order they are displayed. {{< / annotate >}}
  {% set top, left, width, height = 118, 616, 75, 22 %}
  
  <!-- Contexts area -->
  {% set overlayContent %}

{{< / annotatedImage >}}

  <p>Context area lists current [contexts](../contexts/). Drag contexts to change their order, drop contexts from Test Explorer to add. When group context is executed, contexts are applied in order they listed.</p>

  <p>Sometimes context order is important &ndash; for instance, if workbench context opens a file in editor, usually [workspace</a> context which ensures this file exists should go before <a href="{{site.url}}/documentation/userguide/contexts/workbench">workbench](../contexts/workspace) context.</p>
  {% endset %}
  {% set top, left, width, height = 206, 75, 610, 113 %}
  
  

</div>
