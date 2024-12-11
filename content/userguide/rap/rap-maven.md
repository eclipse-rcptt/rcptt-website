---
title: Maven plugin
slug: rap/rap-maven
sidebar: userguide
layout: doc
---
<pre>
<code>
&lt;configuration&gt;
	&lt;aut&gt;
		&lt;rap&gt;
  			&lt;port&gt;10082&lt;/port&gt;
  			&lt;servletPath&gt;/&lt;/servletPath&gt;
  			&lt;!— open browser command format : command %s  %s- url parameter —&gt;
    		&lt;browserCmd&gt;chome.exe %s &lt;/browserCmd&gt;
  		&lt;/rap&gt;
  	&lt;/aut&gt;
  	&lt;runner&gt;
  			&lt;!--Other runner options--&gt;
  		&lt;platform&gt;rap&lt;/platform&gt;
  	&lt;/runner&gt;
&lt;configuration&gt;

</code></pre>

