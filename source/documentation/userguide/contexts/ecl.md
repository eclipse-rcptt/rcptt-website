---
title: ECL Script Contexts
slug: contexts/ecl
nav_name: userguide
layout: doc
---
{% import "macros" as m %}

<h3>Introduction</h3>

ECL Script contexts serve two purposes:

<ul>
<li>Allow to execute any ECL script before running your test. 
This can be useful for some test setup routines which cannot be performed 
by <a href="{{site.url}}/documentation/userguide/contexts/">other context types</a> but still 
they need to be separated from the main testing logic and/or re-used in multiple tests.</li>
<br>
<li>Allow to store <a href="{{site.url}}/documentation/userguide/procedures/">user-defined procedures</a> (defined as 'proc'). </li>
</ul>

