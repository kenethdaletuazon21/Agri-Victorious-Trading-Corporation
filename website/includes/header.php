<?php
include '../config.php';

// Translation strings
$translations = array(
    'tl' => array(
        'home' => 'Tahanan',
        'about' => 'Tungkol sa Amin',
        'products' => 'Mga Produkto',
        'resources' => 'Mga Mapagkukunan',
        'contact' => 'Makipag-ugnayan',
        'language' => 'Wika',
        'tagalog' => 'Tagalog',
        'english' => 'English',
    ),
    'en' => array(
        'home' => 'Home',
        'about' => 'About Us',
        'products' => 'Products',
        'resources' => 'Resources',
        'contact' => 'Contact',
        'language' => 'Language',
        'tagalog' => 'Tagalog',
        'english' => 'English',
    )
);

$lang = isset($_SESSION['language']) ? $_SESSION['language'] : 'tl';
$t = $translations[$lang];

// Handle language switch
if (isset($_GET['lang'])) {
    $_SESSION['language'] = $_GET['lang'];
    header("Refresh:0");
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo COMPANY_NAME; ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo.png">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-container">
                <div class="logo-section">
                    <img src="../images/logo.png" alt="Logo" class="logo">
                </div>
                <ul class="nav-menu">
                    <li><a href="../index.php"><?php echo $t['home']; ?></a></li>
                    <li><a href="about.php"><?php echo $t['about']; ?></a></li>
                    <li><a href="products.php"><?php echo $t['products']; ?></a></li>
                    <li><a href="resources.php"><?php echo $t['resources']; ?></a></li>
                    <li><a href="contact.php"><?php echo $t['contact']; ?></a></li>
                    <li class="language-switch">
                        <?php if ($lang == 'tl'): ?>
                            <a href="?lang=en"><?php echo $t['english']; ?></a>
                        <?php else: ?>
                            <a href="?lang=tl"><?php echo $t['tagalog']; ?></a>
                        <?php endif; ?>
                    </li>
                </ul>
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>
    <main>
