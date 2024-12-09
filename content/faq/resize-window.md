---
title: How to resize a window
slug: resize-window
date: 2015-01-15
---

Sometimes you may want a window to be a certain size.

# Maximize
To maximize a window you may use {{< eclCommand maximize >}} ECL command:
- to maximize main Eclipse window:
{{< highlight ecl >}}
get-eclipse-window | maximize
{{< / highlight >}}
- to maximize any window:
  - {{< highlight ecl >}}
get-window "WindowTitle" | maximize
{{< / highlight >}}
  - or
{{< highlight ecl >}}
get-eclipse-window | get-object | invoke setMaximized true
{{< / highlight >}}

# Minimize
To *minimize* a window: {{< highlight ecl >}}get-eclipse-window | get-object | invoke setMinimized true{{< / highlight >}}
Note: sometimes you need to set Maximized to 'false' before minimizing.
```
get-eclipse-window | get-object | invoke setMaximized false
get-eclipse-window | get-object | invoke setMinimized true
```
# Resize
To resize a window:
```
    get-eclipse-window | get-object | invoke setSize 700 700
```