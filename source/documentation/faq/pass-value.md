---
title: How to pass a value to a test during its execution.
slug: pass-value
nav_name: faq
layout: faq
---
{% import "macros" as m %}

In case when it is required to pass some values to a test in command line, it is possible to do it like this:

<ol>
  <li>In AUT VM arguments pass desired parameters as Java properties, i.e. add arguments like this:
    <pre>-DpropertyName=propertyValue </pre>
  </li>
  <li>Use  ECL command {{m.eclCommand("substitute-variables")}} (which uses <b>org.eclipse.core.variables</b> plugin) to get a property value like this:</li>
  <pre>//writes prop val to AUT workspace log
log [substitute-variables "${system_property:propertyName}"]</pre>
</ol>

With aid of <a href="{{site.url}}/documentation/userguide/procedures/"> variables and user-defined procedures</a>, this becomes even more convenient:
<ol>
  <li>Create ECL context which consist of only one command, declaring global variables:
<pre>global [val prop1 [substitute-variables "${system_property:prop1}"]]
       [val prop2 [substitute-variables "${system_property:prop2}"]]
  [val prop3 [substitute-variables "${system_property:prop3}"]]</pre>
  </li>

  <li>Add this ECL context to project's default contexts in Project Settings<br></li>
  <li>Access anywhere in ECL these properties using $-syntax:
    <pre>concat $prop1 $prop2 $prop3 | show-alert</pre>
  </li>
</ol>

<div class="panel panel-info">
<div class="panel-heading">
Important
</div>

<div class="panel-body">
When AUT does not include <b>org.eclipse.core.variables</b> plugin and hence command 'substitute-variables' fails, it is possible to use {{m.eclCommand("get-java-property")}} to get JVM system property value.
  </div></div>

