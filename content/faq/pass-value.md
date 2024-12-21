---
title: How to pass a value to a test runtime
slug: pass-value
date: 2015-04-14
sidebar: home
menu:
  sidebar:
    parent: faq
---


In case when it is required to pass some values to a test in command line, it is possible to do it like this:

- In AUT VM arguments pass desired parameters as Java properties, i.e. add arguments: 
{{< highlight bash >}}-DpropertyName=propertyValue{{< / highlight >}}
- Use ECL command {{< eclCommand substitute-variables >}} (which uses `org.eclipse.core.variables` plugin) to get a property value:
```ecl
// writes prop val to AUT workspace log
log [substitute-variables "${system_property:propertyName}"]
```

With aid of [variables and user-defined procedures](../../userguide/procedures/) variables and user-defined procedures, this becomes even more convenient:
- Create ECL context which consist of only one command, declaring global variables:
  ```
  global [val prop1 [substitute-variables "${system_property:prop1}"]]
       [val prop2 [substitute-variables "${system_property:prop2}"]]
       [val prop3 [substitute-variables "${system_property:prop3}"]]
  ```
- Add this ECL context to project's default contexts in Project Settings
- Access these properties in any ECL using $-syntax:
{{< highlight ecl >}}concat $prop1 $prop2 $prop3 | show-alert{{< / highlight >}}


# Important
When AUT does not include `org.eclipse.core.variables` plugin and hence command {{< eclCommand substitute-variables >}} fails, it is still possible to use {{< eclCommand get-java-property >}} to get JVM system property value.

