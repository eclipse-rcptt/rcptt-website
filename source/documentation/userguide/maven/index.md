---
title: Maven plugin
slug: maven
layout: doc
nav_name: userguide
---


RCPTT Maven plugin (requires Maven 3.1+) is a convenient way of automating RCPTT test execution during Maven build. It automatically downloads RCPTT Runner and launches it with command line arguments.
##Quick start

- Download basic <a href="{{site.url}}/documentation/userguide/maven/pom.xml">pom.xml</a>, place it in a root of RCPTT project and modify path to application under test.
- Execute mvn clean package from project's dir

##Configuration

###Basic plugin configuration

Below is a basic POM template which can be used as starting point of automating RCPTT tests with RCPTT Maven plugin. Put it into your RCPTT project and configure as described below

<pre>
<code>&lt;project&gt;
  &lt;modelVersion&gt;4.0.0&lt;/modelVersion&gt;
  &lt;groupId&gt;com.company.product&lt;/groupId&gt; 
  &lt;artifactId&gt;productTests&lt;/artifactId&gt;
  &lt;version&gt;1.0.0-SNAPSHOT&lt;/version&gt;
  &lt;packaging&gt;rcpttTest&lt;/packaging&gt;

  &lt;pluginRepositories&gt;
    &lt;pluginRepository&gt;
      &lt;id&gt;rcptt-releases&lt;/id&gt;
      &lt;name&gt;RCPTT Maven repository&lt;/name&gt;
      &lt;url&gt;https://repo.eclipse.org/content/repositories/rcptt-releases/&lt;/url&gt;
    &lt;/pluginRepository&gt;
    &lt;pluginRepository&gt;
      &lt;id&gt;rcptt-snapshots&lt;/id&gt;
      &lt;name&gt;RCPTT Maven Snapshots repository&lt;/name&gt;
      &lt;snapshots&gt;
      	&lt;updatePolicy&gt;always&lt;/updatePolicy&gt;
      &lt;/snapshots&gt;
      &lt;url&gt;https://repo.eclipse.org/content/repositories/rcptt-snapshots/&lt;/url&gt;
    &lt;/pluginRepository&gt;
  &lt;/pluginRepositories&gt; 
  &lt;properties&gt;
    &lt;rcptt-maven-version&gt;2.0.0-SNAPSHOT&lt;/rcptt-maven-version&gt;
  &lt;/properties&gt; 

  &lt;build&gt;
    &lt;plugins&gt;
      &lt;plugin&gt;
        &lt;groupId&gt;org.eclipse.rcptt&lt;/groupId&gt;
        &lt;artifactId&gt;rcptt-maven-plugin&lt;/artifactId&gt;
        &lt;version&gt;${rcptt-maven-version}&lt;/version&gt;
        &lt;extensions&gt;true&lt;/extensions&gt;
        &lt;configuration&gt;
        	&lt;runner&gt;
        		&lt;version&gt;2.0.0-SNAPSHOT&lt;/version&gt;
        	&lt;/runner&gt;
          &lt;!-- The main configuration section goes here --&gt; 
        &lt;/configuration&gt;
      &lt;/plugin&gt;
    &lt;/plugins&gt;
  &lt;/build&gt;
&lt;/project&gt;</code></pre>

<div>Important things to note here:</div>

<ul class="maven maven-margin">
	<li>Packaging type is set to rcpttTest</li>
	<li>Xored Maven repository added to pluginsRepositories</li>
	<li>extensions set to true</li>
</ul>

####RCPTT Runner Version

Use <code>runner/version</code> to specify version of RCPTT Runner to use.

<pre>
<code>&lt;runner&gt;
  &lt;!-- version of RCPTT Runner --&gt;
  &lt;version&gt;2.0.0-SNAPSHOT&lt;/version&gt;
&lt;/runner&gt;
</code></pre>

###RCPTT Runner VM Arguments

Use <code>runner/vmArgs</code> to specify extra arguments for RCPTT Runner. For instance, to configure memory usage, the following lines can be added:

<pre>
<code>&lt;runner&gt;
   ...
   &lt;vmArgs&gt;
      &lt;vmArg&gt;-Xmx1024m&lt;/vmArg&gt;
      &lt;vmArg&gt;-XX:MaxPermSize=256m&lt;/vmArg&gt;
   &lt;/vmArgs&gt;
