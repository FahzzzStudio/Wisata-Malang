<?php
// File: pages/admin/kelola_users/index.php
// Fungsi: Halaman daftar pengguna

// session_start();
require_once "../../../config/database.php";
require_once "../../../config/functions.php";

// Cek login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: ../login.php");
//     exit;
// }

// Proses hapus
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    mysqli_query($db, "DELETE FROM users WHERE id = $id");
    header("Location: index.php?status=terhapus");
    exit;
}

// Ambil data users
$result = mysqli_query($db, "SELECT * FROM users ORDER BY created_at DESC");
$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - Admin</title>
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
                    <input type="text" id="searchUser" placeholder="Cari pengguna...">
                </div>
                <div class="top-bar-right">
                    <a href="tambah.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah pengguna
                    </a>
                </div>
            </div>

            <!-- Page Header  -->
            <div class="page-header">
                <h1>Kelola Data Pengguna</h1>
                <p>Daftar semua pengguna yang terdaftar di website</p>
            </div>

            <?php if (isset($_GET['status'])) : ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                Data pengguna berhasil <?= htmlspecialchars($_GET['status']) ?>
            </div>
            <?php endif; ?>

            <!-- Table  -->
            <div class="card">
                <div class="card-header">
                    <h2>Daftar Pengguna (<?= count($users) ?> data)</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Terdaftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><strong><?= htmlspecialchars($user['nama_lengkap']) ?></strong></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td><?= htmlspecialchars($user['no_telepon'] ?? '-') ?></td>
                                    <td><?= formatTanggal($user['created_at']) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="edit.php?id=<?= $user['id'] ?>" class="btn-action btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="index.php?hapus=<?= $user['id'] ?>" class="btn-action btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
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
