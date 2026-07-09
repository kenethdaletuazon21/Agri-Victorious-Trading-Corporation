<?php
require_once __DIR__ . '/admin-auth.php';

header('Content-Type: application/json');
echo json_encode([
    'authenticated' => is_admin_authenticated()
]);
