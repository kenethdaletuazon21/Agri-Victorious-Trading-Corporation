# 🚀 Quick Start Guide - Agri-Victorious Website

## ⚡ 5-Minute Setup

### Step 1: Verify Files
Run the deployment check:
- **Windows**: Double-click `website/deploy.bat`
- **Mac/Linux**: Run `bash website/deploy.sh`

### Step 2: Add Images
Copy these files to `website/images/` folder:
- `logo.png` - Already in directory
- `banner.png` - Already in directory
- `products.png` - Optional, already in directory

### Step 3: Local Testing (XAMPP/WAMP)
```
1. Copy 'website' folder to:
   - XAMPP: C:\xampp\htdocs\
   - WAMP: C:\wamp\www\

2. Start Apache server

3. Open browser: http://localhost/website/
```

### Step 4: Features to Test
- [ ] Home page loads with banner
- [ ] Navigation menu works
- [ ] Language toggle (Tagalog/English) switches content
- [ ] Products page shows all 6 products
- [ ] Resources page with applications
- [ ] Contact form loads
- [ ] Mobile menu works (resize browser to mobile width)

## 🎯 Website Features

| Feature | Status | Description |
|---------|--------|-------------|
| Bilingual (Tagalog/English) | ✅ | Auto language toggle with session storage |
| Responsive Design | ✅ | Mobile, Tablet, Desktop optimized |
| Dynamic Products | ✅ | 6 sample products with pricing |
| Resources Guide | ✅ | Fertilizer applications & tips |
| Contact Form | ✅ | Ready for email integration |
| Shopping Cart | ✅ | localStorage-based (no database needed) |
| Professional Styling | ✅ | Green & Orange agricultural theme |
| Mobile Menu | ✅ | Hamburger menu for mobile devices |

## 📁 Project Structure Summary

```
website/
├── 📄 index.php (Home page)
├── 📄 config.php (Settings)
├── 📄 README.md (Full documentation)
├── 📄 AGRI-INTEGRATION.md (Integration guide)
├── 📄 deploy.bat (Windows check script)
├── 📄 deploy.sh (Mac/Linux check script)
├── 📁 css/
│   ├── style.css (Main styles - 700+ lines)
│   └── mobile-enhancements.css (Mobile optimizations)
├── 📁 js/
│   └── script.js (Interactivity)
├── 📁 includes/
│   ├── header.php (Navigation)
│   ├── footer.php (Footer)
│   ├── products-data.php (6 products)
│   └── email-handler.php (Email functionality)
├── 📁 pages/
│   ├── about.php (Company info)
│   ├── products.php (Product catalog)
│   ├── resources.php (Fertilizer apps)
│   └── contact.php (Contact + FAQ)
├── 📁 images/
│   ├── logo.png
│   ├── banner.png
│   └── products.png
└── 📄 database-setup.sql (Optional DB schema)
```

## 🎨 Customization Examples

### Change Company Colors
Edit `css/style.css` (Line 9-14):
```css
:root {
    --primary-color: #2c5f2d;    /* Green - Change this */
    --secondary-color: #f39c12;  /* Orange - Change this */
}
```

### Update Contact Info
Edit `config.php` (Lines 6-11):
```php
define('COMPANY_PHONE_1', '+639171792888');
define('COMPANY_EMAIL', 'arcangelguillermo1007@gmail.com');
define('COMPANY_ADDRESS_1', 'South Triangle Diliman...');
```

### Add More Products
Edit `includes/products-data.php`:
```php
array(
    'id' => 7,
    'name_tl' => 'New Product Name',
    'name_en' => 'New Product Name',
    'price' => 500,
    'quantity' => '25kg'
)
```

## 📱 Mobile Testing Checklist

| Test | How To Test |
|------|------------|
| Mobile Menu | Resize browser to < 768px, menu should toggle |
| Touch Friendly | All buttons should be easily clickable on mobile |
| Images Responsive | Images should resize with screen |
| Text Readable | No text should overlap on small screens |
| Forms Usable | Form inputs should be full width on mobile |

## 🌐 Language Configuration

The website uses **Tagalog as Primary Language**:

**Format**: 
```
[Tagalog Text] *italics*[English Translation]*end italics*
```

**Example**:
```
Tingnan ang Mga Produkto (*View Products*)
```

To change default language, edit `config.php`:
```php
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'en';  // Change from 'tl' to 'en'
}
```

## 🔧 Enable Email Functionality (Optional)

Edit `includes/email-handler.php` (Lines 7-10):
```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
define('SMTP_PASS', 'your-app-password');
```

Then update `pages/contact.php` contact form to use the email handler.

## 🆘 Troubleshooting

| Issue | Solution |
|-------|----------|
| Images not showing | Verify files are in `website/images/` folder |
| Language not switching | Clear browser cache and cookies |
| Contact form not working | Implement backend email handler or database |
| Mobile menu not appearing | Check CSS mobile-enhancements.css is loaded |
| Pages not loading | Ensure PHP 7.0+ is installed on server |

## 📊 Product Catalog

The website includes 6 sample products:
1. **NPK Fertilizer (10-10-10)** - ₱450
2. **Organic Compost** - ₱320
3. **Phosphate Fertilizer** - ₱520
4. **Potassium Fertilizer** - ₱480
5. **Urea Fertilizer (46%)** - ₱380
6. **Micronutrient Mix** - ₱650

All with bilingual names and descriptions!

## 🚀 Deployment to Production

### Using FTP/SFTP:
1. Connect to your server
2. Navigate to `public_html/` or `www/`
3. Upload all files from `website/` folder
4. Set permissions to 755 (directories) and 644 (files)
5. Verify images are in place

### Using cPanel:
1. Log in to cPanel
2. Open File Manager
3. Upload `website/` folder to `public_html/`
4. Test at: `yourdomain.com/website/`

### Using Command Line:
```bash
sftp user@yourdomain.com
cd public_html/
put -r website/
exit
```

## 💡 Tips & Best Practices

- **Backup**: Always backup your website before making major changes
- **Images**: Optimize images for faster loading (use PNG/JPEG compression)
- **Content**: Regularly update products and information
- **Testing**: Test all pages after updates, especially on mobile
- **Analytics**: Consider adding Google Analytics for visitor tracking
- **SEO**: Add meta descriptions to improve search visibility

## 📞 Support Information

**Company Details**:
- Email: arcangelguillermo1007@gmail.com
- Phone: +639171792888 & +639055012888
- Location 1: South Triangle Diliman, Diliman Quezon City
- Location 2: Tuguegarao City, Cagayan, Region 2, Cagayan Valley

## ✅ Final Checklist Before Going Live

- [ ] All files uploaded to server
- [ ] Images (logo.png, banner.png) copied to images/ folder
- [ ] PHP 7.0+ installed on server
- [ ] Website tested on desktop browsers
- [ ] Website tested on mobile devices
- [ ] Language toggle working correctly
- [ ] Contact form tested
- [ ] Links to all pages working
- [ ] Email notifications configured (optional)
- [ ] Analytics tracking set up (optional)

---

**Need Help?** Contact: arcangelguillermo1007@gmail.com

**Version**: 1.0 | **Year**: 2026
