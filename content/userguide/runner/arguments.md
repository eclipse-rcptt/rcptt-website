---
title: Test Runner
slug: runner/arguments
sidebar: userguide
layout: doc
---

RCPTT Test Runner is command-line tool for launching <a href="http://eclipse.org/rcptt">RCPTT</a> tests.
It takes various options like path to RCPTT projects, application-under-test and other parameters, runs all tests and produces reports in HTML and JUnit XML formats.

###Quick start
Download and modify sample scripts below (parameters that need to be set/changed are explained in scipt commends):

- [build.xml](../runner/build.xml) &ndash; sample Ant script
- [runner.sh](../runner/runner.sh) &ndash; sample Shell script for Linux/Mac OS X
- [runner.cmd](../runner/runner.cmd) &ndash; sample CMD script for Windows

###Argument reference

The base command line for RCPTT runner looks like this (backslashes indicate line breaks instead, on Windows, ^ is used instead):
  <pre>
java &lt;RCPTT Runner VM arguments&gt;
  -jar /path/to/runner/plugins/org.eclipse.equinox.launcher_1.5.*.jar \
  -application org.eclipse.rcptt.runner.headless \
  -data /path/to/runner/workspace \
  &lt;the rest of arguments in form of -argName argValue&gt;
  </pre>

###Basic command-line options 

The table below summarizes information about arguments, arguments are more or less sorted by decreasing importance

<div class="beforeTable">
</div>

Arg name | Description | Sample value | Required?
--- | --- | --- | --
aut | Path to application under test | "C:\Downloads\eclipse" | Yes
import |  Semicolon-separated list of project folders with RCPTT tests or resources to link. RCPTT Runner will perform a recursive search of RCPTT projects in each of given folders.| "C:\work\rcpttProject1;C:\work\rcpttProject2", "C:\singleRcpttProject" | Yes 
autWsPrefix | Path prefix for application-under-test's workspace. The workspace prefix given will be suffixed with incrementing restart index to make sure no data is lost in case of application-under-test restart, hang or crash.  See also reuseExistingWorkspace.| "C:\work\aut-workspace-" | Yes 
junitReport | File path to save JUnit report with test exec results | "C:\work\results.xml" | No |
htmlReport | File path to save HTML report with test exec results | "C:\work\results.html" | No |
autConsolePrefix | File prefix for application-under-test process output. It will be appended with incrementing restart index for the same reason as -autWsPrefix arg. | C:\work\aut-console-output- |No 
testOptions | Semicolon-separated list of RCPTT Runtime options (see description below) | "testExecTimeout=600" | No
autArgs | List of arguments for application-under-test separated by semicolon. | -showsplash;org.eclipse.platform | No
autVMArgs | List of arguments for application-under-test's JVM separated by semicolon. | -Xmx1024m;-XX:MaxPermSize=512m
suites |	List of Test suite names separated by semicolon. If this argument is set, RCPTT runner executes only test cases from given suites (otherwise it executes all tests from given projects). | WindowsOnlyTests |	No
skipTags | Semicolon-separated list of tags. Test cases containing any of listed tags are not be executed. The default value is 'skipExecution'. | skipExecution | No
autVM | Java VM to use with application-under-test. By default it is set to the same Java VM which is used for RCPTT Runner launching | "C:\Program Files\Java\jre\_1.6.0_25" | No
timeout | Overall execution timeout in seconds, default value is 18000 (5 hours) | 3600 | No 
connectTimeout | application-under-test connection timeout in seconds, default value is 300 (5 mins). | 600
report	| Generate report with custom reporting renderer. "id;path" format should be used to specify report renderer id and path to export.	| "custom.report.id;C:\results\custom.report" |No
noSecurityOverride | If provided, -eclipse.keyring parameter will not be specified. Also -testOptions could contain "overrideSecurityStorage=false" for same effect. | This argument does not have value | No
memoryUsage |If specified, print AUT memory usage in Runner stdout| This argument does not have value |	No
tests  | Semicolon-separated list of test name glob patterns (* - any chars, ? - exactly one char). If this argument is set, RCPTT runner executes listed test cases only.	This argument also works with combination with `suites` argument, i.e. at first Runner collects all tests from provided suites and then filters it by test names | -tests myTest.test or -test myTest* | No
reuseExistingWorkspace | If present, autWsPrefix is treated as full path to the existing workspace. This workspace is never recreated and always reused.| This argument does not have value |	No
enableSoftwareInstallation | If specified Support software installation in the launched application is enabled otherwise it is disabled.| This argument does not have value |	No

