<?php
require_once dirname(__DIR__) . '/config.php';

function is_admin_authenticated(): bool
{
    return !empty($_SESSION['is_admin']);
}

function admin_login(string $username, string $password): bool
{
    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        $_SESSION['is_admin'] = true;
        $_SESSION['admin_username'] = ADMIN_USERNAME;
        return true;
    }

    return false;
}

function admin_logout(): void
{
    unset($_SESSION['is_admin'], $_SESSION['admin_username']);
}

function require_admin(): void
{
    if (!is_admin_authenticated()) {
        http_response_code(403);
        exit('Access denied.');
    }
}
