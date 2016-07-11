---
title: Maven plugin
slug: rap/rap-maven
nav_name: userguide
layout: doc
---
<pre>
<code>&lt;aut&gt;
  &lt;groupId&gt;eclipse&lt;/groupId&gt;
  &lt;artifactId&gt;sdk&lt;/artifactId&gt; 
  &lt;version&gt;3.7.0&lt;/version&gt;
  &lt;!— swt or rap. Default value  swt —&gt;
  &lt;platform&gt;rap&lt;/platform&gt;

  &lt;!— RAP AUT Settings —&gt;
  &lt;rap&gt;
    &lt;!— rap servlet port —&gt;
    &lt;port&gt;8080&lt;/port&gt;
      
    &lt;!— rap servlet start path—&gt;
    &lt;servletPath&gt;/&lt;/servletPath&gt;
    
    &lt;!— open browser command format : command %s  %s- url parameter —&gt;
    &lt;browserCmd&gt;chome.exe %s lt;/browserCmd&gt;
  &lt;/rap&gt;
&lt;/aut&gt;
</code></pre>

