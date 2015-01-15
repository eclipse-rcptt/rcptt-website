---
title: Launch Contexts
slug: contexts/launch
nav_name: userguide
layout: doc
---

{% import "macros" as m %}

Launch contexts are used to control AUT Launches and Launch Configurations. 

{% include "screenshot-guide" %}
<div class="screenshot">
<img src="{{site.url}}/shared/img/screenshot-launch-context-editor.png"></img>

{# Name #}
  {% set overlayContent %}
  All you need to know about context name
  {% endset %}
  {% set top, left, width, height = 93, 118, 100, 19 %}
  {% include "overlay" %}
  
  {# Tags #}
  {% set overlayContent %}
  All you need to know about tags
  {% endset %}
  {% set top, left, width, height = 119, 118, 100, 19 %}
  {% include "overlay" %}

  {# Add Tags #}
  {% set overlayContent %}
  All you need to know about adding tags
  {% endset %}
  {% set top, left, width, height = 118, 582, 22, 22 %}
  {% include "overlay" %}
  
  {# Capture button  #}
  {% set overlayContent %}
  Make a snapshot of AUT running launches and launch configurations and copy them into this context. 
  {% endset %}
  {% set top, left, width, height = 92, 614, 75, 22 %}
  {% include "overlay" %}

  {# Apply button  #}
  {% set overlayContent %}
  Adds launch configuration to AUT. Launches given configuration in a defined mode. Suspend launch at a given breakpoint.  If {{m.uiElement("Clear workspace")}} option is on, removes existing projects from AUT at first.
  {% endset %}
  {% set top, left, width, height = 118, 614, 75, 22 %}
  {% include "overlay" %}
  
  {# Terminate existing launches #}
  {% set overlayContent %}
  Turned on by default. Terminates all running launches if any. 
  {% endset %}
  {% set top, left, width, height = 200, 75, 180, 22 %}
  {% include "overlay" %}
  
  {# Keep launches #}
  {% set overlayContent %}
  If {{m.uiElement("Terminate existing launches")}} is on - this option allows to specify a list of launches, which should be kept intact.
  {% endset %}
  {% set top, left, width, height = 248, 75, 608, 19 %}
  {% include "overlay" %}
  
  {# Clear launch configurations #}
  {% set overlayContent %}
  Turned off by default. Clears a list of AUT launch configurations. 
  {% endset %}
  {% set top, left, width, height = 272, 75, 180, 22 %}
  {% include "overlay" %}
  
  {# Keep configurations #}
  {% set overlayContent %}
  If {{m.uiElement("Clear launch configurations")}} is on - this option allows to specify a list of launch configurations, which should be kept intact.
  {% endset %}
  {% set top, left, width, height = 320, 75, 608, 19 %}
  {% include "overlay" %}
  
  {# Clear breakpoints #}
  {% set overlayContent %}
  Turned on by default.  Clears all breakpoints. 
  {% endset %}
  {% set top, left, width, height = 343, 75, 180, 22 %}
  {% include "overlay" %}
  
  {# Add button #}
  {% set overlayContent %}
  "Add" button is always disabled for now.
  {% endset %}
  {% set top, left, width, height = 365, 639, 22, 22 %}
  {% include "overlay" %}
  
  
  {# Remove button #}
  {% set overlayContent %}
  Remove launch configuration/launch with this button. 
  {% endset %}
  {% set top, left, width, height = 365, 662, 22, 22 %}
  {% include "overlay" %}
  
  </div>
  
 <h3> Introduction </h3>

Sometimes for our testing we need to specificly configure AUT launches. Launch Context can
manage it.

Launch Context serves the following porposes:

<ul>
<li>Add Launch Configurations and/or run the required ones</li>
<li>Add breakpoints and pause a required launch at a breakpoint</li>
<li>Terminate existing launches (optional)</li>
<li>Clear launch configurations (optional)</li>
<li>Clear breakpoints (optional)</li>
</ul>

Thus you may flexibly adjust your AUT Launch Configuration state to make everything ready
for test creation.

<h3>Terminate Existing Launches.</h3>

Once you create a new Launch Context you can see that <i>Terminate existing launches</i> option
is enabled by default. That means the following: when the context is executed all running launches in your AUT
will be terminated. 

You can exclude any desired launches to avoid their termination - just list them
in a <i>Do not terminate launches...</i> field:


<div class="screenshot">
<img src="{{site.url}}/shared/img/screenshot-launch-context-2.png"></img>

{# Keep launches #}
  {% set overlayContent %}
  When the context is executed all launches are terminated except "myClass".
  {% endset %}
  {% set top, left, width, height = 248, 75, 606, 19 %}
  {% include "overlay" %}


</div>


If you uncheck <i>Terminate existing launches</i> button option - no running launches will be
terminated during context execution.

<h3>Clear Launch Configurations.</h3>

This option should be used if you wish to clear a list of existing Launch Configurations (disabled
by default).

By analogy with the termination described above you may want to leave some Run Configurations.
Just list them in "Do not delete following configrations" field.

<h3>Capture running launches state into a Launch Context.</h3>

Let's say you have 2 Launch Configurations -  HelloWorld and ByeWorld -  and to do your test
you need both of them running and suspending at breakpoints.

Once you have this state in your AUT you can press <span class="uiElement"><img src="{{site.url}}/shared/img/ui-capture.gif"></img> Capture</span> button and all your AUT launches
state will be captured as a context which will have all information about:

<ul>
<li>Existing launch configurations</li>
<li>Exising running launches (and their running modes - "run" or "debug")</li>
<li>Existing breakpoins</li>
</ul>

Now you can use this context in your test case - it will add corresponding configurations, run the
required launches in a debug mode and suspend them at their breakpoints.

Once you captured launch configurations - you can always edit it manually by removing any of
the configuration with <span class="uiElement"><img src="{{site.url}}/shared/img/ui-remove.png"</img>Remove</span> button (<span class="uiElement"><img src="{{site.url}}/shared/img/ui-add.gif"</img>Add</span> button is always disabled for now).
  
You may also manually change the attribute values:

<div class="screenshot">
<img src="{{site.url}}/shared/img/screenshot-launch-context-2.png"></img>

{# Keep launches #}
  {% set overlayContent %}
  You can change the mode, set 'run' or 'debug'. 
  {% endset %}
  {% set top, left, width, height = 510, 425, 40, 19 %}
  {% include "overlay" %}


</div>
  
<h3>Test Example: verify variable value during a debug process.</h3>

Let's imagine that you need to create a test case which verifies that variables are correctly updated
during a debug process.

To get this you need to create your Java class file, set a breakpoint, run this class in a debug
mode, switch to debug perspective with variables view and (finally!) make a verification.

But in fact all actions before a verification - is AUT state and not the test itself.  Using RCPTT Contexts
you may make your test elegant and easy-maintaining.

So you need the following contexts:
<ol>
<li><a href = "{{site.url}}/documentation/userguide/contexts/workspace">Workspace context</a> - to put Java Project on AUT workspace:
  
  {% include "screenshot-guide" %}
<div class="screenshot">
<img src="{{site.url}}/shared/img/screenshot-workspace-context-for-launch-context-example.png"></img>
 </div> 
</li>
<li><a href = "{{site.url}}/documentation/userguide/contexts/workbench">Workbench context</a> - to switch to Debug Perspective:

<div class="screenshot">
<img src="{{site.url}}/shared/img/screenshot-workbench-context-for-launch-context-example.png"></img>
 </div> 
</li>
 
<li>Launch context - to set a breakpoint and run java class in a debug mode:

<div class="screenshot">
<img src="{{site.url}}/shared/img/screenshot-launch-context-3.png"></img>
 </div> 
</li>

Place these contexts into your test case and record your test which shrinks to a few lines of code:

<div class="screenshot">
<img src="{{site.url}}/shared/img/screenshot-test-with-launch-context.png"></img>
 </div>

</ol>

You may note <i>Stop all launches</i> context marked as a <a href = "{{site.url}}/documentation/userguide/contexts/default">Default context</a>.
It terminates all active launches before a workspace context will try to delete all files.
This hint helps us to avoid the situation when some files could be locked. It's a good practice
to use this context as a Default Context for AUT with launches.

</div>
