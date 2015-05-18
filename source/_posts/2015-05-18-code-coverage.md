---
title: How to get UI and Code Coverage with EclEmma and JaCoco.  
author: Olga Yurchuk
categories: [tutorials]
forum:
---

{% import "macros" as m %}

<i>In this blogpost we are going to describe how to configure Eclipse to combine RCPTT UI tests with code coverage analytics tools EclEmma and Jacoco agent. All these tools are OpenSource and can be used for free.</i>

Some users ask us:

"So I didn't find any hint of Code Coverage in RCP Testing Tool, does that mean there is none?"

RCPTT is UI testing tool so it is mostly useful for functional testing. Since above question is very popular it is common practice to combine Functional Testing and Code Coverage analysis. We don't provide this functionality out-of-the-box but it is easy to employ AUT virtual machine arguments to configure an arbitrary covers tool. Find instructions below to configure IDE and add analysis to CI with Maven.

### How to get UI and Code Coverage testing from sources with RCPTT IDE & EclEmma in the one Eclipse instance


1. Install RCPTT as a plugin from update site (see site url here: https://www.eclipse.org/rcptt/download/)
2. Install EclEmma from http://update.eclemma.org/
3. Download JaCoCo agent from here http://www.eclemma.org/jacoco/
4. Extract file to some folder (for me it was /Users/<user-name>/codecoverage/jacoco-0.7.5-20150410.145015-6/lib/jacocoagent.jar)
5. Import, Build and Run your project
6. Open Run configuration
7. Add <i> -javaagent:/Users/<user-name>/codecoverage/jacoco-0.7.5-20150410.145015-6/lib/jacocoagent.jar=destfile=/Users/<user-name>/codecoverage/test.exec </i> to VM arguments

<img src="{{site.url}}/shared/img/blog/codeCoverage/RunConfigurationsVMArguments.png" />

8. Add run configuration as Eclipse AUT (It should be done after adding VM argument)

<img src="{{site.url}}/shared/img/blog/codeCoverage/ApplicationUnderTest.png" />

9. Run Test Suite
10. After test suite execution had finished go File -> Import -> Coverage Session -> Choose /Users/<user-name>/codecoverage/test.exec -> Select all sources
11. See coverage details

<img src="{{site.url}}/shared/img/blog/codeCoverage/CoverageDetails.png" />

###How to get UI and Code Coverage testing on Jenkins with RCPTT Runner & EclEmma

If you use Maven to build your project, you may use RCPTT Runner for functional testing of each build and Jacoco agent to get code coverage analysis.

Do the following steps for that purpose:

1. Configure RCPTT Maven plugin to execute RCPTT test project as it is described [here](https://www.eclipse.org/rcptt/documentation/userguide/maven/)
2. Download Jacoco plugin
3. Add the following line to your pom.xml

{% set snippet %}

&lt;vmArgs&gt;
          &lt;vmArg&gt;-javaagent:/Users/&ltuser-name>/Downloads/jacoco-0.7.5-20150410.145015-6/lib/jacocoagent.jar=destfile=/Users/&lt;user-name&gt;/test.exec&lt;/vmArg&gt;
          &lt;/vmArgs&gt;

{% endset %}

4. Run the project (start job on Jenkins or just execute mvn clean package -e in the folder with pom.xml)
5. When AUT is launched, the destination file is created and filled during the test.
6. After execution, the file can be imported as coverage session to Eclipse/EclEmma to have the results in the known view in Eclipse.

You may look at whole <a href="{{site.url}}/blog/pom.xml">pom.xml</a> example.



