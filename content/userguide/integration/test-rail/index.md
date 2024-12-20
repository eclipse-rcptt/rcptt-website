---
title: Integration with TestRail
slug: test-rail-integration
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: integration
---

## Configuration

To configure connection to TestRail, you need to know the following parameters:

- **host** — TestRail Host. Should be valid URL and end with slash "/".
- **username** — Username.
- **password** — Password or API Key.
- **projectId** — Project ID. Should start with "P" and end with positive number.
- **testRunId** (optional) — Test Run ID. Should start with "R" and end with positive number.
- **useUnicode** (optional) — Is Unicode used to encode requests to TestRail.

### Configure RCPTT IDE

To configure connection in RCPTT IDE, go to Window -> Preferences -> RCP Testing Tool -> Integrations -> TestRail, activate 'Enable integration with TestRail' checkbox and provide all parameters.<br>
You can test connection by using 'Test connection' button.

![](../test-rail-1.png)
Note that the password is stored in the Secure Storage, so you will be asked to type your master password.


If you want to send Test Run results to TestRail for specific Test Suite, you should enable 'TestRail' engine in Run Configuration.
To enable the engine, go to Run -> Run Configurations..., choose the Test Suite and activate 'TestRail' checkbox on 'Test Engines' tab.
By default, 'TestRail' engine is disabled for Test Suite and Test Run results are not sent to TestRail. Also, you can specify ID of the existing Test Run on this tab.

![](../test-rail-2.png)
### Configure RCPTT Test Runner

To configure connection in RCPTT Test Runner, add 'testEngine' command-line option value with 'testrail:' prefix and semicolon-separated list of parameters.<br>

Example:

<pre>
-testEngine
'testrail:host=https://example.testrail.net/;username=username@example.com;password=1234567890;projectId=P1;testRunId=R10'
</pre><br>

### Configure RCPTT Maven Plugin

To configure connection in RCPTT Test Runner, add 'testEngines/testEngine' to the configuration section in your pom.xml.
For TestRail engine specify 'testrail' ID value and list of parameters.
<br>
Example:

<pre>
&lt;configuration&gt;
  ...
  &lt;testEngines&gt;
    ...
    &lt;testEngine&gt;
      &lt;id&gt;testrail&lt;/id&gt;
      &lt;parameters&gt;
        &lt;host&gt;https://example.testrail.net/&lt;/host&gt;
        &lt;username&gt;username@example.com&lt;/username&gt;
        &lt;password&gt;1234567890&lt;/password&gt;
        &lt;projectId&gt;P1&lt;/projectId&gt;
        &lt;testRunId&gt;R10&lt;/testRunId&gt;
      &lt;/parameters&gt;
    &lt;/testEngine&gt;
  &lt;/testEngines&gt;
&lt;/configuration&gt;
</pre>
<br>

## Using TestRail features in RCPTT Test Case

### Provide TestRail ID

To bind RCPTT Test Case with TestRail Test Case, add a new Test Case property called 'testrail-id' and provide ID from TestRail.

![](../test-rail-3.png)

Property name field has the suggestions list. So you can choose 'testrail-id' property from it.

![](../test-rail-4.png)

Value field has the suggestions for 'testrail-id' too. All available Test Case IDs from TestRail are shown in this list.<br>
When one of IDs is chosen (1), its description is shown (2). You can copy it all with 'Copy to the clipboard' button (3).

![](../test-rail-5.png)

### Use TestRail Step ECL Command

To send Step Results to TestRail, you can use test-rail-step ECL command.<br>
If you use test-rail-step command, make sure that 'Test Case (Steps)' template is chosen for your Test Case on TestRail side.


Command arguments:
- **-content** — Step description.
- **-expected** — Expected result.
- **-actual** — Actual result.
- **-status** — Step status. One of TestRail statuses: passed, blocked, retest, failed.
</ul><br>
Example:

<pre>
test-rail-step -content "step one" -expected "success" -actual "success" -status passed
test-rail-step -content "step two" -expected "success" -actual "failure" -status failed
</pre>

<img src="{{site.url}}/shared/img/test-rail-6.png"></img>
