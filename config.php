<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agri_victorious');

// Company Information
define('COMPANY_NAME', 'Agri-Victorious Trading Corporation');
define('COMPANY_EMAIL', 'arcangelguillermo1007@gmail.com');
define('COMPANY_PHONE_1', '+639171792888');
define('COMPANY_PHONE_2', '+639055012888');
define('COMPANY_ADDRESS_1', 'South Triangle Diliman, Diliman Quezon City');
define('COMPANY_ADDRESS_2', 'Tuguegarao City, Cagayan, Region 2, Cagayan Valley');

// Session start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Set language default to Tagalog
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'tl';
}
?>
