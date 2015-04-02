---
title: Test Runner
slug: runner
layout: doc
nav_name: userguide
---

RCPTT is good enough to run tests occasionally, to keep quality of product milestones. To get more interactive results, to keep up with high development speed and agile techniques, project may require to run functional tests more than once a week. Once your test count reaches hundreds, whole run may take an hour or two and this may become time consuming and bothersome. This can be solved by continuous integration &mdash; automated run of integration tests on every commit or on a regular basis.

Runner is designed to cover this need and provides completely automated and unattended way of running testsuites on every build. Once you configure a build system to use it, you have no need to start and observe whole test suite manually anymore.