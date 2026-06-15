# Agri-Victorious Trading Corporation Website Setup Guide

## 📋 Overview
This is a professional PHP website for Agri-Victorious Trading Corporation - a fertilizer trading company. The website features bilingual content (Tagalog & English), dynamic product management, and comprehensive resource information.

## 📂 Directory Structure
```
website/
├── config.php                 # Configuration file
├── index.php                  # Home page
├── css/
│   └── style.css             # Main stylesheet
├── js/
│   └── script.js             # JavaScript functionality
├── includes/
│   ├── header.php            # Header & Navigation
│   ├── footer.php            # Footer
│   └── products-data.php     # Products database
├── pages/
│   ├── about.php             # About Us page
│   ├── products.php          # Products page
│   ├── resources.php         # Resources & Applications page
│   └── contact.php           # Contact page
└── images/                   # Images folder (copy here: logo.png, banner.png, products.png)
```

## 🚀 Installation & Setup

### Requirements
- PHP 7.0 or higher
- Web Server (Apache, Nginx, or similar)
- Modern Web Browser

### Setup Steps

1. **Copy Website Files**
   - Copy all website files to your web server's root directory or a subdirectory

2. **Set Up Images**
   - Copy the following images to the `website/images/` folder:
     - `logo.png` - Company logo
     - `banner.png` - Banner image
     - `products.png` - Products image (if needed)

3. **Configure Settings**
   - Edit `config.php` if you need to change company information
   - Current settings are already configured for Agri-Victorious Trading Corporation

4. **Set File Permissions**
   - Ensure `website/` folder and its contents have read permissions
   - On Linux: `chmod -R 755 website/`

5. **Access the Website**
   - Point your browser to: `http://localhost/website/` (or your domain)

## 🌐 Features

### Bilingual Support
- **Tagalog & English**: Toggle between languages via the language switcher
- All content displayed in Tagalog with italicized English translations
- Session-based language preferences

### Dynamic Pages
- **Home Page (index.php)**
  - Banner section
  - Hero introduction
  - About Us overview
  - Featured product categories
  - Quick contact information

- **About Us (pages/about.php)**
  - Company mission and vision
  - Company history
  - Why Choose Us
  - Team information

- **Products (pages/products.php)**
  - Complete product catalog (6 products included)
  - Product details with bilingual names and descriptions
  - Pricing information
  - Add to Cart functionality
  - Product quality guarantee

- **Resources (pages/resources.php)**
  - Fertilizer applications by crop type
  - Usage instructions and dosages
  - Safety and precautions
  - Monitoring tips
  - Micronutrient information

- **Contact (pages/contact.php)**
  - Multiple contact methods (phone, email, address)
  - Contact form submission
  - Operating hours
  - Frequently Asked Questions (FAQ)

### Technical Features
- Responsive Design (Mobile-friendly)
- Shopping cart functionality (using localStorage)
- Form validation
- Clean, modular PHP code
- Professional styling with CSS3
- Interactive JavaScript features

## 📱 Contact Information
- **Phone:** +639171792888 & +639055012888
- **Email:** arcangelguillermo1007@gmail.com
- **Location 1:** South Triangle Diliman, Diliman Quezon City
- **Location 2:** Tuguegarao City, Cagayan, Region 2, Cagayan Valley

## 🎨 Customization

### Changing Company Information
Edit `config.php`:
```php
define('COMPANY_NAME', 'Agri-Victorious Trading Corporation');
define('COMPANY_EMAIL', 'arcangelguillermo1007@gmail.com');
define('COMPANY_PHONE_1', '+639171792888');
define('COMPANY_PHONE_2', '+639055012888');
define('COMPANY_ADDRESS_1', 'South Triangle Diliman, Diliman Quezon City');
define('COMPANY_ADDRESS_2', 'Tuguegarao City, Cagayan, Region 2, Cagayan Valley');
```

### Changing Colors
Edit `css/style.css` - Modify CSS variables:
```css
:root {
    --primary-color: #2c5f2d;      /* Green */
    --secondary-color: #f39c12;    /* Orange */
    --dark-color: #1a1a1a;
    --light-color: #f4f4f4;
}
```

### Adding Products
Edit `includes/products-data.php`:
```php
$products = array(
    array(
        'id' => 1,
        'name_tl' => 'Tagalog Name',
        'name_en' => 'English Name',
        'description_tl' => 'Tagalog description',
        'description_en' => 'English description',
        'price' => 450,
        'unit' => 'Tagalog / English',
        'quantity' => '25kg'
    ),
    // Add more products here
);
```

## 📊 Products Included

1. **NPK Fertilizer (10-10-10)** - ₱450 per 25kg sack
2. **Organic Compost** - ₱320 per 20kg sack
3. **Phosphate Fertilizer** - ₱520 per 25kg sack
4. **Potassium Fertilizer** - ₱480 per 25kg sack
5. **Urea Fertilizer (46%)** - ₱380 per 25kg sack
6. **Micronutrient Mix** - ₱650 per 1L bottle

## 🔧 Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 📝 Notes
- This website uses localStorage for cart functionality (no database required for basic operation)
- Forms currently display alerts; for full functionality, implement email sending via PHP mailer
- All prices are in Philippine Pesos (₱)
- Operating hours: Monday - Sunday, 7 AM - 6 PM

## 🆘 Troubleshooting

### Images not showing
- Verify image files (logo.png, banner.png) are in the `website/images/` folder
- Check file permissions

### Language switch not working
- Clear browser cookies/cache
- Ensure PHP sessions are enabled on your server

### Forms not submitting
- Check browser console for errors
- Ensure JavaScript is enabled
- Implement backend email sending functionality

## 📞 Support
For issues or questions, contact: arcangelguillermo1007@gmail.com

---
**Version:** 1.0
**Last Updated:** 2026
**Created for:** Agri-Victorious Trading Corporation
