---
title: How to resize a window
slug: resize-window
date: 2015-01-15
sidebar: home
menu:
  sidebar:
    parent: faq
---

Sometimes you may want a window to be a certain size.

# Maximize
To maximize a window you may use {{< eclCommand maximize >}} ECL command:
- to maximize main Eclipse window:
  ```
  get-eclipse-window | maximize
  ```
- to maximize any window:
  - either:
    ```
    get-window "WindowTitle" | maximize
    ```
  - or
    ```
    get-eclipse-window | get-object | invoke setMaximized true
    ```

# Minimize
To *minimize* a window:
```
get-eclipse-window | get-object | invoke setMinimized true
```
Note: sometimes you need to set Maximized to 'false' before minimizing:
```
get-eclipse-window | get-object | invoke setMaximized false
get-eclipse-window | get-object | invoke setMinimized true
```
# Resize
To resize a window:
```
    get-eclipse-window | get-object | invoke setSize 700 700
```