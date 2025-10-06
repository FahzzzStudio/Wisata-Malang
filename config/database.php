<?php
// File: config/database.php
// Fungsi: Koneksi ke database MySQL
$base_url = "http://localhost/app_wisata_malang/";

// Konfigurasi database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'wisata_malang');

// Fungsi untuk membuat koneksi database
function buatKoneksi() {
    $koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Cek apakah koneksi berhasil
    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
    
    // Set charset ke utf8mb4 untuk support emoji dan karakter khusus
    mysqli_set_charset($koneksi, "utf8mb4");
    
    return $koneksi;
}

// Fungsi untuk menutup koneksi database
function tutupKoneksi($koneksi) {
    if ($koneksi) {
        mysqli_close($koneksi);
    }
}

// Buat koneksi global (opsional, bisa dipanggil di setiap file)
$db = buatKoneksi();
?>
