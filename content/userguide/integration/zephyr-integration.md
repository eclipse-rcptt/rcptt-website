---
title: Integration with Zephyr
slug: userguide/integration/zephyr-integration
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: integration
---

To configure connection to Zephyr, you need to know the following parameters:

<ul>
- **baseUrl** — Zephyr Host. Should be valid URL.</li>
- **username** — Username.</li>
- **password** — Password.</li>
- **project** — Project.</li>
- **version** — Product version.</li>
- **cycle** — Test cycle.</li>
- **issue** — Jira issue number.</li>
</ul>

<img src="{{site.url}}/shared/img/zephyr/screenshot-jira.png" width="640"></img><br><br>

### Configure RCPTT IDE

To configure connection in RCPTT IDE, go to Window -> Preferences -> RCP Testing Tool -> Integrations -> Zephyr, activate 'Enable integration with Zephyr' checkbox and provide all parameters.
You can test connection by using 'Test connection' button.

<img src="{{site.url}}/shared/img/zephyr/screenshot-rcptt-preferences.png"></img><br><br>

Note that the password is stored in the Secure Storage, so you will be asked to type your master password.<br><br>

If you want to send Test Run results to Zephyr for specific Test Suite, you should enable 'Zephyr' engine in Run Configuration. To enable the engine, go to Run -> Run Configurations..., choose the Test Suite and activate 'Zephyr' checkbox on 'Test Engines' tab. By default, 'Zephyr' engine is disabled for Test Suite and Test Run results are not sent to Zephyr.

<img src="{{site.url}}/shared/img/zephyr/screenshot-rcptt-test-engine.png"></img><br><br>

### Using Zephyr features in RCPTT Test Case

Provide Zephyr Issue
To bind RCPTT Test Case with Zephyr Issue, add a new Test Case property called 'zephyr-issue' and provide issue number from Jira.
<br>

<img src="{{site.url}}/shared/img/zephyr/screenshot-rcptt-test-editor.png"></img><br><br>

<h4>Specify test project name, test version and test cycle</h4>

Open Project properties -> Zephyr<br>

<img src="{{site.url}}/shared/img/zephyr/screenshot-rcptt-project-properties.png"></img><br><br>

Execute the test case. Now you should see execution result in JIRA:<br>

<img src="{{site.url}}/shared/img/zephyr/screenshot-jira-test-pass.png"></img><br><br>

### Configure RCPTT Maven Plugin

To configure connection in RCPTT Test Runner, add 'testEngines/testEngine' to the configuration section in your pom.xml.
For Zephyr engine specify 'zephyr' ID value and list of parameters.
<br>
Example:

<pre>
&lt;configuration&gt;
  ...
  &lt;testEngines&gt;
    ...
    &lt;testEngine&gt;
      &lt;id&gt;zephyr&lt;/id&gt;
      &lt;parameters&gt;
        &lt;baseUrl&gt;https://zephyrexample.com/&lt;/host&gt;
        &lt;username&gt;sephyr_username&lt;/username&gt;
        &lt;password&gt;1234567890&lt;/password&gt;
      &lt;/parameters&gt;
    &lt;/testEngine&gt;
  &lt;/testEngines&gt;
&lt;/configuration&gt;
</pre>
<br>

Please set project, version and cycle in .project file.