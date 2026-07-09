<?php
require_once dirname(__DIR__) . '/config.php';

const GALLERY_DATA_FILE = __DIR__ . '/../data/gallery.json';
const GALLERY_UPLOAD_DIR = __DIR__ . '/../images/gallery/';
const GALLERY_PUBLIC_PATH = 'images/gallery/';

function load_gallery_items(): array
{
    if (!file_exists(GALLERY_DATA_FILE)) {
        return [];
    }

    $contents = file_get_contents(GALLERY_DATA_FILE);
    if ($contents === false || trim($contents) === '') {
        return [];
    }

    $decoded = json_decode($contents, true);
    return is_array($decoded) ? $decoded : [];
}

function save_gallery_items(array $items): bool
{
    $json = json_encode(array_values($items), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    if ($json === false) {
        return false;
    }

    return file_put_contents(GALLERY_DATA_FILE, $json . PHP_EOL) !== false;
}

function upload_gallery_image(array $file, string $title, string $description): array
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return [false, 'Please choose an image to upload.'];
    }

    if (($file['size'] ?? 0) > 5 * 1024 * 1024) {
        return [false, 'Image must be 5 MB or smaller.'];
    }

    $extension = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    if (!in_array($extension, $allowedExtensions, true)) {
        return [false, 'Only JPG, JPEG, PNG, WEBP, and GIF files are allowed.'];
    }

    $imageInfo = @getimagesize($file['tmp_name']);
    if ($imageInfo === false) {
        return [false, 'The uploaded file is not a valid image.'];
    }

    if (!is_dir(GALLERY_UPLOAD_DIR) && !mkdir(GALLERY_UPLOAD_DIR, 0775, true) && !is_dir(GALLERY_UPLOAD_DIR)) {
        return [false, 'Unable to prepare the gallery upload directory.'];
    }

    $safeName = preg_replace('/[^a-z0-9_-]+/i', '-', pathinfo($file['name'], PATHINFO_FILENAME));
    $safeName = trim((string) $safeName, '-');
    $filename = ($safeName !== '' ? $safeName : 'gallery-image') . '-' . date('YmdHis') . '.' . $extension;
    $targetPath = GALLERY_UPLOAD_DIR . $filename;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        return [false, 'Unable to save the uploaded image.'];
    }

    $items = load_gallery_items();
    array_unshift($items, [
        'title' => trim($title) !== '' ? trim($title) : 'Gallery Photo',
        'description' => trim($description),
        'image' => GALLERY_PUBLIC_PATH . $filename,
        'uploadedAt' => date('c')
    ]);

    if (!save_gallery_items($items)) {
        @unlink($targetPath);
        return [false, 'Image was uploaded but the gallery record could not be saved.'];
    }

    return [true, 'Gallery image uploaded successfully.'];
}
