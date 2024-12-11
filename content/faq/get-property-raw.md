---
title: What is the difference between Assert and Verify commands or how to get raw property values?
slug: get-property-raw
date: 2015-01-15
sidebar: home
menu:
  sidebar:
    parent: faq
---

Both commands can be used inside try/catch, however in this case an error message won't be displayed in a report.
It's a long story how we came to a situation when we have two seemingly the same commands and the primary reason is that we need it because of backward compatibility and a design mistake.
Originally ECL was an independent project, which we chose to use as a scripting language for our UI commands, so all ECL commands available in RCPTT can be split into two categories:

- General-purpose ECL commands
- RCPTT-specific commands

{{< eclCommand verify-true >}} is RCPTT-specific command. 
In order to provide user-friendly error messages (i.e. "expected 'foo', but got 'bar'"), this command does not operate with raw property values. 
When {{< eclCommand get-property >}} command 
is executed, internally it does not return a property value, but instead it returns a special
 verification handle object. So a script like this:
```
get-editbox | get-property "text" | equals "foo" | verify-true
```

is internally executed like this:

![screenshot](../pipeline.png)

So, these commands are just passing and filling a verification object through a pipeline and at the end {{< eclCommand verify-true >}} command takes a populated verification handle object and performs an actual check, producing an error message.
Later, with growing requirements for scripting logic, we needed to be able to operate with actual 
property values, for instance, use control enablement in if condition. Thus we added a `-raw` key to {{< eclCommand get-property >}} command:

```
// returns VerifyHandle, pretty useless without verify-true:
get-editbox | get-property text
// returns actual text value
// can be stored in variable, passed to another command, etc 
get-editbox | get-property text -raw 
```

In order to be able to operate with raw values, we also added commands 
like {{< eclCommand eq >}}, {{< eclCommand gt >}}, {{< eclCommand lt >}} and {{< eclCommand assert-true >}} as general-purpose ECL commands, without any RCPTT specifics. And since {{< eclCommand assert-true >}} does not have a 'context' of assertion, but gets a single boolean value as an input, we added `-message` argument to it, so that users can specify an error message.
Hence finally we came to a situation when the same assertion can be expressed in two different ways:

```
// Old RCPTT style:
get-property text | equals foo | verify-true
//ECL style:
get-property text -raw | eq foo | assert-true "Text is not 'foo'"
```

Indeed, many users found this situation confusing and wondered whether they need to
 use {{< eclCommand eq >}} or {{< eclCommand equals >}},  so finally we also made old RCPTT commands, like {{< eclCommand equals >}} and {{< eclCommand verify-true >}} more flexible,  so that they behave differently depending on kind of input: if they get a VerifyHandle as an input, they use old behavior, if they get an actual value, they behave as their general-purpose ECL counterparts.

