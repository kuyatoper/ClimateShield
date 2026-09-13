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
timeout /t 3 /nobreak >nul
start "" "http://127.0.0.1:8000"