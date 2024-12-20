---
title: Maven plugin
slug: maven
aliases: /userguide/integration/maven
layout: doc
sidebar: userguide
menu:
  sidebar:
      parent: userguide
---


RCPTT Maven plugin (requires Maven 3.1+) is a convenient way of automating RCPTT test execution during Maven build. It automatically downloads RCPTT Runner and launches it with command line arguments.
## Quick start

- Download basic [pom.xml](../maven/pom.xml), place it in a root of RCPTT project and modify path to application under test.
- Execute mvn clean package from project's dir

## Configuration

### Basic plugin configuration

Below is a basic POM template which can be used as starting point of automating RCPTT tests with RCPTT Maven plugin. Put it into your RCPTT project and configure as described below

```xml
<project>
  <modelVersion>4.0.0</modelVersion>
  <groupId>com.company.product</groupId> 
  <artifactId>productTests</artifactId>
  <version>1.0.0-SNAPSHOT</version>
  <packaging>rcpttTest</packaging>

  <pluginRepositories>
    <pluginRepository>
      <id>rcptt-releases</id>
      <name>RCPTT Maven repository</name>
      <url>https://repo.eclipse.org/content/repositories/rcptt-releases/</url>
    </pluginRepository>
    <pluginRepository>
      <id>rcptt-snapshots</id>
      <name>RCPTT Maven Snapshots repository</name>
      <snapshots>
      	<updatePolicy>always</updatePolicy>
      </snapshots>
      <url>https://repo.eclipse.org/content/repositories/rcptt-snapshots/</url>
    </pluginRepository>
  </pluginRepositories> 
  <properties>
    <rcptt-maven-version>2.0.0-SNAPSHOT</rcptt-maven-version>
  </properties> 

  <build>
    <plugins>
      <plugin>
        <groupId>org.eclipse.rcptt</groupId>
        <artifactId>rcptt-maven-plugin</artifactId>
        <version>${rcptt-maven-version}</version>
        <extensions>true</extensions>
        <configuration>
        	<runner>
        		<version>2.0.0-SNAPSHOT</version>
        	</runner>
          <!-- The main configuration section goes here --> 
        </configuration>
      </plugin>
    </plugins>
  </build>
</project>
```

<div>Important things to note here:</div>

<ul class="maven maven-margin">
	<li>Packaging type is set to rcpttTest
	<li>Xored Maven repository added to pluginsRepositories
	<li>extensions set to true

#### RCPTT Runner Version

Use <code>runner/version</code> to specify version of RCPTT Runner to use.

```xml
<runner>
  <!-- version of RCPTT Runner -->
  <version>2.0.0-SNAPSHOT</version>
</runner>
```

### RCPTT Runner VM Arguments

Use <code>runner/vmArgs</code> to specify extra arguments for RCPTT Runner. For instance, to configure memory usage, the following lines can be added:

```xml
<runner>
   ...
   <vmArgs>
      <vmArg>-Xmx1024m</vmArg>
      <vmArg>-XX:MaxPermSize=256m</vmArg>
   </vmArgs>
</runner>
```

### AUT specification

RCPTT Maven Plugin supports two sources of applications-under-tests — it can either use Maven artifact resolution to download AUT from Maven repository, or get it explicitly from file system or http server. The configuration of AUT is specified in plugin configuration section under <code>aut</code> element.

#### Explicit AUT location

Path on a local file system or AUT http(s) download URL can be specified in <code>explicit</code> element. If path is not absolute, then it is assumed that it is relative to project base dir:

```xml
<aut>
    <explicit>../MyAut.zip</explicit>
    <!-- equivalent to: -->
    <!-- <explicit>${project.basedir}/../MyAut.zip</explicit> -->
</aut>
```

Explicit AUT specification supports some initial substitution — if path contains <code>[platform]</code>, it will be replaced with the eclipse classifier of current platform (i.e. <code>linux.gtk.x86_64</code>):

```xml
<aut>
  <explicit>../../product/target/products/MyAut-[platform].zip</explicit>
  <!-- when executed on win32 will be resolved to:
       ../../product/target/products/MyAut-win32.win32.x86.zip -->
</aut>
```

