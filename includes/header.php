<?php
// Mulai session jika belum
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include functions
// require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/functions.php';

// Cek status login
$sudah_login = isset($_SESSION['user_id']);
$user_data = null;
if ($sudah_login) {
    $user_data = ambilUserById($db, $_SESSION['user_id']);
}

// Ambil halaman saat ini untuk active menu
$halaman_sekarang = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malang - Jelajahi Wisata Malang Raya</title>
    <meta name="description" content="Website informasi wisata Kota Malang - Temukan destinasi wisata terbaik di Malang Raya">
    
    <!-- CSS  -->
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/responsive.css">

    <!-- Font Poppnis Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome untuk icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navbar  -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <!-- Logo  -->
                <a href="../pages/index.php" class="logo">
                    <span class="logo-text">Malang</span>
                </a>
                
                <!-- Menu Toggle untuk Mobile  -->
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <!-- Navigation Menu  -->
                <div class="nav-menu" id="navMenu">
                    <ul class="nav-links">
                        <li><a href="../pages/index.php" class="<?php echo $halaman_sekarang == 'index' ? 'active' : ''; ?>">Beranda</a></li>
                        <li><a href="../pages/kategori.php" class="<?php echo $halaman_sekarang == 'kategori' ? 'active' : ''; ?>">Kategori</a></li>
                        <li><a href="../pages/tentang.php" class="<?php echo $halaman_sekarang == 'tentang' ? 'active' : ''; ?>">Tentang Kami</a></li>
                        <li><a href="../pages/kontak.php" class="<?php echo $halaman_sekarang == 'kontak' ? 'active' : ''; ?>">Kontak</a></li>
                    </ul>
                    
                    <!-- Auth Buttons  -->
                    <div class="nav-actions">
                        <?php if ($sudah_login): ?>
                            <a href="/pages/favorite.php" class="btn-icon" title="Wisata Favorite">
                                <i class="fas fa-heart"></i>
                            </a>
                            <a href="/pages/profile.php" class="btn-icon" title="Profile">
                                <i class="fas fa-user"></i>
                            </a>
                        <?php else: ?>
                            <a href="../pages/signin.php" class="btn btn-outline">Sign In</a>
                            <a href="../pages/signup.php" class="btn btn-primary">Sign Up</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
