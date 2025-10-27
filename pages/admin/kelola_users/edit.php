<?php
// File: pages/admin/kelola_users/edit.php
// Fungsi: Form edit pengguna

// session_start();
require_once "../../../config/database.php";
require_once "../../../config/functions.php";

// Cek login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: ../login.php");
//     exit;
// }

// $id = $_GET['id'] ?? null;
// if (!$id) {
//     header("Location: index.php");
//     exit;
// }

// $user = ambilUserById($db, $id);
// if (!$user) {
//     header("Location: index.php");
//     exit;
// }

// $error = '';

// Proses update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_lengkap'] ?? '';
    $email = $_POST['email'] ?? '';
    $no_telepon = $_POST['no_telepon'] ?? '';

    if (empty($nama) || empty($email)) {
        $error = 'Nama dan email harus diisi!';
    } else {
        $data = [
            'nama_lengkap' => $nama,
            'email' => $email,
            'no_telepon' => $no_telepon
        ];

        if (updateProfil($db, $id, $data)) {
            header("Location: index.php?status=diperbarui");
            exit;
        } else {
            $error = 'Gagal mengupdate data pengguna!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna - Admin</title>
    <link rel="stylesheet" href="../../../assets/admin/style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <?php include "../../../includes/sidebar_admin.php"; ?>

        <div class="main-content">
            <!-- Page Header  -->
            <div class="page-header">
                <h1>Edit Data Pengguna</h1>
                <p>Ubah informasi pengguna</p>
            </div>

            <?php if ($error) : ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <!-- Form  -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="form-tambah">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($user['nama_lengkap']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No. Telepon</label>
                            <input type="text" id="no_telepon" name="no_telepon" value="<?= htmlspecialchars($user['no_telepon'] ?? '') ?>">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="index.php" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="../../../assets/admin/script.js?v=<?= time() ?>"></script> -->
</body>
</html>
