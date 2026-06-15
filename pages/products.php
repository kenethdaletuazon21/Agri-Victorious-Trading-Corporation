<?php 
include '../includes/header.php';
include '../includes/products-data.php';
?>

    <section class="about-section">
        <h1><?php echo ($lang == 'tl') ? 'Aming Mga Produkto' : 'Our Products'; ?></h1>
        <p><?php echo ($lang == 'tl') ? 'Tuklasin ang aming malawak na hanay ng de-kalidad na pataba at agricultural products.' : 'Discover our wide range of quality fertilizers and agricultural products.'; ?></p>
    </section>

    <div class="product-grid">
        <?php foreach ($products as $product): ?>
        <div class="product-card" data-category="<?php echo $product['id']; ?>">
            <div class="product-image">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name_en']; ?>" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="product-content">
                <h3><?php echo ($lang == 'tl') ? $product['name_tl'] : $product['name_en']; ?></h3>
                <p class="english-name"><i><?php echo $product['name_en']; ?></i></p>
                <p><?php echo ($lang == 'tl') ? $product['description_tl'] : $product['description_en']; ?></p>
                <div class="product-unit">
                    <?php echo ($lang == 'tl') ? 'Dami' : 'Quantity'; ?>: <?php echo $product['quantity']; ?> | 
                    <?php echo ($lang == 'tl') ? 'Yunit' : 'Unit'; ?>: <?php echo ($lang == 'tl') ? explode(' / ', $product['unit'])[0] : explode(' / ', $product['unit'])[1]; ?>
                </div>
                <div class="product-quote">
                    <p class="quote-text"><?php echo ($lang == 'tl') ? '📞 Makipag-ugnawan para sa bulk quotation' : '📞 Contact us for bulk quotations'; ?></p>
                </div>
                <button class="contact-btn" onclick="window.location.href='contact.php'">
                    <?php echo ($lang == 'tl') ? 'Makipag-ugnawan para sa Quotation' : 'Contact us for Quotation'; ?>
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <section class="about-section" style="margin-top: 3rem;">
        <h2><?php echo ($lang == 'tl') ? 'Aming Garantiya' : 'Our Guarantee'; ?></h2>
        <p><?php echo ($lang == 'tl') ? 'Lahat ng aming mga produkto ay dumaan sa mahigpit na quality control at testing upang masiguro ang pinakamataas na pamantayan.' : 'All our products undergo rigorous quality control and testing to ensure the highest standards.'; ?></p>
    </section>

<?php include '../includes/footer.php'; ?>
