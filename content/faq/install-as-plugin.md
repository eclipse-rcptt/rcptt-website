---
title: Can RCPTT be installed as Eclipse plugin?
slug: install-as-plugin
date: 2016-06-23
sidebar: home
menu:
  sidebar:
    parent: faq
---

RCPTT consists of two parts - RCPTT IDE, which is used for launching AUTs, developing and running test cases, 
and RCPTT Runtime (hidden), which is automatically put inside AUT in order to provide recording/replaying of user actions.

RCPTT IDE can be installed as an Eclipse plug-in (update site), but only into a single version of Eclipse Platform (depending on a release), as it uses internal APIs.
Installing RCPTT IDE into Eclipse Plugin Development Environment allows you to launch your AUT from sources.

RCPTT Runtime supports all Eclipse versions from 3.6 to 4.31

If you want to use RCPTT to connect to AUT from sources, then you should be able to do it like this:


- Install RCPTT into Eclipse 4.5
- Set target platform to Eclipse 4.5
- Checkout your sources and create Eclipse Application launch configuration as you would normally do.
- In Run->Run configurations dialog find an 'Eclipse Application under Test' launch configuration type, create a new one and on launch configuration property page select your existing Eclipse Application launch configuration.
If you switch to RCPTT perspective then, you should be able to see your AUT in Applications view and launch it.


# Is support for latest PDE planned?
We strive to support current Eclipse release. Usally we manage to provide support within a month of PDE release. You can design tests and run them for all versions of Eclipse with RCPTT. No restrictions on this.

# If AUT from sources launching fails with error message: No org.eclipse.equinox.weaving.hook plugin
## Solutions:
### Recreate AUT's launch configiraiton
If you open your target platforms in preferences, you can see a copy of your configured target, created with RCPTT. 
Remove it and launch configuration with RCPTT again (target platform should be recreated).
### Manually add RCPTT runtime into your application
Copy plugins from 

- rcptt/plugins/org.eclipse.rcptt.updates.aspectj.e3x_&lt;version>/dependencies/plugins (from Eclipse 3.4 to 3.7)
- rcptt/plugins/org.eclipse.rcptt.updates.aspectj.e38x_&lt;version>/dependencies/plugins (from Eclipse 3.8 to 4.3)
- rcptt/plugins/org.eclipse.rcptt.updates.aspectj.e44x_&lt;version>/dependencies/plugins (from Eclipse 4.4 and higher)

right into eclipse/plugins folder(or whatever where Equinox plugins are located):


There are four plugins to copy:
- org.eclipse.equinox.weaving.aspectj_qualifier.jar
- org.eclipse.equinox.weaving.hook_qualifier.jar
- org.aspectj.runtime_qualifier.jar
- org.aspectj.weaver_qualifier.jar