#### Maven artifact resolution

In case of Maven artifact resolution, artifact classifier is automatically set to current platform classifier, consisting of OS, Window System and architecture, for example <code>win32.win32.x86</code>, or <code>macosx.cocoa.x86_64</code>.

```xml
<aut>
    <groupId>com.company.product</groupId>
    <artifactId>com.company.product.rcp</artifactId>
</aut>
```

In this case rcptt-maven-plugin plugin determines the classifier of the current platform, assumes that packaging type is zip, and resolves the artifact using Aether, by taking the latest version. However, version, classifier and extension can be explicitly specified:

```xml
<aut>
    <extension>tar.bz2</extension>
    <classifier>production</classifier>

    <groupId>com.xored.f4</groupId>
    <artifactId>com.xored.f4.product</artifactId>
    <version>1.0.0-SNAPSHOT</version>
</aut>
```

### Injections

Sometimes it might be useful to make some certain features available in testing assembly, but not included into the final product. For this purpose, it is possible to specify injection parameters for AUT to specify which features from which update sites should be installed into AUT before testing. Here's the example configuration

```xml
<aut>
    <groupId>eclipse</groupId>
    <artifactId>sdk</artifactId>
    <version>3.7.0</version>

    <injections>
        <injection>
            <site></site>
            <!-- features are optional - when omitted, all features from given site will be installed -->
            <features>
                 <feature>com.comanyname.featureid</feature>
            </features>      
        </injection>
    </injections>
</aut>
```

### Application args

Extra command-line arguments for application and/or for Java VM can be specified like this:

```xml
<aut>
  ...
  <args>
    <arg>-clean</arg>
    <arg>-port</arg>
    <arg>8080</arg>
  </args>  

  <vmArgs> 
    <vmArg>-Xmx1536m</vmArg>  
    <vmArg>-XX:MaxPermSize=256m</vmArg> 
  </vmArgs> 
</aut>  
```

### Enable Software Installation

Use Support software installation in the launched application to create p2 metadata for the plug-ins being launched and starts the application with a profile containing the metadata. If the launched application does not include p2, this option has no effect. The contents of the profile are cleared and recreated on each launch, but if the application is restarted the same profile is kept.

```xml
<aut>
  <enableSoftwareInstallation>true</enableSoftwareInstallation> 
</aut> 
``` 
### Persistent workspace

By default AUT's workspace is recreated each time AUT hangs and is forcefully restarted. This is done to prevent workspace corruption from blocking AUT startup (after test failures). If this is undesirable, use <code>reuseExistingWorkspace</code> option:

```xml
<aut>
  ...
  <reuseExistingWorkspace>true</reuseExistingWorkspace>
</aut>
```

### Extra projects

In case of using linked projects or folders in Workspace context, it might be required to specify an extra projects to be imported into RCPTT Runner workspace. This can be done by using <code>projects</code> element:

```xml
<projects>
    <project>${project.basedir}/../otherProject</project>
</projects>
```

### Test options

Options related to test execution are specified under <code>testOptions</code> element in plugin configuration. There are no required options here, so by default this element is just omitted.

The example below sets timeout options for the whole test suite and for a single test:

```xml
<testOptions>
    <execTimeout>30min</execTimeout>
    <testExecTimeout>5min</testExecTimeout>
</testOptions>
```

The complete list of parameters with their defaults is provided on <a href="https://ci.xored.com/doc/runner">RCPTT Runner</a> page.

### Tags to skip

Sometimes it might be valuable to skip certain test cases during test execution, for example if tests depend on specific operating system or other environment. For this purpose it is possible to mark such tests in RCPTT IDE with some specific tag and then specify option, for example:

```xml
<skipTags>
    <skipTag>requiresVPNConnection</skipTag>
    <skipTag>windowsOnlyTest</skipTag>
</skipTags>    
```

#### Test suites

By default RCPTT Maven plugin launches all tests in given projects (and extra projects) besides tests having tags from tags to skip list. In order to run only test cases belonging to test suite(s), the following lines can be added (suite name must match to a name of existing test suite inside a project):

