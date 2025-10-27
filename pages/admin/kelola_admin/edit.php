<?php
// File: pages/admin/kelola_admin/edit.php
// Fungsi: Form edit admin

session_start();
require_once "../../../config/database.php";
require_once "../../../config/functions.php";

// Cek login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: ../login.php");
//     exit;
// }

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$admin = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM admin WHERE id = $id"));
if (!$admin) {
    header("Location: index.php");
    exit;
}

$error = '';

// Proses update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $nama_lengkap = $_POST['nama_lengkap'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($nama_lengkap)) {
        $error = 'Username dan nama lengkap harus diisi!';
    } else {
        // Cek username sudah ada (kecuali milik sendiri)
        $cek = mysqli_query($db, "SELECT id FROM admin WHERE username = '$username' AND id != $id");
        if (mysqli_num_rows($cek) > 0) {
            $error = 'Username sudah terdaftar!';
        } else {
            $query = "UPDATE admin SET username = '$username', nama_lengkap = '$nama_lengkap'";
            
            // Jika password diisi, update password
            if (!empty($password)) {
                if (strlen($password) < 6) {
                    $error = 'Password minimal 6 karakter!';
                } else {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $query .= ", password = '$passwordHash'";
                }
            }
            
            if (empty($error)) {
                $query .= " WHERE id = $id";
                
                if (mysqli_query($db, $query)) {
                    header("Location: index.php?status=diperbarui");
                    exit;
                } else {
                    $error = 'Gagal mengupdate admin!';
                }
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
    <title>Edit Admin - Admin</title>
    <link rel="stylesheet" href="../../../assets/admin/style2.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <?php include "../../../includes/sidebar_admin.php"; ?>

        <div class="main-content">
            <!-- Page Header     -->
            <div class="page-header">
                <h1>Edit Data Admin</h1>
                <p>Ubah informasi admin</p>
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
                            <input type="text" id="username" name="username" value="<?= htmlspecialchars($admin['username']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($admin['nama_lengkap']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                            <small>Minimal 6 karakter</small>
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
