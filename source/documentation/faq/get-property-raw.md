---
title: What is the difference between Assert and Verify commands or how to get raw property values?
slug: get-property-raw
nav_name: faq
layout: faq
---
{% import "macros" as m %}

Both commands can be used inside try/catch, however in this case an error message won't be displayed in a report.
It's a long story how we came to a situation when we have two seemingly the same commands and the primary reason is that we need it because of backward compatibility and a design mistake.
Originally ECL is independent project from RCPTT, which we chose to use as a scripting language for our UI commands, so all ECL commands available in RCPTT can be split into two categories:

<ul>
<li>General-purpose ECL commands</li>
<li>RCPTT-specific commands</li>
</ul>

{{m.eclCommand("verify-true")}} is RCPTT-specific command. 
In order to provide user-friendly error messages (i.e. <kbd>expected 'foo', but got 'bar'</kbd>), this command does not operate with raw property values. 
When {{m.eclCommand("get-property")}} command 
is executed, internally it does not return a property value, but instead it returns a special
 verification handle object. So a script like this:
{% set snippet %}
get-editbox | get-property "text" | equals "foo" | verify-true
{% endset %}

{{m.ecl(snippet)}}

Internally it is executed like this:

<div class="panel panel-default">
  <div class="panel-body">
    <div class="screenshot">
  <img src="{{site.url}}/shared/img/pipeline.png"></img>
  </div>
  </div>
</div>

So, these commands just passing and filling a verification object through pipeline and finally verify-true command 
takes a filled verification handle object and performs actual check, producing an error message.
Later, with growing requirements for scripting logic, we needed to be able to operate with actual 
property values, for instance, use control enablement in if condition. <BR>Thus we added a <b>-raw</b> key to {{m.eclCommand("get-property")}} command:

{% set snippet %}
// returns VerifyHandle, pretty useless without verify-true:
get-editbox | get-property text
// returns actual text value
// can be stored in variable, passed to another command, etc 
get-editbox | get-property text -raw 
{% endset %}

{{m.ecl(snippet)}}

In order to be able to operate with raw values, we also added commands 
like {{m.eclCommand("eq")}}, {{m.eclCommand("gt")}}, {{m.eclCommand("lt")}} and {{m.eclCommand("assert-true")}} as general-purpose ECL commands, without any RCPTT specifics. And since {{m.eclInline("assert-true")}} does not have a 'context' of assertion, it just gets a single boolean value as an input, we added -message argument to it, so that users can specify an error message.
Hence finally we came to a situation when the same assertion can be expressed in two different ways:

{% set snippet %}
// Old RCPTT style:
get-property text | equals foo | verify-true
//ECL style:
get-property text -raw | eq foo | assert-true "Text is not 'foo'"
{% endset %}

{{m.ecl(snippet)}}

Indeed, many users found this situation confusing and wondered whether they need to
 use {{m.eclCommand("eq")}} or {{m.eclCommand("equals")}},  so finally we also made old RCPTT commands, like {{m.eclCommand("equals")}} and {{m.eclCommand("verify-true")}} more flexible,  so that they behave differently depending on kind of input: if they get a VerifyHandle as an input, they use old behavior, if they get an actual value, they behave as their general-purpose ECL counterparts.

