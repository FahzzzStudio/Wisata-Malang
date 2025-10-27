<?php require_once __DIR__ . '/../config/config.php'; ?>
<!-- <link rel="stylesheet" href="../../assets/admin/style.css?v=<?= time() ?>"> -->
<link rel="stylesheet" href="../assets/admin/style.css?v=<?= time() ?>">
<!-- <link rel="stylesheet" href="../../../../assets/admin/style.css?v=<?= time() ?>"> -->

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
                <a href="<?= ADMIN_URL ?>index.php" class="menu-item">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= ADMIN_URL ?>wisata/index.php" class="menu-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Kelola Wisata</span>
                </a>
            </li>
            <li>
                <a href="<?= ADMIN_URL ?>kelola_users/index.php" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>Kelola Pengguna</span>
                </a>
            </li>
            <li>
                <a href="<?= ADMIN_URL ?>kelola_admin/index.php" class="menu-item">
                    <i class="fas fa-user-shield"></i>
                    <span>Kelola Admin</span>
                </a>
            </li>

            <li class="menu-divider"></li>

            <li>
                <a href="<?= ADMIN_URL ?>logout.php" class="menu-item">
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