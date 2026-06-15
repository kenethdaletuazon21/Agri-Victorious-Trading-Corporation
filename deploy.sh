#!/bin/bash
# Agri-Victorious Website - Deployment Script
# This script helps deploy the website to a server

echo "======================================"
echo "Agri-Victorious Trading Corporation"
echo "Website Deployment Script"
echo "======================================"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if config.php exists
if [ ! -f "config.php" ]; then
    echo -e "${RED}Error: config.php not found!${NC}"
    exit 1
fi

echo -e "${YELLOW}Checking file structure...${NC}"

# Check required directories
required_dirs=("css" "js" "includes" "pages" "images")
for dir in "${required_dirs[@]}"; do
    if [ ! -d "$dir" ]; then
        echo -e "${RED}Error: Directory '$dir' not found!${NC}"
        exit 1
    else
        echo -e "${GREEN}✓ Directory '$dir' found${NC}"
    fi
done

echo -e "${YELLOW}Checking required files...${NC}"

# Check required files
required_files=("config.php" "index.php" "css/style.css" "js/script.js" "includes/header.php" "includes/footer.php" "pages/about.php" "pages/products.php" "pages/resources.php" "pages/contact.php")
for file in "${required_files[@]}"; do
    if [ -f "$file" ]; then
        echo -e "${GREEN}✓ File '$file' found${NC}"
    else
        echo -e "${RED}Error: File '$file' not found!${NC}"
        exit 1
    fi
done

echo -e "${YELLOW}Checking images...${NC}"

# Check for image files
if [ -f "images/logo.png" ]; then
    echo -e "${GREEN}✓ logo.png found${NC}"
else
    echo -e "${YELLOW}⚠ Warning: logo.png not found in images/$(NC}"
fi

if [ -f "images/banner.png" ]; then
    echo -e "${GREEN}✓ banner.png found${NC}"
else
    echo -e "${YELLOW}⚠ Warning: banner.png not found in images/${NC}"
fi

# Set file permissions
echo -e "${YELLOW}Setting file permissions...${NC}"
chmod -R 755 .
chmod -R 644 css/*.css
chmod -R 644 js/*.js
chmod -R 644 includes/*.php
chmod -R 644 pages/*.php

echo -e "${GREEN}✓ File permissions set${NC}"

# Display summary
echo ""
echo -e "${GREEN}======================================"
echo "Deployment Check Complete!"
echo "======================================${NC}"
echo ""
echo "Website Details:"
echo "- Company: Agri-Victorious Trading Corporation"
echo "- Email: arcangelguillermo1007@gmail.com"
echo "- Phone: +639171792888 / +639055012888"
echo ""
echo "Ready to deploy!"
echo ""
echo "Next steps:"
echo "1. Upload all files to your web server"
echo "2. Ensure PHP 7.0+ is installed"
echo "3. Copy images (logo.png, banner.png) to images/ folder"
echo "4. Access http://your-domain/website/"
