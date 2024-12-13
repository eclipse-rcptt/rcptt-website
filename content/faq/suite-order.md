---
title: Is it possible to order tests in a Test Suite?
slug: suite-order
date: 2015-01-15
sidebar: home
menu:
  sidebar:
    parent: faq
---

> Is it possible to change the test case order inside a test suite? Currently it is organized in an alphabetical order...

One of core RCPTT principles is test independence (from each other), so you should not rely on test execution order. 
Test cases independency is one of core principles of testing, and we believe RCPTT plays extremely well to implement 
this principle with [Contexts](../../userguide/contexts)

However, there is a possibility to change test case order (disabled by defaut).

To do this, please open rcptt.ini file and add `-Dorg.eclipse.rcptt.legacy.testSuite.manualOrdering=true` line after `-vmargs`.

Once RCPTT is started you can see Move Up/Move Down buttons in Test Suite editor:

{{< annotatedImage "screenshot-test-suite-editor.png" >}}
{{< annotate 519 405 153 80 >}}Change order of test cases in a Test Suite (make the Test Suite orderable).{{< / annotate >}}
{{< / annotatedImage >}}

## Important

- Internally test suites store an option flag - ordered/unordered. By default all test suites are unordered
- If test suite is ordered OR there's an option in ini-file - test suite editor shows up/down buttons to change test case order.
- Changing test order automatically converts unordered test suite to ordered.

Therefore, this ini-file option is just a 'hidden' way to convert unordered test suites to ordered. Once a test suite is saved as ordered, any user who opens it should see buttons for changing test order in a test suite disregarding of whether they have this option or not.

