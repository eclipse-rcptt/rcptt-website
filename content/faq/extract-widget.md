---
title: How to extract an SWT widget with an ECL command?
slug: extract-widget
date: 2015-01-15
sidebar: home
menu:
  sidebar:
    parent: faq
---
> I am trying to make a custom ECL command to extract a data from table in order to make my custom assertions on that data. I want to use the result of: `get-table | ...`
> 
> But when I read an object from `process.getInput().read()`, I get an object of the class `ControlHandlerImpl` and I don't know how to handle this further. Do you have some examples using the input pipe?

When RCPTT passes controls around (like in `get-view "..." | get-tree`), it does not operate on widgets, instead, a special descriptor EMF objects used. 
There is a special command {{< eclCommand get-object >}}, which allows to extract an actual widget object and pass it to other command.
Therefore, while writing custom command, it is better to declare an input parameter in EMF model as EJavaObject and then use it like this:

```ecl
get-view "Package Explorer" | get-tree | get-object | my-custom-tree-command
```

A good starting point to look at might be an {{< eclCommand invoke >}} command, which takes a Java object from input and invokes methods via reflection. 

It's model is described like this:

![screenshot](../screenshot-invoke-model.png)

An implementation of {{< eclCommand invoke >}} command can be found at RCPTT repo.</p>
