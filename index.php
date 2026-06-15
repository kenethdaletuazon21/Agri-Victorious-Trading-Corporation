<?php include 'includes/header.php'; ?>

    <div class="banner">
        <img src="images/banner.png" alt="Banner">
        <div class="banner-overlay">
            <h1><?php echo ($lang == 'tl') ? 'Agri-Victorious Trading Corporation' : 'Agri-Victorious Trading Corporation'; ?></h1>
            <p><?php echo ($lang == 'tl') ? 'Ang Pinakamahusay na Kalidad ng Pataba' : 'The Finest Quality of Fertilizers'; ?></p>
        </div>
    </div>

    <section class="hero">
        <h1><?php echo ($lang == 'tl') ? 'Maligtas na Malago, Mataas na Ani' : 'Safe Growth, High Harvest'; ?></h1>
        <p><?php echo ($lang == 'tl') ? 'Nangunguna sa industriya ng pataba at agrikultura sa loob ng maraming taon.' : 'Leading the fertilizer and agriculture industry for many years.'; ?></p>
        <a href="pages/products.php" class="cta-button"><?php echo ($lang == 'tl') ? 'Tingnan ang Mga Produkto' : 'View Products'; ?></a>
    </section>

    <section class="about-section">
        <h2><?php echo ($lang == 'tl') ? 'Tungkol sa Amin' : 'About Us'; ?></h2>
        <p><?php echo ($lang == 'tl') ? 'Ang Agri-Victorious Trading Corporation ay isa sa mga pinagkakatiwalaang supplier ng de-kalidad na pataba at agricultural products sa buong bansa. Nakatuon kami sa pagbibigay ng pinakamahusay na serbisyo at produkto sa aming mga valued customers.' : 'Agri-Victorious Trading Corporation is one of the trusted suppliers of quality fertilizers and agricultural products throughout the country. We are committed to providing the best service and products to our valued customers.'; ?></p>
        <p><?php echo ($lang == 'tl') ? 'Sa loob ng dalawang dekada, naging bahagi kami ng paglaki ng agriculture sector sa Pilipinas, na tumutulong sa mga magsasaka at farmers na makakuha ng mas mataas na ani at mas magandang kalidad ng produkto.' : 'For two decades, we have been part of the growth of the agriculture sector in the Philippines, helping farmers and agriculturalists achieve higher yields and better quality products.'; ?></p>
    </section>

    <section class="product-grid">
        <div class="product-card">
            <div class="product-image">🌱</div>
            <div class="product-content">
                <h3><?php echo ($lang == 'tl') ? 'Organic na Pataba' : 'Organic Fertilizers'; ?></h3>
                <p class="english-name"><i>Organic Fertilizers</i></p>
                <p><?php echo ($lang == 'tl') ? 'Walang kemikalang pantayan para sa sustainable farming' : 'Chemical-free excellence for sustainable farming'; ?></p>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">⚗️</div>
            <div class="product-content">
                <h3><?php echo ($lang == 'tl') ? 'Chemical Fertilizers' : 'Chemical Fertilizers'; ?></h3>
                <p class="english-name"><i>Chemical Fertilizers</i></p>
                <p><?php echo ($lang == 'tl') ? 'Mataas na kalidad at tested para sa mabuting resulta' : 'High quality and tested for excellent results'; ?></p>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">🌾</div>
            <div class="product-content">
                <h3><?php echo ($lang == 'tl') ? 'Specialty Products' : 'Specialty Products'; ?></h3>
                <p class="english-name"><i>Specialty Products</i></p>
                <p><?php echo ($lang == 'tl') ? 'Specialized na pataba para sa iba't ibang pangangailangan' : 'Specialized fertilizers for different needs'; ?></p>
            </div>
        </div>
    </section>

    <section class="contact-info">
        <div class="contact-card">
            <h3>📞 <?php echo ($lang == 'tl') ? 'Tawagan Kami' : 'Call Us'; ?></h3>
            <p><?php echo COMPANY_PHONE_1; ?></p>
            <p><?php echo COMPANY_PHONE_2; ?></p>
        </div>

        <div class="contact-card">
            <h3>📧 <?php echo ($lang == 'tl') ? 'Email Kami' : 'Email Us'; ?></h3>
            <p><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a></p>
            <p><?php echo ($lang == 'tl') ? 'Mabilis na sumagot' : 'Quick response'; ?></p>
        </div>

        <div class="contact-card">
            <h3>📍 <?php echo ($lang == 'tl') ? 'Lokasyon' : 'Location'; ?></h3>
            <p><?php echo COMPANY_ADDRESS_1; ?></p>
            <p><?php echo COMPANY_ADDRESS_2; ?></p>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
