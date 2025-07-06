
We've ensured that this project is compatible with `Hugo 0.110.0`. For information on the specific versions of Hugo we support, you can refer to the [readme.md](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-solstice-theme#getting-started) of our [Hugo Solstice Theme](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-solstice-theme) project.

[[_TOC_]]

## Getting started
### Prerequisites
- Docker

### Setup
Clone the project with submodules and start a web server:

```bash
git clone --recurse-submodules git@github.com:eclipse-rcptt/rcptt-website.git
cd rcptt-website
./hugo.sh server --bind 0.0.0.0
```

### Update hugo-solstice-theme

The [hugo-solstice-theme](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-solstice-theme) was added to this project as a Git submodule. We recomend that you update to the latest version before getting started:

```bash
git submodule update --remote
```

Please make sure to keep this sub-module up-to-date if you decide to utilize it. The Eclipse Foundation Webdev team regularly publishes new versions. For more information, please see Git documentation on [submodules](https://git-scm.com/book/en/v2/Git-Tools-Submodules).

## Build website

The site is published by a [Jenkins job](https://ci.eclipse.org/rcptt/view/active/job/rcptt-website/job/main/) when main branch is updated.
Other branches are just tested instead.

## Learn Hugo

If you're new to Hugo, I highly recommend checking out its [documentation](https://gohugo.io/documentation/) to learn how to create pages and customize your site. Although you're starting with [hugo-solstice-theme](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-solstice-theme), remember that Hugo is highly extensible, allowing you to override as much or as little as you need. For example, you may choose to keep our default footer but override our header. You can make as many changes as you want as long as your website continues to adhere to the [Eclipse Foundation Hosted Services Privacy and Acceptable Usage Policy](https://www.eclipse.org/org/documents/eclipse-foundation-hosted-services-privacy-and-acceptable-usage-policy.pdf).

### Declared Project Licenses

This program and the accompanying materials are made available under the terms
of the Eclipse Public License v. 2.0 which is available at
http://www.eclipse.org/legal/epl-2.0.

SPDX-License-Identifier: EPL-2.0

## Trademarks

* Eclipse® is a Trademark of the Eclipse Foundation, Inc.
* Eclipse Foundation is a Trademark of the Eclipse Foundation, Inc.

## Copyright and license

Copyright 2021 the [Eclipse Foundation, Inc.](https://www.eclipse.org) and the [hugo-eclipsefdn-website-boilerplate authors](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-eclipsefdn-website-boilerplate/-/graphs/main). Code released under the [Eclipse Public License Version 2.0 (EPL-2.0)](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-eclipsefdn-website-boilerplate/-/blob/main/LICENSE).
