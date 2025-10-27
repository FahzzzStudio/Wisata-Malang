<?php
// File: pages/admin/kelola_admin/index.php
// Fungsi: Halaman daftar admin

session_start();
require_once "../../../config/database.php";
require_once "../../../config/functions.php";

// Cek login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: ../login.php");
//     exit;
// }

$admin_id = $_SESSION['admin_id'] ?? 0;

// Proses hapus
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    // Jangan hapus admin yang sedang login
    if ($id != $_SESSION['admin_id']) {
        mysqli_query($db, "DELETE FROM admin WHERE id = $id");
        header("Location: index.php?status=terhapus");
        exit;
    }
}

// Ambil data admin
$result = mysqli_query($db, "SELECT * FROM admin ORDER BY created_at DESC");
$admins = [];
while ($row = mysqli_fetch_assoc($result)) {
    $admins[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Admin - Admin</title>
    <link rel="stylesheet" href="../../../assets/admin/style2.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <?php include "../../../includes/sidebar_admin.php"; ?>

        <div class="main-content">
            <!-- Top Bar  -->
            <div class="top-bar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchAdmin" placeholder="Cari admin...">
                </div>
                <div class="top-bar-right">
                    <a href="tambah.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Admin
                    </a>
                </div>
            </div>

            <!-- Page Header  -->
            <div class="page-header">
                <h1>Kelola Data Admin</h1>
                <p>Daftar semua admin yang memiliki akses ke dashboard</p>
            </div>

            <?php if (isset($_GET['status'])) : ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                Data admin berhasil <?= htmlspecialchars($_GET['status']) ?>
            </div>
            <?php endif; ?>

            <!-- Table  -->
            <div class="card">
                <div class="card-header">
                    <h2>Daftar Admin (<?= count($admins) ?> data)</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Terdaftar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($admins as $admin) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><strong><?= htmlspecialchars($admin['username']) ?></strong></td>
                                    <td><?= htmlspecialchars($admin['nama_lengkap']) ?></td>
                                    <td><?= formatTanggal($admin['created_at']) ?></td>
                                    <td>
                                        <?php if ($admin['id'] == $admin_id) : ?>
                                            <span class="badge badge-success">Aktif (Anda)</span>
                                        <?php else : ?>
                                            <span class="badge badge-info">Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="edit.php?id=<?= $admin['id'] ?>" class="btn-action btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <?php if ($admin['id'] != $admin_id) : ?>
                                            <a href="index.php?hapus=<?= $admin['id'] ?>" class="btn-action btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="../../../assets/admin/script.js?v=<?= time() ?>"></script> -->
</body>
</html>
