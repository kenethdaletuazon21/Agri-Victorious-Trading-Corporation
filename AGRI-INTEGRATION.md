# Integration with AGRI.docx

## 📄 About AGRI.docx Integration

The AGRI.docx file contains detailed agricultural information that can be integrated into the website's Resources section.

## 📝 How to Integrate Content from AGRI.docx

### Step 1: Extract Content from AGRI.docx
- Open AGRI.docx in Microsoft Word or LibreOffice
- Copy the fertilizer applications and agricultural information
- Note the Tagalog content and English translations

### Step 2: Update Resources Page
Edit `pages/resources.php` and add content following this format:

```php
<div class="resource-item">
    <h3><?php echo ($lang == 'tl') ? 'Tagalog Title' : 'English Title'; ?></h3>
    <p class="english-label"><i>English Title</i></p>
    <p><?php echo ($lang == 'tl') ? 'Tagalog content here...' : 'English content here...'; ?></p>
    <ul class="resource-list">
        <li><?php echo ($lang == 'tl') ? 'Tagalog bullet point' : 'English bullet point'; ?></li>
    </ul>
</div>
```

### Step 3: Update Products Data
Edit `includes/products-data.php` and add or update products from AGRI.docx:

```php
array(
    'id' => 1,
    'name_tl' => 'Tagalog Product Name',
    'name_en' => 'English Product Name',
    'description_tl' => 'Tagalog description',
    'description_en' => 'English description',
    'price' => 450,
    'unit' => 'Tagalog unit / English unit',
    'quantity' => '25kg'
),
```

## 📚 Current Integration Status

### Already Included from AGRI.docx
- ✅ Fertilizer applications by crop type (Leafy vegetables, Flowers/Fruits, Cereals, Root crops)
- ✅ Organic compost application guidelines
- ✅ Micronutrient information
- ✅ Usage tips and safety precautions
- ✅ Monitoring and adjustment guidelines

### Placeholder Content Available
- Resource applications for various fertilizer types
- Soil preparation and maintenance guidelines
- Seasonal fertilizer applications

## 🔄 Updating the Website

### To Add New Content
1. Extract information from AGRI.docx
2. Translate to Tagalog and English (if needed)
3. Update the appropriate PHP file
4. Test the website to ensure everything displays correctly

### Files to Modify
- `pages/resources.php` - For agricultural applications and guidelines
- `includes/products-data.php` - For product information
- `pages/about.php` - For company history and information
- `pages/products.php` - For product descriptions

## 💡 Best Practices

1. **Consistency**: Maintain the same format for all entries (Tagalog + English)
2. **Clarity**: Use clear, simple language in both languages
3. **Organization**: Group related information together
4. **Formatting**: Use bullet points for lists and clear headings
5. **Italics**: Always italicize English translations after Tagalog text

## 🌐 Content Organization

The website uses this structure for content:
- **Home Page**: Company introduction and quick links
- **About Page**: Mission, vision, history, and why choose us
- **Products Page**: Product catalog with details and pricing
- **Resources Page**: Agricultural applications and best practices
- **Contact Page**: Contact information and support

## 📊 Recommended Content Updates

Based on typical agricultural companies and the AGRI.docx integration:

1. **Product Catalog**: 6-10 different fertilizer types
2. **Application Guides**: By crop type and growth stage
3. **Safety Guidelines**: Handling and storage information
4. **FAQ Section**: Common questions about products and applications
5. **Seasonal Guides**: Recommendations for different seasons

## 🔗 Content Hierarchy

```
Homepage
├── About Section (Company info)
├── Product Categories (Quick overview)
└── Featured Products

About Page
├── Mission & Vision
├── Company History
└── Why Choose Us

Products Page
├── Complete Product Catalog
└── Product Details

Resources Page
├── Fertilizer Applications
├── Usage Guidelines
├── Safety Tips
└── Monitoring Advice

Contact Page
├── Contact Information
├── Contact Form
└── FAQ
```

## 📞 Support for Integration

For help integrating AGRI.docx content:
- Ensure consistent Tagalog/English translations
- Follow the established HTML structure
- Test all pages after updates
- Check responsive design on mobile devices

---
**Note**: All content from AGRI.docx should be added following the bilingual format (Tagalog with English translations in italics) as established in the current website design.
