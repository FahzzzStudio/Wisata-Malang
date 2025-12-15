<?php
// File: pages/admin/index.php
// Fungsi: Halaman dashboard admin - menampilkan overview statistik

// session_start();
require_once "../../config/database.php";
require_once "../../config/functions.php";

// Cek apakah admin sudah login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: login.php");
//     exit;
// }

// Ambil data statistik
$totalWisata = mysqli_num_rows(mysqli_query($db, "SELECT id FROM wisata"));
$totalUsers = mysqli_num_rows(mysqli_query($db, "SELECT id FROM users"));
$totalAdmin = mysqli_num_rows(mysqli_query($db, "SELECT id FROM admin"));
$totalFavorite = mysqli_num_rows(mysqli_query($db, "SELECT id FROM favorites"));

// Ambil wisata terbaru
$wisataTerbaru = mysqli_query($db, "SELECT * FROM wisata ORDER BY id DESC LIMIT 5");

// Ambil kategori wisata
$kategoriResult = mysqli_query($db, "SELECT DISTINCT kategori FROM wisata");
$kategori = [];
while ($row = mysqli_fetch_assoc($kategoriResult)) {
    $kategori[] = $row['kategori'];
}

// Ambil admin info
$adminInfo = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM admin WHERE id"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Wisata Malang</title>
    <link rel="stylesheet" href="../../assets/admin/style2.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar  -->
        <?php include "../../includes/sidebar_admin.php"; ?>

        <!-- Main Content  -->
        <div class="main-content">
            <!-- Top Bar  -->
            <div class="top-bar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari destinasi wisata...">
                </div>
                <div class="top-bar-right">
                    <div class="notification">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </div>
                    <div class="admin-profile">
                        <!-- <img src="../../public/placeholder-user.jpg" alt="Admin"> -->
                        <div class="profile-info">
                            <p class="profile-name"><?= htmlspecialchars($adminInfo['nama_lengkap']) ?></p>
                            <!-- <p class="profile-role">Administrator</p> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Header  -->
            <div class="page-header">
                <h1>Dashboard</h1>
                <!-- <p>Selamat datang kembali 👋</p> -->
                <p>Selamat datang kembali, <?= htmlspecialchars($adminInfo['nama_lengkap']) ?>! 👋</p>
            </div>

            <!-- Statistics Cards  -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(23, 162, 184, 0.1);">
                        <i class="fas fa-map-marker-alt" style="color: #17a2b8;"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Total Wisata</p>
                        <h3 class="stat-value"><?= $totalWisata ?></h3>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(40, 167, 69, 0.1);">
                        <i class="fas fa-users" style="color: #28a745;"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Total Pengguna</p>
                        <h3 class="stat-value"><?= $totalUsers ?></h3>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(255, 193, 7, 0.1);">
                        <i class="fas fa-heart" style="color: #ffc107;"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Total Favorit</p>
                        <h3 class="stat-value"><?= $totalFavorite ?></h3>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(108, 117, 125, 0.1);">
                        <i class="fas fa-user-shield" style="color: #6c757d;"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Total Admin</p>
                        <h3 class="stat-value"><?= $totalAdmin ?></h3>
                    </div>
                </div>
            </div>

            <!-- Content Grid  -->
            <div class="content-grid">
                <!-- Wisata Terbaru  -->
                <div class="card">
                    <div class="card-header">
                        <h2>Wisata Terbaru</h2>
                        <a href="wisata/index.php" class="link-more">Lihat Semua →</a>
                    </div>
                    <div class="card-body">
                        <div class="wisata-list">
                            <?php while ($wisata = mysqli_fetch_assoc($wisataTerbaru)) : ?>
                            <div class="wisata-item">
                                <img src="../../uploads/<?= htmlspecialchars($wisata['gambar']) ?>" alt="<?= htmlspecialchars($wisata['nama']) ?>">
                                <div class="wisata-info">
                                    <h4><?= htmlspecialchars($wisata['nama']) ?></h4>
                                    <p class="wisata-kategori">
                                        <i class="fas fa-tag"></i> <?= htmlspecialchars($wisata['kategori']) ?>
                                    </p>
                                    <p class="wisata-lokasi">
                                        <i class="fas fa-map-pin"></i> <?= htmlspecialchars($wisata['lokasi']) ?>
                                    </p>
                                </div>
                                <div class="wisata-rating">
                                    <i class="fas fa-star" style="color: #ffc107;"></i>
                                    <span><?= number_format($wisata['rating'], 1) ?></span>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>

                <!-- Kategori Wisata  -->
                <div class="card">
                    <div class="card-header">
                        <h2>Kategori Wisata</h2>
                    </div>
                    <div class="card-body">
                        <div class="kategori-list">
                            <?php foreach ($kategori as $kat) : 
                                $jumlah = mysqli_num_rows(mysqli_query($db, "SELECT id FROM wisata WHERE kategori = '$kat'"));
                            ?>
                            <div class="kategori-item">
                                <div class="kategori-icon">
                                    <?php if ($kat == 'Wisata Alam') : ?>
                                        <i class="fas fa-mountain"></i>
                                    <?php elseif ($kat == 'Wisata Buatan') : ?>
                                        <i class="fas fa-building"></i>
                                    <?php elseif ($kat == 'Wisata Budaya') : ?>
                                        <i class="fas fa-gopuram"></i>
                                    <?php else : ?>
                                        <i class="fas fa-landmark"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="kategori-info">
                                    <p class="kategori-name"><?= htmlspecialchars($kat) ?></p>
                                    <p class="kategori-count"><?= $jumlah ?> wisata</p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions  -->
            <div class="quick-actions">
                <h2>Aksi Cepat</h2>
                <div class="action-buttons">
                    <a href="wisata/tambah.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Wisata
                    </a>
                    <a href="wisata/index.php" class="btn btn-secondary">
                        <i class="fas fa-list"></i> Daftar Wisata
                    </a>
                    <a href="kelola_users/index.php" class="btn btn-secondary">
                        <i class="fas fa-users"></i> Kelola Pengguna
                    </a>
                    <a href="kelola_admin/index.php" class="btn btn-secondary">
                        <i class="fas fa-user-shield"></i> Kelola Admin
                    </a>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="../../assets/admin/script.js?v=<?= time() ?>"></script> -->
</body>
</html>
