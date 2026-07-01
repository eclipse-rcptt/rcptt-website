
## Project Overview

This is the source for the [Eclipse RCP Testing Tool (RCPTT) documentation website](https://eclipse.dev/rcptt), a static site built with [Hugo](https://gohugo.io/) using the [Eclipse Foundation Hugo Solstice Theme](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-solstice-theme).

RCPTT is an Eclipse-based UI testing tool for Eclipse RCP applications.

## Repository Structure

```
.
├── config.toml          # Hugo site configuration (base URL, theme, params, menus)
├── hugo.sh              # Wrapper script to run Hugo via Docker
├── content/             # Markdown content pages
│   ├── _index.md        # Site home page
│   ├── download/        # Download page
│   ├── faq/             # Frequently asked questions
│   ├── support.md       # Support page
│   └── userguide/       # User guide (contexts, verifications, ECL, runner, etc.)
├── layouts/             # Hugo layout overrides (HTML templates)
├── static/              # Static assets (images, CSS, JS)
└── themes/              # Git submodule: hugo-solstice-theme
```

## Building and Running Locally

**Prerequisites:** Docker must be installed.

Clone with submodules:
```bash
git clone --recurse-submodules git@github.com:eclipse-rcptt/rcptt-website.git
cd rcptt-website
```

Serve locally automatically pulling in changes from disk (available at <http://localhost:1313/rcptt/>):
```bash
./hugo.sh server --bind 0.0.0.0 # runs until killed
```

Build the static site:
```bash
./hugo.sh
```

The `hugo.sh` script uses the Docker image `eclipsecbi/hugo_extended:0.110.0`.

## Content Guidelines

- All content pages are Markdown files inside `content/`.
- Front matter uses YAML format (`metaDataFormat = "yaml"` in `config.toml`).
- Section index files are named `_index.md`; single pages use either `<name>.md` or `index.md` inside a directory.
- The current RCPTT release version is set in `config.toml` under `[Params]`:
  - `RCPTTRELEASE` — latest stable release
  - `RCPTTNIGHTLYVERSION` — current nightly/snapshot version
- Update these values in `config.toml` when a new release is made.

## CI / Publishing

- The site is published automatically by a [Jenkins job](https://ci.eclipse.org/rcptt/view/active/job/rcptt-website/job/main/) when the `main` branch is updated.
- Non-`main` branches are only validated (not published).

## License

[Eclipse Public License v2.0 (EPL-2.0)](LICENSE)



## Eclipse Contributor Agreement

Before your contribution can be accepted by the project team contributors must
electronically sign the Eclipse Contributor Agreement (ECA).

* http://www.eclipse.org/legal/ECA.php

Commits that are provided by non-committers must have a Signed-off-by field in
the footer indicating that the author is aware of the terms by which the
contribution has been provided to the project. The non-committer must
additionally have an Eclipse Foundation account and must have a signed Eclipse
Contributor Agreement (ECA) on file.

For more information, please see the Eclipse Committer Handbook:
https://www.eclipse.org/projects/handbook/#resources-commit
