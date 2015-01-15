---
title: RCPTT Blog launched
author: Ivan Inozemtsev
categories: [news]
forum: https://www.eclipse.org/forums/index.php/t/852796/
---
{% import "macros" as m %}
Finally we've launched an RCPTT blog! We published a few older articles here, so that this blog wouldn't look too empty :).

Oh, and by the way, if you haven't noticed yet, now we've got a nice syntax colorer for ECL snippets (thanks to an awesome [prism.js](http://prismjs.com) library):

{% set snippet %}
proc "find-tab-folder" [val activePage] {
  loop [val index [int 0]] {
    let [val folder [get-tab-folder -index $index]] {
      let [val folderActivePage [$folder | get-property activePage -raw]] {
        if [$folderActivePage | eq $activePage] {
          $folder //returning result
        } -else {
          recur [$index | plus 1]
        }
      }
    }
  }
}
find-tab-folder "Task List" | get-object | save-screenshot "/tmp/tmp/tsk.png"
//get-property activePage | equals "Package Explorer" | verify-true
{% endset %}
{{m.ecl(snippet)}}

Things like rss/atom feeds and improved navigation are to be added in a nearest future.

Stay tuned!