&lt;/runner&gt;
</code></pre>

###AUT specification

RCPTT Maven Plugin supports two sources of applications-under-tests — it can either use Maven artifact resolution to download AUT from Maven repository, or get it explicitly from file system or http server. The configuration of AUT is specified in plugin configuration section under <code>aut</code> element.

####Explicit AUT location

Path on a local file system or AUT http(s) download URL can be specified in <code>explicit</code> element. If path is not absolute, then it is assumed that it is relative to project base dir:

<pre>
<code>&lt;aut&gt;
    &lt;explicit&gt;../MyAut.zip&lt;/explicit&gt;
    &lt;!-- equivalent to: --&gt;
    &lt;!-- &lt;explicit&gt;${project.basedir}/../MyAut.zip&lt;/explicit&gt; --&gt;
&lt;/aut&gt;
</code></pre>

Explicit AUT specification supports some initial substitution — if path contains <code>[platform]</code>, it will be replaced with the eclipse classifier of current platform (i.e. <code>linux.gtk.x86_64</code>):

<pre>
<code>&lt;aut&gt;
  &lt;explicit&gt;../../product/target/products/MyAut-[platform].zip&lt;/explicit&gt;
  &lt;!-- when executed on win32 will be resolved to:
       ../../product/target/products/MyAut-win32.win32.x86.zip --&gt;
&lt;/aut&gt;
</code></pre>

####Maven artifact resolution

In case of Maven artifact resolution, artifact classifier is automatically set to current platform classifier, consisting of OS, Window System and architecture, for example <code>win32.win32.x86</code>, or <code>macosx.cocoa.x86_64</code>.

<pre>
<code>&lt;aut&gt;
    &lt;groupId&gt;com.company.product&lt;/groupId&gt;
    &lt;artifactId&gt;com.company.product.rcp&lt;/artifactId&gt;
&lt;/aut&gt;
</code></pre>

In this case rcptt-maven-plugin plugin determines the classifier of the current platform, assumes that packaging type is zip, and resolves the artifact using Aether, by taking the latest version. However, version, classifier and extension can be explicitly specified:

<pre>
<code>&lt;aut&gt;
    &lt;extension&gt;tar.bz2&lt;/extension&gt;
    &lt;classifier&gt;production&lt;/classifier&gt;

    &lt;groupId&gt;com.xored.f4&lt;/groupId&gt;
    &lt;artifactId&gt;com.xored.f4.product&lt;/artifactId&gt;
    &lt;version&gt;1.0.0-SNAPSHOT&lt;/version&gt;
&lt;/aut&gt;
</code></pre>

###Injections

Sometimes it might be useful to make some certain features available in testing assembly, but not included into the final product. For this purpose, it is possible to specify injection parameters for AUT to specify which features from which update sites should be installed into AUT before testing. Here's the example configuration

<pre>
<code>&lt;aut&gt;
    &lt;groupId&gt;eclipse&lt;/groupId&gt;
    &lt;artifactId&gt;sdk&lt;/artifactId&gt;
    &lt;version&gt;3.7.0&lt;/version&gt;

    &lt;injections&gt;
        &lt;injection&gt;
            &lt;site&gt;&lt;/site&gt;
            &lt;!-- features are optional - when omitted, all features from given site will be installed --&gt;
            &lt;features&gt;
                 &lt;feature&gt;com.comanyname.featureid&lt;/feature&gt;
            &lt;/features&gt;      
        &lt;/injection&gt;
    &lt;/injections&gt;
&lt;/aut&gt;
</code></pre>

###Application args

Extra command-line arguments for application and/or for Java VM can be specified like this:

<pre>
<code>&lt;aut&gt;
  ...
  &lt;args&gt;
    &lt;arg&gt;-clean&lt;/arg&gt;
    &lt;arg&gt;-port&lt;/arg&gt;
    &lt;arg&gt;8080&lt;/arg&gt;
  &lt;/args&gt;  

  &lt;vmArgs&gt; 
    &lt;vmArg&gt;-Xmx1536m&lt;/vmArg&gt;  
    &lt;vmArg&gt;-XX:MaxPermSize=256m&lt;/vmArg&gt; 
  &lt;/vmArgs&gt; 

  &lt;!-- Enable support software installation in the AUTs launch configuration --&gt; 
  &lt;enableSoftwareInstallation&gt;true&lt;/enableSoftwareInstallation&gt; 