### Injection options
Injection mechanism allows to install some extra features into application-under-test before test execution. This might be useful in two cases:

- The product being tested is distributed as an update site, so there's no default all-in-one RCP application. In this case Eclipse SDK (or other eclipse package) can be used as application-under-test and plugins being tested will be installed into it.
- Application-under-test requires some extra plugins for testing, and these plugins are undesirable in a final product

Injection mechanism currently does not resolve dependencies automatically, i.e. it just puts specified plugins/features into an application, but does not make sure that all prerequisites are installed.

#### Injecting from Update Site
In command line it is specified as argument with name injection.site where value is update site URL optionally followed by list of features separated by semicolon. If list of features is omitted, then all features from given site will be installed
<pre>
-injection:site <update-site>(;feature-id1.feature.group;feature-id2.feature.group;plugin-id1;plugin-id2)
</pre>

It is possible to specify this argument several times to inject features from more than one update site.

#### Injecting from a directory
This way is similar to dropping some plugins into eclipse/plugins folder:
<pre>
-injection:dir <path-to-dir-with-plugins>
</pre>

It is possible to specify this argument several times to inject plugins from more than one directory

### RCPTT Runtime options
This table summarizes RCPTT runtime options which are rarely need to be modified and can be specified in `testOptions` argument. In RCPTT IDE these options can be set by going to Preferences -> RCP Testing Tool -> Advanced Options.

<div class="beforeTable"></div>

Option Name | Default value | Description
--- | --- | ---
passedTestDetails  | false | When true, include output of 'take-screenshot' and 'trace' ECL commands into a report
testExecTimeout	| 300 | Timeout for a single test execution in seconds
contextRunnableTimeout| 180000 | Context applying timeout in milliseconds 
contextsWaitforjobsTimeout |30000 | If there are any jobs started after context applying, wait for their completion during this time (in milliseconds).
jobDebugjobTimeout | 300000 | Timeout in milliseconds for jobs scheduled from eclipse Debug plugin.
jobNulifyRescheduleMaxValue | 50 | If job reschedules itself more than times specified by this parameter, RCPTT stops setting delay to 0 (see jobScheduleDelayedMaxtime parameter).
jobSleepingStepTime | 200 | When job is in sleeping mode (see jobTreatAsSleeingTimeout option), execute commands with given delay (in milliseconds) between commands.
jobSleepingStepTimeout | 120000 | Wait timeout in milliseconds for stepping jobs (see jobTreatAsSleepingTimeout and jobSleepingStepTime)
jobTreatAsSleepingTimeout |10000| If job executes more than this time (in milliseconds) and sleeps (i.e. executing Thread.sleep() or Object.wait()), then RCPTT considers that this job is waiting for some user actions and continues to the next command.
timerExecsWaitNullify | 100|If Display.timerExec is scheduled for the delay less than this value (in milliseconds), set delay to 0.
autStartupTimeout|300|How many seconds Runner should wait for application startup.
jobHangTimeout|30000| Job hang skip timeout in milliseconds. If job is running longer than this time, RCPTT Runtime considers that it is hung and moves to the next command.
jobSchelduleDelayedMaxtime| 600| Max job scheduled delay to be waited for in milliseconds. If job is scheduled with delay less than this value, RCPTT sets delay to 0 and waits for job completion (also see jobNullifyRescheduleMaxValue). Otherwise RCPTT Runtime does not wait for job completion if it is scheduled with a delay greater than this value.
launchingKillAutOnConnectError|false|Kill AUT on connect error. Whether Runner should kill application-under-test if it cannot connect to it.
eclExecutionDelay | 0 | Wait for a given milliseconds between each ECL command. This can be useful when things go wrong at some point and it is hard to determine when by looking at execution. Setting this value to, say, 500, allows to inspect RCPTT actions in more details.
workspaceClearForceGc|true|Forces garbage collection on workspace cleanup.
diagramPartLocatorFeatureIdentityNames|id,title|Use following EMF features for part identity
diagramPartLocatorIdentity|ClassName|Non EMF object identity method
diagramPartLocatorNameFeatureSupport|true|EMF object identity by 'name feature' support
diagramPartLocatorTextSupport|true|Use text content for part identity
 
