<?php
require_once __DIR__ . '/gallery-store.php';

header('Content-Type: application/json');
echo json_encode(load_gallery_items());
