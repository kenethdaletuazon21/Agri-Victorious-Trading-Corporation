<?php include '../includes/header.php'; ?>

    <section class="about-section">
        <h1><?php echo ($lang == 'tl') ? 'Makipag-ugnayan sa Amin' : 'Contact Us'; ?></h1>
        <p><?php echo ($lang == 'tl') ? 'Mayroon kaming mga katanungan o gustong makakuha ng mas maraming impormasyon? Makipag-ugnayan sa amin ngayon!' : 'Have questions or want more information? Contact us now!'; ?></p>
    </section>

    <section class="contact-info">
        <div class="contact-card">
            <h3>📞 <?php echo ($lang == 'tl') ? 'Tawagan Kami' : 'Call Us'; ?></h3>
            <p><strong><?php echo COMPANY_PHONE_1; ?></strong></p>
            <p><strong><?php echo COMPANY_PHONE_2; ?></strong></p>
            <p style="font-size: 0.85rem; margin-top: 1rem;"><?php echo ($lang == 'tl') ? 'Available: Monday - Sunday, 7 AM - 6 PM' : 'Available: Monday - Sunday, 7 AM - 6 PM'; ?></p>
        </div>

        <div class="contact-card">
            <h3>📧 <?php echo ($lang == 'tl') ? 'Email Kami' : 'Email Us'; ?></h3>
            <p><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a></p>
            <p style="font-size: 0.85rem; margin-top: 1rem;"><?php echo ($lang == 'tl') ? 'Sasagot kami sa loob ng 24 oras' : 'We respond within 24 hours'; ?></p>
        </div>

        <div class="contact-card">
            <h3>📍 <?php echo ($lang == 'tl') ? 'Bisitahin Kami' : 'Visit Us'; ?></h3>
            <p><?php echo ($lang == 'tl') ? 'Office 1:' : 'Office 1:'; ?><br><?php echo COMPANY_ADDRESS_1; ?></p>
            <p style="margin-top: 1rem;"><?php echo ($lang == 'tl') ? 'Office 2:' : 'Office 2:'; ?><br><?php echo COMPANY_ADDRESS_2; ?></p>
        </div>
    </section>

    <section>
        <form class="contact-form" onsubmit="submitContactForm(event)" method="POST">
            <h2><?php echo ($lang == 'tl') ? 'Ipadala ang Mensahe' : 'Send a Message'; ?></h2>
            
            <div class="form-group">
                <label for="name"><?php echo ($lang == 'tl') ? 'Pangalan *' : 'Name *'; ?></label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email"><?php echo ($lang == 'tl') ? 'Email *' : 'Email *'; ?></label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone"><?php echo ($lang == 'tl') ? 'Numero ng Telepono' : 'Phone Number'; ?></label>
                <input type="tel" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label for="subject"><?php echo ($lang == 'tl') ? 'Paksa' : 'Subject'; ?></label>
                <input type="text" id="subject" name="subject">
            </div>

            <div class="form-group">
                <label for="message"><?php echo ($lang == 'tl') ? 'Mensahe *' : 'Message *'; ?></label>
                <textarea id="message" name="message" required></textarea>
            </div>

            <button type="submit" class="submit-button"><?php echo ($lang == 'tl') ? 'Ipadala ang Mensahe' : 'Send Message'; ?></button>
        </form>
    </section>

    <section class="about-section">
        <h2><?php echo ($lang == 'tl') ? 'Madalas na Tanong (FAQ)' : 'Frequently Asked Questions (FAQ)'; ?></h2>
        
        <div style="margin-top: 2rem;">
            <h3 style="color: #2c5f2d;"><?php echo ($lang == 'tl') ? 'Ano ang mga oras ng operation?' : 'What are the operating hours?'; ?></h3>
            <p><?php echo ($lang == 'tl') ? 'Bukas kami mula Monday hanggang Sunday, 7 AM hanggang 6 PM.' : 'We are open from Monday to Sunday, 7 AM to 6 PM.'; ?></p>
        </div>

        <div style="margin-top: 2rem;">
            <h3 style="color: #2c5f2d;"><?php echo ($lang == 'tl') ? 'Mga naghahatid ba kayo ng bulk orders?' : 'Do you deliver bulk orders?'; ?></h3>
            <p><?php echo ($lang == 'tl') ? 'Oo, nag-deliver kami ng bulk orders sa Metro Manila at nearby provinces. Makipag-ugnayan sa amin para sa delivery details.' : 'Yes, we deliver bulk orders to Metro Manila and nearby provinces. Contact us for delivery details.'; ?></p>
        </div>

        <div style="margin-top: 2rem;">
            <h3 style="color: #2c5f2d;"><?php echo ($lang == 'tl') ? 'Garantisado ba ang kalidad ng produkto?' : 'Is the product quality guaranteed?'; ?></h3>
            <p><?php echo ($lang == 'tl') ? 'Lahat ng aming produkto ay dumaan sa mahigpit na quality control. Guaranteed ang kalidad.' : 'All our products have undergone rigorous quality control. Quality is guaranteed.'; ?></p>
        </div>

        <div style="margin-top: 2rem;">
            <h3 style="color: #2c5f2d;"><?php echo ($lang == 'tl') ? 'Ano ang payment methods?' : 'What are the payment methods?'; ?></h3>
            <p><?php echo ($lang == 'tl') ? 'Tumatanggap kami ng cash, bank transfer, at credit card. Makipag-ugnayan para sa iba pang payment options.' : 'We accept cash, bank transfer, and credit card. Contact us for other payment options.'; ?></p>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
