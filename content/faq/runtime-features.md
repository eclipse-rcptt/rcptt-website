---
title: What does each runtime feature stand for?
slug: runtime-features
date: 2015-01-15
---

You can find different Runtime Features in RCPTT Advanced Options. Here you can find the description of the most of them. 


# Logging

| Feature                          | Description                              |
|----------------------------------|------------------------------------------|
| Enable Activity Logging          | expand activities logging                |
| Enable per command image capture | take a screenshot after each ECL command |

# Reporting

| Feature                           | Description                              |
|---------------------------------- |------------------------------------------|
| Include ignored timers            | report all  timerExecs info even those which we are not waiting for               |
| Include wait details              | include wait details into Report|
| Include trace and take screenshot | report screenshots made by {{< eclCommand take-screenshot >}} |

# Runtime Limits
| Feature                                         | Description                               |
|------------------------------------------------ |------------------------------------------ |
| Launch Timeout (sec)                            | abort every single test execution after a timeout |
| Context operation runnable timeout (ms)         | abort context application after a timeout |
| Time RCPTT wait for AUT application to startup (sec) | abort if AUT does not start         |
| AutoBuild Job Hang Skip timeout                 | do not wait for AutoBuild job if it takes too much time (usually, when we import resources into AUT workspace) |
| Log waiting for job if exceed                   | report if a job is too long |
| Job Hang Skip timeout                           | If job is running longer than this time, assume it is hung and move to the next command. |
| Enable step mode for job after timeout          | If job executes more than this time (in milliseconds) and sleeps (i.e. executing Thread.sleep() or Object.wait()), then RCPTT considers that this job is waiting for some user actions and continues to the next command.|
| Step mode: One step every                       | When job is in sleeping mode (see jobTreatAsSleeingTimeout option), execute commands with given delay (in milliseconds) between commands.|
| Step mode: Step mode timeout                    | Wait timeout in milliseconds for stepping jobs (see jobTreatAsSleepingTimeout and jobSleepingStepTime)|
| Wait for delayed jobs with delay less then      | Max job scheduled delay to be waited for in milliseconds. If job is scheduled with delay less than this value, RCPTT sets delay to 0 and waits for job completion (also see jobNullifyRescheduleMaxValue). Otherwise RCPTT Runtime does not wait for job completion if it is scheduled with a delay greater than this value.|
| Wait jobs completion after context apply        | If there are any jobs started after context applying, wait for their completion during this time (in milliseconds).|
| Delayed jobs scheduled with delay 0, if not rescheduled more then | If job reschedules itself more than times specified by this parameter, RCPTT stops setting delay to 0 (see jobScheduleDelayedMaxtime parameter).|
| Timeout for background Debug plugin launch Job  | Timeout in milliseconds for jobs scheduled from eclipse Debug plugin|
| Nullify timerExec if time is less then          | If Display.timerExec is scheduled for the delay less than this value (in milliseconds), set delay to 0.|