&lt;/aut&gt;  
</code></pre>

###Persistent workspace

By default AUT's workspace is recreated each time AUT hangs and is forcefully restarted. This is done to prevent workspace corruption from blocking AUT startup (after test failures). If this is undesirable, use <code>reuseExistingWorkspace</code> option:

<pre>
<code>&lt;aut&gt;
  ...
  &lt;reuseExistingWorkspace&gt;true&lt;/reuseExistingWorkspace&gt;
&lt;/aut&gt;
</code></pre>

###Extra projects

In case of using linked projects or folders in Workspace context, it might be required to specify an extra projects to be imported into RCPTT Runner workspace. This can be done by using <code>projects</code> element:

<pre>
<code>&lt;projects&gt;
    &lt;project&gt;${project.basedir}/../otherProject&lt;/project&gt;
&lt;/projects&gt;
</code></pre>

###Test options

Options related to test execution are specified under <code>testOptions</code> element in plugin configuration. There are no required options here, so by default this element is just omitted.

The example below sets timeout options for the whole test suite and for a single test:

<pre>
<code>&lt;testOptions&gt;
    &lt;execTimeout&gt;30min&lt;/execTimeout&gt;
    &lt;testExecTimeout&gt;5min&lt;/testExecTimeout&gt;
&lt;/testOptions&gt;
</code></pre>

The complete list of parameters with their defaults is provided on <a href="https://ci.xored.com/doc/runner">RCPTT Runner</a> page.

###Tags to skip

Sometimes it might be valuable to skip certain test cases during test execution, for example if tests depend on specific operating system or other environment. For this purpose it is possible to mark such tests in RCPTT IDE with some specific tag and then specify option, for example:

<pre>
<code>&lt;skipTags&gt;
    &lt;skipTag&gt;requiresVPNConnection&lt;/skipTag&gt;
    &lt;skipTag&gt;windowsOnlyTest&lt;/skipTag&gt;
&lt;/skipTags&gt;    
</code></pre>

####Test suites

By default RCPTT Maven plugin launches all tests in given projects (and extra projects) besides tests having tags from tags to skip list. In order to run only test cases belonging to test suite(s), the following lines can be added (suite name must match to a name of existing test suite inside a project):

<pre>
<code>&lt;suites&gt;
  &lt;suite&gt;MyTestSuite&lt;/suite&gt;
&lt;/suites&gt;
</code></pre>

##Examples

###Simple project

This is a trivial example which uses most of defaults provided by rcptt-maven-plugin.

<pre>
<code>&lt;project&gt;
  &lt;modelversion&gt;4.0.0&lt;/modelversion&gt;
  &lt;groupid&gt;com.xored.f4&lt;/groupid&gt;
  &lt;artifactid&gt;rcpttTests&lt;/artifactid&gt;
  &lt;version&gt;0.0.1-SNAPSHOT&lt;/version&gt;
  &lt;packaging&gt;rcpttTest&lt;/packaging&gt;
 
  &lt;build&gt;
    &lt;plugins&gt;
      &lt;plugin&gt;
        &lt;groupid&gt;org.eclipse.rcptt&lt;/groupid&gt;
        &lt;artifactid&gt;rcptt-maven-plugin&lt;/artifactid&gt;
        &lt;version&gt;2.0.0-SNAPSHOT&lt;/version&gt;
        &lt;extensions&gt;true&lt;/extensions&gt;
        &lt;configuration&gt;
          &lt;aut&gt;
            &lt;groupid&gt;com.xored.f4&lt;/groupid&gt;
            &lt;artifactid&gt;com.xored.f4.product&lt;/artifactid&gt;
          &lt;/aut&gt;
        &lt;/configuration&gt;
      &lt;/plugin&gt;
    &lt;/plugins&gt;
  &lt;/build&gt;
 
  &lt;pluginrepositories&gt; 
    &lt;pluginrepository&gt;
      &lt;id&gt;rcptt-snapshots&lt;/id&gt;
      &lt;name&gt;RCPTT Maven Snapshots repository&lt;/name&gt;
      &lt;snapshots&gt;
      	&lt;updatePolicy&gt;always&lt;/updatePolicy&gt;
      &lt;/snapshots&gt;
      &lt;url&gt;https://repo.eclipse.org/content/repositories/rcptt-snapshots/&lt;/url&gt;
    &lt;/pluginrepository&gt; 
     &lt;pluginrepository&gt;
      &lt;id&gt;rcptt-releases&lt;/id&gt;
      &lt;name&gt;RCPTT Maven repository&lt;/name&gt;
      &lt;url&gt;https://repo.eclipse.org/content/repositories/rcptt-releases/&lt;/url&gt;
    &lt;/pluginrepository&gt;
  &lt;/pluginrepositories&gt;
