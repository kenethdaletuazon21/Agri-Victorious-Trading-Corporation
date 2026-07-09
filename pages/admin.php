<?php
require_once dirname(__DIR__) . '/includes/admin-auth.php';
require_once dirname(__DIR__) . '/includes/gallery-store.php';

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'login') {
        $username = trim($_POST['username'] ?? '');
        $password = (string) ($_POST['password'] ?? '');

        if (admin_login($username, $password)) {
            $message = 'Admin login successful.';
            $messageType = 'success';
        } else {
            $message = 'Invalid admin username or password.';
            $messageType = 'error';
        }
    }

    if ($action === 'logout') {
        admin_logout();
        $message = 'You have been logged out.';
        $messageType = 'success';
    }

    if ($action === 'upload') {
        if (!is_admin_authenticated()) {
            $message = 'Please log in as admin to upload photos.';
            $messageType = 'error';
        } else {
            [$success, $uploadMessage] = upload_gallery_image(
                $_FILES['gallery_photo'] ?? [],
                trim($_POST['title'] ?? ''),
                trim($_POST['description'] ?? '')
            );

            $message = $uploadMessage;
            $messageType = $success ? 'success' : 'error';
        }
    }
}

$isAdmin = is_admin_authenticated();
$galleryItems = load_gallery_items();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Agri-Victorious Trading Corporation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo1.png">
</head>
<body class="admin-page">
    <header>
        <nav class="navbar">
            <div class="nav-container">
                <div class="logo-section">
                    <img src="../images/logo1.png" alt="Logo" class="logo">
                </div>
                <ul class="nav-menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/products">Products</a></li>
                    <li><a href="/resources">Resources</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li class="admin-nav-item<?php echo $isAdmin ? '' : ' hidden'; ?>"><a href="/admin">Admin</a></li>
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
        <section class="admin-panel">
            <div class="admin-card">
                <h1>Admin Panel</h1>
                <p>Only the admin can access gallery uploads. Use this page to log in and publish new photos to the public Resources gallery.</p>
                <?php if ($message !== ''): ?>
                    <div class="status-message <?php echo htmlspecialchars($messageType, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!$isAdmin): ?>
                <section class="admin-card">
                    <h2>Admin Login</h2>
                    <form class="admin-form" method="POST" action="/admin">
                        <input type="hidden" name="action" value="login">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="submit-button">Log In</button>
                    </form>
                </section>
            <?php else: ?>
                <section class="admin-card">
                    <div class="admin-toolbar">
                        <div>
                            <h2>Gallery Manager</h2>
                            <p>Upload images here and they will appear automatically in the Resources gallery for site visitors.</p>
                        </div>
                        <form method="POST" action="/admin">
                            <input type="hidden" name="action" value="logout">
                            <button type="submit" class="submit-button">Log Out</button>
                        </form>
                    </div>

                    <div class="admin-actions">
                        <form class="admin-form" method="POST" action="/admin" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="upload">
                            <div class="form-group">
                                <label for="title">Photo Title</label>
                                <input type="text" id="title" name="title" placeholder="Example: Field demonstration day" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" placeholder="Short caption shown below the photo"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gallery_photo">Photo File</label>
                                <input type="file" id="gallery_photo" name="gallery_photo" accept=".jpg,.jpeg,.png,.webp,.gif" required>
                            </div>
                            <button type="submit" class="submit-button">Upload Photo</button>
                        </form>

                        <div class="admin-card">
                            <h2>Upload Guidelines</h2>
                            <ul class="upload-guidelines">
                                <li>Accepted formats: JPG, JPEG, PNG, WEBP, and GIF.</li>
                                <li>Maximum file size: 5 MB per photo.</li>
                                <li>Uploaded photos appear publicly on the Resources page gallery.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="admin-card">
                    <h2>Current Gallery Photos</h2>
                    <?php if (count($galleryItems) === 0): ?>
                        <p class="gallery-empty">No gallery photos have been uploaded yet.</p>
                    <?php else: ?>
                        <div class="gallery-grid">
                            <?php foreach ($galleryItems as $item): ?>
                                <figure class="gallery-card">
                                    <img src="../<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($item['title'] ?? 'Gallery image', ENT_QUOTES, 'UTF-8'); ?>">
                                    <figcaption>
                                        <strong><?php echo htmlspecialchars($item['title'] ?? 'Gallery Photo', ENT_QUOTES, 'UTF-8'); ?></strong>
                                        <span><?php echo htmlspecialchars($item['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                                        <?php if (!empty($item['uploadedAt'])): ?>
                                            <span class="gallery-meta">Uploaded: <?php echo htmlspecialchars(date('F j, Y g:i A', strtotime($item['uploadedAt'])), ENT_QUOTES, 'UTF-8'); ?></span>
                                        <?php endif; ?>
                                    </figcaption>
                                </figure>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Agri-Victorious Trading Corporation</h3>
                <p>Leading in Fertilizer and Agriculture Industry</p>
            </div>
            <div class="footer-section">
                <h4>Contact Us</h4>
                <p>+639171792888</p>
                <p>+639178297245</p>
                <p>arcangelguillermo1007@gmail.com</p>
                <p>agrivictorious@gmail.com</p>
            </div>
            <div class="footer-section">
                <h4>Location</h4>
                <p>South Triangle Diliman, Diliman Quezon City, NCR</p>
                <p>Dugo-San Vicente National Rd., Brgy. Afunan-Cabayu, Camalaniugan, Cagayan, Region 2</p>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#" class="social-icon">Facebook</a>
                    <a href="#" class="social-icon">Twitter</a>
                    <a href="#" class="social-icon">Instagram</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Agri-Victorious Trading Corporation. All rights reserved.</p>
        </div>
    </footer>
    <script src="../js/script.js"></script>
</body>
</html>