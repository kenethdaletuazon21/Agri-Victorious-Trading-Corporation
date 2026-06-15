@echo off
REM Agri-Victorious Website - Windows Deployment Check Script
REM This script verifies the website structure on Windows

echo ======================================
echo Agri-Victorious Trading Corporation
echo Website Deployment Check (Windows)
echo ======================================
echo.

REM Check if config.php exists
if not exist "config.php" (
    echo ERROR: config.php not found!
    exit /b 1
)

echo Checking required directories...

REM Check required directories
for %%D in (css js includes pages images) do (
    if exist "%%D\" (
        echo [OK] Directory %%D found
    ) else (
        echo [ERROR] Directory %%D not found!
        exit /b 1
    )
)

echo.
echo Checking required files...

REM Check required files
for %%F in (config.php index.php css/style.css js/script.js includes/header.php includes/footer.php pages/about.php pages/products.php pages/resources.php pages/contact.php) do (
    if exist "%%F" (
        echo [OK] File %%F found
    ) else (
        echo [ERROR] File %%F not found!
        exit /b 1
    )
)

echo.
echo Checking images...

REM Check for image files
if exist "images\logo.png" (
    echo [OK] logo.png found
) else (
    echo [WARNING] logo.png not found in images\
)

if exist "images\banner.png" (
    echo [OK] banner.png found
) else (
    echo [WARNING] banner.png not found in images\
)

echo.
echo ======================================
echo Deployment Check Complete!
echo ======================================
echo.
echo Website Details:
echo - Company: Agri-Victorious Trading Corporation
echo - Email: arcangelguillermo1007@gmail.com
echo - Phone: +639171792888 / +639055012888
echo.
echo Ready to deploy!
echo.
echo Next steps:
echo 1. Upload all files to your web server
echo 2. Ensure PHP 7.0+ is installed
echo 3. Copy images (logo.png, banner.png) to images\ folder
echo 4. Access http://your-domain/website/
echo.
pause
