<?php
// File: includes/sidebar_admin.php
// Fungsi: Sidebar navigasi admin

// Ambil halaman aktif
$currentPage = basename($_SERVER['PHP_SELF']);
$currentDir = basename(dirname($_SERVER['PHP_SELF']));
?>

<link rel="stylesheet" href="<?php 
    // Tentukan path CSS berdasarkan kedalaman folder
    $depth = substr_count($_SERVER['PHP_SELF'], '/') - substr_count(__DIR__, '/');
    echo str_repeat('../', $depth) . 'assets/admin/style2.css';
?>?v=<?= time() ?>">

<aside class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <h2>Malang</h2>
            <p>Admin Panel</p>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo (strpos($_SERVER['PHP_SELF'], 'pages/admin/index.php') !== false) ? '#' : '../../index.php'; ?>" 
                    class="menu-item <?php echo (strpos($_SERVER['PHP_SELF'], 'pages/admin/index.php') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="<?php echo (strpos($_SERVER['PHP_SELF'], 'wisata') !== false) ? '#' : '../wisata/index.php'; ?>" 
                    class="menu-item <?php echo (strpos($_SERVER['PHP_SELF'], 'wisata') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Kelola Wisata</span>
                </a>
            </li>

            <li>
                <a href="<?php echo (strpos($_SERVER['PHP_SELF'], 'kelola_users') !== false) ? '#' : '../kelola_users/index.php'; ?>" 
                    class="menu-item <?php echo (strpos($_SERVER['PHP_SELF'], 'kelola_users') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-users"></i>
                    <span>Kelola Pengguna</span>
                </a>
            </li>

            <li>
                <a href="<?php echo (strpos($_SERVER['PHP_SELF'], 'kelola_admin') !== false) ? '#' : '../kelola_admin/index.php'; ?>" 
                    class="menu-item <?php echo (strpos($_SERVER['PHP_SELF'], 'kelola_admin') !== false) ? 'active' : ''; ?>">
                    <i class="fas fa-user-shield"></i>
                    <span>Kelola Admin</span>
                </a>
            </li>

            <li class="menu-divider"></li>

            <li>
                <a href="../logout.php" class="menu-item menu-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <p>© 2025 Wisata Malang</p>
    </div>
</aside>
