---
title: "RCP Testing Tool"
date: 2024-12-09T14:26:34+04:00
#headline: "The Community for Open Innovation and Collaboration"
#tagline: "The Eclipse Foundation provides our global community of individuals and organizations with a mature, scalable, and business-friendly environment for open source software collaboration and innovation."
hide_page_title: true
#hide_sidebar: true
#hide_breadcrumb: true
#show_featured_story: true
layout: "single"
#links: [[href: "/projects/", text: "Projects"],[href: "/org/workinggroups/", text: "Working Group"],[href: "/membership/", text: "Members"],[href: "/org/value", text: "Business Value"]]
#container: "container-fluid"
---

# RCP Testing Tool

RCP Testing Tool is a project for GUI testing automation of Eclipse-based applications. RCPTT is fully aware about Eclipse Platform's internals, hiding this complexity from end users and allowing QA engineers to create highly reliable UI tests at great pace.

{{< starterkit/example >}}

# Key features
- Test case creation productivity – ability to record user actions at the same level of efficiency as manual script creation, ability to capture initial/final application state into reusable models for further state restoring/verification.
- First class support of Eclipse technologies – testing tool should be aware about key concepts of Eclipse Platform, including but not limited to Workspace, Workbench, Preferences, Debug API, as well as understand the underlying UI structure, like parts of Eclipse Workbench (views, editors, toolbars) and structure of GEF/GMF/Graphiti diagrams.
- Intelligent runtime – automatic wait of UI-triggered background asynchronous operations (including jobs, display async/timer execs, decorations, databindings, text reconcilers, text hovers, and so on)
- Reliable results – elemination of false negatives and false positives by isolation of test cases from each other, independence on screen size/operating system, etc.
- Maintainability – test case artifacts should be easily modifyable to reflect UI changes and be version control system friendly
- Extensibility – provide APIs for extending tool in order to support custom widgets, contexts, reports and async primitives.
- Continuous Integration – CI Test Runner runs tests locally and in integration with Jenkins, Hudson, or other CI tools.

# Configuration

The minimal required configuration of applications under test is as simple as browsing for a folder for binary AUTs or choosing a PDE launch configuration for AUTs from sources.
Workflow

# Workflow
A typical workflow to create a test case which should work in most cases looks like this:

- Capture an application state
- Record test actions
- Add assertions

More complex activities including test parameterization, extracting common pieces of functionality into reusable actions, writing test cases manually before UI, and test case debugging are also available. Developers can extend the tool's functionality to add record/replay support of custom widgets and capture/apply support of custom aspects of an application state.



