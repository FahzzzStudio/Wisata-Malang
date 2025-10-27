<?php
// File: pages/admin/kelola_admin/tambah.php
// Fungsi: Form tambah admin baru

session_start();
require_once "../../../config/database.php";
require_once "../../../config/functions.php";

// Cek login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: ../login.php");
//     exit;
// }

$error = '';

// Proses tambah
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $nama_lengkap = $_POST['nama_lengkap'] ?? '';

    // Validasi
    if (empty($username) || empty($password) || empty($nama_lengkap)) {
        $error = 'Semua field harus diisi!';
    } elseif (strlen($password) < 6) {
        $error = 'Password minimal 6 karakter!';
    } else {
        // Cek username sudah ada
        $cek = mysqli_query($db, "SELECT id FROM admin WHERE username = '$username'");
        if (mysqli_num_rows($cek) > 0) {
            $error = 'Username sudah terdaftar!';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO admin (username, password, nama_lengkap) VALUES ('$username', '$passwordHash', '$nama_lengkap')";
            
            if (mysqli_query($db, $query)) {
                header("Location: index.php?status=ditambahkan");
                exit;
            } else {
                $error = 'Gagal menambah admin!';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin - Admin</title>
    <link rel="stylesheet" href="../../../assets/admin/style2.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <?php include "../../../includes/sidebar_admin.php"; ?>

        <div class="main-content">
            <!-- Page Header  -->
            <div class="page-header">
                <h1>Tambah Admin Baru</h1>
                <p>Tambahkan akun admin baru untuk mengelola website</p>
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
                            <label for="username">Username <span class="required">*</span></label>
                            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password <span class="required">*</span></label>
                            <input type="password" id="password" name="password" placeholder="Masukkan password (min. 6 karakter)" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Tambah Admin
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
