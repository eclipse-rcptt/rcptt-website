REM !!! Replace the value below with the path to the directory there
REM application under test (AUT) is located.
SET AUT=C:\absolute\path\to\your\application\directory
SET RUNNER=%USERPROFILE%\runner
SET PROJECT=.


REM Path to directory with test results, default is C:\Users\User\results
SET RESULTS=%PROJECT%\..\results

REM Remove results dir if present
IF NOT EXIST %RESULTS% GOTO NORESULTS
RMDIR /S /Q %RESULTS%

:NORESULTS
md %RESULTS%

java -jar %RUNNER%/plugins/org.eclipse.equinox.launcher_1.3.100.v20150511-1540.jar ^
 -application org.eclipse.rcptt.runner.headless ^
 -data %RESULTS%/runner-workspace/ ^
 -aut %AUT% ^
 -autWsPrefix %RESULTS%/aut-workspace ^
 -autConsolePrefix %RESULTS%/aut-output ^
 -htmlReport %RESULTS%/report.html ^
 -junitReport %RESULTS%/report.xml ^
 -import %PROJECT% 