```xml
<suites>
  <suite>MyTestSuite</suite>
</suites>
```

## Examples

### Simple project

This is a trivial example which uses most of defaults provided by rcptt-maven-plugin.

```xml
<project>
  <modelversion>4.0.0</modelversion>
  <groupid>com.xored.f4</groupid>
  <artifactid>rcpttTests</artifactid>
  <version>0.0.1-SNAPSHOT</version>
  <packaging>rcpttTest</packaging>
 
  <build>
    <plugins>
      <plugin>
        <groupid>org.eclipse.rcptt</groupid>
        <artifactid>rcptt-maven-plugin</artifactid>
        <version>2.0.0-SNAPSHOT</version>
        <extensions>true</extensions>
        <configuration>
          <aut>
            <groupid>com.xored.f4</groupid>
            <artifactid>com.xored.f4.product</artifactid>
          </aut>
        </configuration>
      </plugin>
    </plugins>
  </build>
 
  <pluginrepositories> 
    <pluginrepository>
      <id>rcptt-snapshots</id>
      <name>RCPTT Maven Snapshots repository</name>
      <snapshots>
      	<updatePolicy>always</updatePolicy>
      </snapshots>
      <url>https://repo.eclipse.org/content/repositories/rcptt-snapshots/</url>
    </pluginrepository> 
     <pluginrepository>
      <id>rcptt-releases</id>
      <name>RCPTT Maven repository</name>
      <url>https://repo.eclipse.org/content/repositories/rcptt-releases/</url>
    </pluginrepository>
  </pluginrepositories>
</project>
```

#### Dependent projects

Dependencies between test projects are described in the same way as it is for other maven projects, one thing to note is that type element must be set to rcpttTest:

```xml
...
<dependencies>
  <dependency>
    <groupid>com.xored.f4</groupid>
    <artifactid>rcpttTests2</artifactid>
    <version>0.0.1-SNAPSHOT</version>
    <type>rcpttTest</type>
  </dependency>
</dependencies>
...
```

Current implementation assumes that all dependencies are packed and located either in local or in some of configured remote repositories which means that when using dependencies between projects it is necessary to use at least install phase.

## Maven-related details

#### Phases and Goals

For ease of use and ability of further customization, RCPTT tests projects use custom packaging type `rcpttTest`, since it is a natural way to associate a particular lifecycle with a project. The table below describes all phases used by RCPTT Maven plugin and actions performed on these phases.


|Phase|Goal|Description|
|-----|----|-----------|
|generate-resources|org.eclipse.rcptt:rcptt-maven-plugin:resources |{{< grid/div isMarkdown="true" >}}
- Copies project to `target/projects/artifactId`
- Resolves all dependencies of type rcpttTest and unpacks them to `target/projects`
- If AUT is an archive, unpacks AUT to `target/aut`
- Downloads if necessary and unpacks RCPTT runner to `target/runner`
- Creates `target/results` directory
{{< / grid/div >}}
|compile|org.eclipse.rcptt:rcptt-maven-plugin:execute|{{< grid/div isMarkdown="true" >}}
Launches RCPTT runner:
- RCPTT runner workspace is set to target/runner-workspace
- AUT workspace prefix is target/autWorkspace.
- Puts generated JUnit XML report to target/surefire-reports
{{< / grid/div >}}
package|org.eclipse.rcptt:rcptt-maven-plugin:package|Packages RCPTT project and execution results as artifacts (see below)
install|maven-install-plugin:install|default
deploy|maven-deploy-plugin:deploy|default


#### Produced artifacts
The package phase produces two artifacts:
- The project itself as primary artifact (so it can be references by other projects)
- RCPTT execution results/logs/outputs and other information which can be helpful to identify the reason of failures. This artifact has classifier `results`.

Below is the complete list of items included into results artifact:

- **rcpttTests.html**: HTML report
- **out.txt**: Runner process output stream contents
- **err.txt**: Runner process error stream contents
- **log.txt, log1.txt**: Runner workspace logs (.log and .bak_N.log files from .metadata)
- `log<N>[restart<M>].txt`: AUT workspace logs.
