---
title: ECL Script Contexts
slug: ecl
sidebar: userguide
menu:
  sidebar:
    parent: contexts
---

ECL Script contexts serve two purposes:

- Allow to execute any ECL script before running your test. 
  This can be useful for some test setup routines which cannot be performed 
  by [other context types](../contexts/) but still 
  they need to be separated from the main testing logic and/or re-used in multiple tests.
- Allow to store [user-defined procedures](../../procedures/) (defined as {{< eclCommand proc >}}).


