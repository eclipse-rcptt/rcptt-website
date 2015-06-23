#! /bin/sh
# Set properties below
runnerPath=/path/to/runner
autPath=/path/to/aut
project=.

# properties below configure all intermediate and result files
# to be put in "results" folder next to a project folder. If
# that's ok, you can leave them as is

testResults=$project/../results
runnerWorkspace=$testResults/runner-workspace
autWorkspace=$testResults/aut-workspace-
autOut=$testResults/aut-out-
junitReport=$testResults/results.xml
htmlReport=$testResults/results.html

rm -rf $testResults
mkdir $testResults

java -jar $runnerPath/plugins/org.eclipse.equinox.launcher_1.3.100.v20150511-1540.jar \
     -application org.eclipse.rcptt.runner.headless \
     -data $runnerWorkspace \
     -aut $autPath \
     -autWsPrefix $autWorkspace \
     -autConsolePrefix $autOut \
     -htmlReport $htmlReport \
     -junitReport $junitReport \
     -import $project
