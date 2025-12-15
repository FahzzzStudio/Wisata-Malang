<?php
require_once '../../config/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hapus semua session
$_SESSION = [];
session_destroy();

// Redirect ke beranda (versi belum login)
header("Location: " . BASE_URL . "pages/index.php");
exit;
