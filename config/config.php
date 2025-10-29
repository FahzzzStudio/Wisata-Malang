<?php
// Konfigurasi dasar aplikasi
$base_url = "http://localhost/app_wisata_malang/";
define('BASE_URL', 'http://localhost/app_wisata_malang/');
define('ADMIN_URL', BASE_URL . "pages/admin/");

define('SITE_NAME', 'Malang');
define('SITE_DESCRIPTION', 'Malang adalah destinasi yang menawarkan semua jenis liburan, mulai dari petualangan alam, wisata buatan, hingga pengalaman budaya yang otentik.');

// Konfigurasi database (untuk pengembangan selanjutnya)
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'malang_tourism');

// Session configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper function untuk cek status login
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Helper function untuk mendapatkan data user
function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'] ?? null,
            'name' => $_SESSION['user_name'] ?? 'User',
            'email' => $_SESSION['user_email'] ?? '',
            'phone' => $_SESSION['user_phone'] ?? ''
        ];
    }
    return null;
}
?>
