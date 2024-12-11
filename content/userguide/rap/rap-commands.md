---
title: Specific ECL commands for RAP
slug: rap/rap-commands
sidebar: userguide
layout: doc
---


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
			<td width="25%">**get-runtime-target**</td>
			<td>The command returns information about runtime id.<br>
			**<i><u>Returns value:</u></i>**<br>
             “rap” or “swt”<br>
   **<i><u>Example:</u></i>**<br>
   ```ecl
if [get-runtime-target | eq "rap" ] {
   //some code
}

```

			
</td></tr>

<tr>
			<td>**mark-download-handler**</td>
			<td>The command notes a download handlers. This command is necessary because the RAP has no the standardized approach for the description of download files. 
<br>
			**<i><u>Arguments:</u></i>**<br>
             **-handler** - a string array with download handler ids.
<br>
   **<i><u>Example:</u></i>**<br>
   ```ecl
mark-download-handler "example.id.download.handler"

```

			
</td></tr>

<tr>
			<td>**run-js**</td>
			<td>The command run java script code at the time of execution test.

<br>
			**<i><u>Arguments:</u></i>**<br>
             **-jsCode** - a string with JS code.

<br>
   **<i><u>Example:</u></i>**<br>
   ```ecl
run-js "alert(‘Hello world’)"

```

			
</td></tr>

<tr>
			<td>**exec-without-js**</td>
			<td>The statement command which blocks method JavaScriptExecutor.execute.

<br>
   **<i><u>Example:</u></i>**<br>
   ```ecl
exec-without-js {
   // this command will be call, but JS code not executed
   // redirect will be ignored
   run-js "window.location=http://127.0.0.1"  
}

```

			
</td></tr>

<tr>
			<td>**download-file**</td>
			<td>The command download file by url

<br>

**<i><u>Arguments:</u></i>**<br>
             **-url** - url for downloading file <br>
             **-handlerId** - a downloading handlerId <br>
   **<i><u>Example:</u></i>**<br>
   ```ecl
download-file "PGh0bWwgeG1sbnM6ZGF…."

```

			
</td></tr>


<tr>
			<td>**match-binary**</td>
			<td>The command matching an array of bytes with file or base64 content

<br>

**<i><u>Arguments:</u></i>**<br>
             **-filePath** - a string to file for mathing. <br>
             **-base64** - a string with base64 contef for mathing <br>
   **<i><u>Example:</u></i>**<br>
   ```ecl
match-binary
   -filePath "workspace://file.text"

```

			
</td></tr>

<tr>
			<td>**upload-file**</td>
			<td>The command matching an array of bytes with file or base64 content

<br>

**<i><u>Arguments:</u></i>**<br>
             **-file** - a path to file. <br>
             **-base64** - a string which contains encoded file on Base64  format. <br>
   **<i><u>Example:</u></i>**<br>
   ```ecl
upload-file -base64 "PGh0bWwgeG1sbnM6ZGF…."

```

			
</td></tr>

<tr>
			<td>**to-string**</td>
			<td>The command upload file from base64 format or file.

<br>

**<i><u>Arguments:</u></i>**<br>
             **-encode** - a character format (default UTF-8). <br>
   **<i><u>Example:</u></i>**<br>
   ```ecl
download-file -handler "example.id.download.handler" 
-url "http://download.example.web/file.html"  
| to-string | conteins “searching string” | verify-true

```

			
</td></tr>

</tbody></table>