---
title: Specific ECL commands for RAP
slug: rap/rap-commands
nav_name: userguide
layout: doc
---

{% import "macros" as m %}

To support RAP more smooth we added following RCL commands.

<div class="beforeTable">
</div>
<table class="info" width="800" >
	<thead>
		<tr>
			<th>Command</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="25%"><b>get-runtime-target</b></td>
			<td>The command returns information about runtime id.<br>
			<b><i><u>Returns value:</u></i></b><br>
             “rap” or “swt”<br>
   <b><i><u>Example:</u></i></b><br>
   {% set snippet %}
if [get-runtime-target | eq "rap" ] {
   //some code
}
{% endset %}

{{m.ecl("#{snippet}")}}
			
</td></tr>

<tr>
			<td><b>mark-download-handler</b></td>
			<td>The command notes a download handlers. This command is necessary because the RAP has no the standardized approach for the description of download files. 
<br>
			<b><i><u>Arguments:</u></i></b><br>
             <b>-handler</b> - a string array with download handler ids.
<br>
   <b><i><u>Example:</u></i></b><br>
   {% set snippet %}
mark-download-handler "example.id.download.handler"
{% endset %}

{{m.ecl("#{snippet}")}}
			
</td></tr>

<tr>
			<td><b>run-js</b></td>
			<td>The command run java script code at the time of execution test.

<br>
			<b><i><u>Arguments:</u></i></b><br>
             <b>-jsCode</b> - a string with JS code.

<br>
   <b><i><u>Example:</u></i></b><br>
   {% set snippet %}
run-js "alert(‘Hello world’)"
{% endset %}

{{m.ecl("#{snippet}")}}
			
</td></tr>

<tr>
			<td><b>exec-without-js</b></td>
			<td>The statement command which blocks method JavaScriptExecutor.execute.

<br>
   <b><i><u>Example:</u></i></b><br>
   {% set snippet %}
exec-without-js {
   // this command will be call, but JS code not executed
   // redirect will be ignored
   run-js "window.location=http://127.0.0.1"  
}
{% endset %}

{{m.ecl("#{snippet}")}}
			
</td></tr>

<tr>
			<td><b>download-file</b></td>
			<td>The command download file by url

<br>

<b><i><u>Arguments:</u></i></b><br>
             <b>-url</b> - url for downloading file <br>
             <b>-handlerId</b> - a downloading handlerId <br>
   <b><i><u>Example:</u></i></b><br>
   {% set snippet %}
download-file "PGh0bWwgeG1sbnM6ZGF…."
{% endset %}

{{m.ecl("#{snippet}")}}
			
</td></tr>


<tr>
			<td><b>match-binary</b></td>
			<td>The command matching an array of bytes with file or base64 content

<br>

<b><i><u>Arguments:</u></i></b><br>
             <b>-filePath</b> - a string to file for mathing. <br>
             <b>-base64</b> - a string with base64 contef for mathing <br>
   <b><i><u>Example:</u></i></b><br>
   {% set snippet %}
match-binary
   -filePath "workspace://file.text"
{% endset %}

{{m.ecl("#{snippet}")}}
			
</td></tr>

<tr>
			<td><b>upload-file</b></td>
			<td>The command matching an array of bytes with file or base64 content

<br>

<b><i><u>Arguments:</u></i></b><br>
             <b>-file</b> - a path to file. <br>
             <b>-base64</b> - a string which contains encoded file on Base64  format. <br>
   <b><i><u>Example:</u></i></b><br>
   {% set snippet %}
upload-file -base64 "PGh0bWwgeG1sbnM6ZGF…."
{% endset %}

{{m.ecl("#{snippet}")}}
			
</td></tr>

<tr>
			<td><b>to-string</b></td>
			<td>The command upload file from base64 format or file.

<br>

<b><i><u>Arguments:</u></i></b><br>
             <b>-encode</b> - a character format (default UTF-8). <br>
   <b><i><u>Example:</u></i></b><br>
   {% set snippet %}
download-file -handler "example.id.download.handler" 
-url "http://download.example.web/file.html"  
| to-string | conteins “searching string” | verify-true
{% endset %}

{{m.ecl("#{snippet}")}}
			
</td></tr>

</tbody></table>