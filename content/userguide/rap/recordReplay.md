---
title: Recording and Replay
slug: rap/recordReplay
sidebar: userguide
layout: doc
---


Recording & Replay are performed same way as in RCPTT.

### Long UI operation:

RCPTT execute ECL commands when command execution is allowed by set of criteria. For RAP applications we also added a round-robin criteria with request from UI to the server. Some UI operations can be executed in several requests. 

Some long running operations are could not be tracked automatically, example of such operation is Login. So at replay we need to add a **“wait -ms”** instruction manually.

***Login example snippet:***

```ecl
//wait is is long operation 
 with [get-window Login] {
    get-editbox -after [get-label "Username:"] | set-text admin
    get-editbox -after [get-label "Password:"] | 
				set-text [decrypt "/CLWiEOG/UO3teVLLK29Pg=="]
    get-button Login | click
}
wait 1000

```


**# Now we can work as expected.**

### ECL Commands for Download testing.

To test file downloading, it is necessary to contact Product engineers and ask for a list of Identifiers of RAP handler implemented for downloading. The ids of a handlers. It is necessary as in RAP there are no strict mechanism for downloading and everything occurs through data recording in HttpResponse.

To set identifier for handler we provide a ECL command: 
```ecl
mark-download-handler "handler.id" 

```
Execution of this command is required to perform in context before recording a new download test scenario.

During downloading of files the majority of browsers open special download dialog.
It results access to which it is impossible to get through a code in need to interfere the user.  In case of reproduction of tests it isn't admissible. 
Therefore when the test replaying for file downloading is used special ECL command:
```ecl
download-file

```

The command executes download handler with URL.  This command is wrapped in ```ecl
exec-without-js

```
ECL command which skip execution of JavaScript via RAP. It is necessary for prevention of opening the browser download file dialog.  If Download is implemented by HTML this step is not necesesary.

A download handler should support a special parameters to allow verification via RCPTT of downloadable content.

***Download example:***

{% set snippet %}
exec-without-js {
     // this command move inside to exec-without-js because call 
   // window.location = download_url for download file
   get-window "Transformation complete" | get-button OK | click
    download-file -handlerId "xclinical.common.eclipse.util.RapFileDownload"   -url "/?servicehandler=xclinical.common.eclipse.util.RapFileDownload&cid=6b612c18&filename=23f3b14e-4f74-48c6-a0d4-da6aa7af161c&output=Default.Study.OID%20-%20Default.MDV.OID.html" 
    | match-binary -base64 "PGh0bWwgeG1sbnM6ZGF0ZT0iaHR0" 
    + "cDovL2V4c2x0Lm9yZy9kYXRlcy1hb" 
    + "mQtdGltZXMiIHhtbG5zOnhjPSJodHRwOi…" | verify-true
}
{% endset %}

For validation the contents of downloading file, you should to transform file to a string (use command **to-string</b>). Then it is possible to use any command which process strings (as example <b>contains**).

***Example:***

```ecl
download-file -handlerId "id" -url "/?servicehandler=download.handler" | to-string "UTF-8" | contains "foo string" | verify-true

```

***or:***

```ecl
download-file -handlerId "id" -url "/?servicehandler=download.handler" | to-string "UTF-8" | mathing "regexp string" | verify-true

```

### Upload file:

1. Start a test record. Login. In the RAP application select **File->Import**  menu item.

<img src="{{site.url}}/shared/img/rap/pasted-image-76.png"></img>
<br><br>

2. Choose files for uploading on your computer, and press Ok button.

<img src="{{site.url}}/shared/img/rap/pasted-image-79.png"></img>
<br><br>

3. RCPTT automatically create an ECL command for uploading file - **upload-result**. (Important: the upload command register before click to the Ok button command, such sequence is necessary for replay).

<img src="{{site.url}}/shared/img/rap/pasted-image-67.png" width="800"></img>
<br><br>

4. When test will replay, The file upload dialog won't be open, this upload behaviour will emulate programmatically.



