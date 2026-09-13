@echo off
setlocal
cd /d "%~dp0"

if not exist "vendor\autoload.php" (
    echo Installing PHP dependencies...
    call composer install
)

if not exist "public\build\manifest.json" (
    echo Installing frontend dependencies and building assets...
    call npm install
    call npm run build
)

echo ClimateShield is running at http://127.0.0.1:8000
start "ClimateShield server" /D "%~dp0" cmd /k "php artisan serve --host=127.0.0.1 --port=8000"

set "ready="
for /l %%i in (1,1,20) do (
    curl.exe --silent --output nul --max-time 1 http://127.0.0.1:8000/login
    if not errorlevel 1 (
        set "ready=1"
        goto :open_browser
    )
    timeout /t 1 /nobreak >nul
)

echo.
echo ERROR: Laravel did not start on port 8000.
echo Check the ClimateShield server window for the detailed error.
pause
exit /b 1

:open_browser
start "" "http://127.0.0.1:8000"