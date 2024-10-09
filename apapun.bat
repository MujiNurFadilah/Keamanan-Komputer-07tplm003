@ECHO OFF
SET counter=0

:top
START "" "%SystemRoot%\System32\notepad.exe"
SET /A counter+=1
ECHO Notepad telah dibuka %counter% kali.

REM Delay selama 2 detik sebelum membuka Notepad lagi
TIMEOUT /T 2 /NOBREAK >NUL

GOTO top
