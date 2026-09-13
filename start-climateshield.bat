@echo off
setlocal
cd /d "%~dp0"

if not exist "vendor\autoload.php" (
    echo Installing PHP dependencies...
    call composer install
    if errorlevel 1 (
        echo ERROR: Composer could not install PHP dependencies.
        pause
        exit /b 1
    )
)

if not exist "public\build\manifest.json" (
    echo Installing frontend dependencies and building assets...
    call npm install
    if errorlevel 1 (
        echo ERROR: npm could not install frontend dependencies.
        pause
        exit /b 1
    )
    call npm run build
    if errorlevel 1 (
        echo ERROR: Vite could not build frontend assets.
        pause
        exit /b 1
    )
)

curl.exe --silent --output nul --max-time 1 http://127.0.0.1:8000/login
if not errorlevel 1 goto :open_browser

echo Starting ClimateShield at http://127.0.0.1:8000
start "ClimateShield server" /D "%~dp0" "%ComSpec%" /k "php artisan serve --host=127.0.0.1 --port=8000"

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