&lt;/project&gt;</code></pre>

####Dependent projects

Dependencies between test projects are described in the same way as it is for other maven projects, one thing to note is that type element must be set to rcpttTest:

<pre>
<code>...
&lt;dependencies&gt;
  &lt;dependency&gt;
    &lt;groupid&gt;com.xored.f4&lt;/groupid&gt;
    &lt;artifactid&gt;rcpttTests2&lt;/artifactid&gt;
    &lt;version&gt;0.0.1-SNAPSHOT&lt;/version&gt;
    &lt;type&gt;rcpttTest&lt;/type&gt;
  &lt;/dependency&gt;
&lt;/dependencies&gt;
...</code></pre>

Current implementation assumes that all dependencies are packed and located either in local or in some of configured remote repositories which means that when using dependencies between projects it is necessary to use at least install phase.

<h2>Maven-related details</h2>

####Phases and Goals

For ease of use and ability of further customization, RCPTT tests projects use custom packaging type <code>rcpttTest</code>, since it is a natural way to associate a particular lifecycle with a project. The table below describes all phases used by RCPTT Maven plugin and actions performed on these phases.

<div class="beforeTable">
</div>
<table class="info">
	<thead>
		<tr>
			<th>Phase</th>
			<th>Goal</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>generate-resources</td>
			<td>org.eclipse.rcptt:rcptt-maven-plugin:resources</td>
			<td>
			<ul>
				<li>Copies project to <code>target/projects/artifactId</code></li>
				<li>Resolves all dependencies of type rcpttTest and unpacks them to <code>target/projects</code></li>
				<li>If AUT is an archive, unpacks AUT to <code>target/aut</code></li>
				<li>Downloads if necessary and unpacks RCPTT runner to <code>target/runner</code></li>
				<li>Creates <code>target/results</code> directory</li>
			</ul>
			</td>
		</tr>
		<tr>
			<td>compile</td>
			<td>org.eclipse.rcptt:rcptt-maven-plugin:execute</td>
			<td>
			Launches RCPTT runner

			<ul>
				<li>RCPTT runner workspace is set to <code>target/runner-workspace</code></li>
				<li>AUT workspace prefix is <code>target/autWorkspace</code>.</li>
				<li>Puts generated JUnit XML report to <code>target/surefire-reports</code></li>
			</ul>
			</td>
		</tr>
		<tr>
			<td>package</td>
			<td>org.eclipse.rcptt:rcptt-maven-plugin:package</td>
			<td>Packages RCPTT project and execution results as artifacts (see below)</td>
		</tr>
		<tr>
			<td>install</td>
			<td>maven-install-plugin:install</td>
			<td>default</td>
		</tr>
		<tr>
			<td>deploy</td>
			<td>maven-deploy-plugin:deploy</td>
			<td>default</td>
		</tr>
	</tbody>
</table>

####Produced artifacts

<div>The package phase produces two artifacts:</div>

<ul class="maven maven-margin">
	<li>The project itself as primary artifact (so it can be references by other projects)</li>
	<li>RCPTT execution results/logs/outputs and other information which can be helpful to identify the reason of failures. This artifact has classifier <code>results</code>.</li>
</ul>

<div>Below is the complete list of items included into results artifact:</div>

<ul class="maven maven-margin">
	<li><strong>rcpttTests.html</strong>: HTML report</li>
	<li><strong>out.txt</strong>: Runner process output stream contents</li>
	<li><strong>err.txt</strong>: Runner process error stream contents</li>
	<li><strong>log.txt, log1.txt</strong>: Runner workspace logs (.log and .bak_N.log files from .metadata)</li>
	<li><strong>log&lt;N&gt;[restart&lt;M&gt;].txt</strong>: AUT workspace logs.</li>
</ul>
