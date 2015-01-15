---
title: Contexts
slug: contexts
nav_name: userguide
layout: doc
---

Contexts are one of the most powerful RCPTT features. 
A context is a relevant <i>part</i> of the application <i>state</i>, which is expected to be recreated by the test case. 
It could be anything, starting from <i>There should be an FTP service available at IP address 192.168.0.10</i>, or as it can be seen from 
the Eclipse tester perspective: <i>There should be these particular files in the Eclipse Workspace, Java Perspective should be opened,
 MyJavaClass.java file should be opened in the editor</i>.


The test engineer can group contexts in any combination required for particular test, and it makes a context an important unit 
for reuse within your test base. RCPTT brings the application to the state required for the test to run properly.


When using most of testing frameworks and tools, you can see that every test case has to take care of its own set-up, verification, 
and clean-up. In the set-up phase the application should be brought to a state where the actual test can be executed. 
In the verification phase the actual testing is performed, results are evaluated and marked as a passed or failed test. 
The clean-up phase should bring the application back to a state preceding the setup - a so-called base state - to make it ready 
for the next test.



<div class="panel panel-info">
  <div class="panel-heading">
    With RCPTT Contexts there is no need to write any set-up and clean-up code; moreover, they represent reusable units of code 
    which can be included in different test cases. It increases test base maintainability, resolving the task of AUT setup
  </div>
</div>

If a test case relies on the results of the preceding test case, then failure of the latter one most likely will cause the failure 
of the one that runs afterwards. Such cascading errors would make it very difficult to find the core of these failures. 
It also implies that test cases are run in the strict order which is rarely the case. Inadvertent reordering of the test case execution
 (e.g. by a tester or a testing framework) could cause a chain of failures in the Test Suite which was executed faultlessly 
 the previous day.
 
Test cases should be executable in any sequence. This important characteristic would allow a maintainer to choose a subset of 
test cases to run without having to concern about the interdependencies between test cases. This is quite difficult to be 
implemented on practice.

<div class="panel panel-info">
  <div class="panel-heading">
    RCPTT lets you have Independent test cases, without any efforts. What is important, 
    RCPTT test cases do not require AUT to be in the base state, letting you to start any test case from any AUT state. 
    Contexts are responsible to bring AUT to the state required for the particular test execution.
  </div>
</div>

Moreover, while using other frameworks and tools, the requirement to run each and every test from the zero state would be 
far too expensive in case of tests that modify a complex global state (e.g. creating or modifying a database). 
In such situations test cases relying on specific presets can be grouped together but the interdependencies between them
 should be well documented to help future maintainers with analysis of such a Test Suite.
 
 <div class="panel panel-info">
  <div class="panel-heading">
    RCPTT can perform deep analysis of the contexts being used within the test suite and group them together for faster test execution. 
    This would be done by RCPTT automatically without any work on test execution performance required from a tester.
  </div>
</div>
