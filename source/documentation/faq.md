---
title: Frequently Asked Questions
nav_name: faq
layout: default
---

### Frequently Asked Questions.

Feel free to aks any questions via <a href="https://www.eclipse.org/forums/index.php/f/281/">RCP Testing Tool Forum</a> or <a href="https://dev.eclipse.org/mailman/listinfo/rcptt-users">rcptt-users</a> mailing list.

<ul>
	{% for q in site.faq %}
	  <li {% if q.slug == page.slug %}class="active" {% endif %}><a href="{{site.url}}/documentation/{{q.url}}">{{q.name}}</a>
	  </li>
	{% endfor %}
</ul>


