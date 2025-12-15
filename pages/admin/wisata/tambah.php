<?php
// File: pages/admin/wisata/tambah.php
// Fungsi: Form tambah wisata baru

session_start();
require_once "../../../config/database.php";
require_once "../../../config/functions.php";

// Cek login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: ../login.php");
//     exit;
// }

// $error = '';
// $success = '';

// Proses tambah
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $lokasi = $_POST['lokasi'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $rating = $_POST['rating'] ?? 5.0;

    // Validasi
    if (empty($nama) || empty($kategori) || empty($lokasi) || empty($deskripsi)) {
        $error = 'Semua field harus diisi!';
    } elseif (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] != 0) {
        $error = 'Gambar harus diupload!';
    } else {
        // Upload gambar
        $file = $_FILES['gambar'];
        $namaFile = time() . '_' . basename($file['name']);
        $uploadPath = "../../../uploads/" . $namaFile;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            $data = [
                'nama' => $nama,
                'kategori' => $kategori,
                'lokasi' => $lokasi,
                'deskripsi' => $deskripsi,
                'gambar' => $namaFile,
                'rating' => $rating
            ];

            if (tambahWisata($db, $data)) {
                header("Location: index.php?status=ditambahkan");
                exit;
            } else {
                $error = 'Gagal menambah data wisata!';
            }
        } else {
            $error = 'Gagal upload gambar!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Wisata - Admin</title>
    <link rel="stylesheet" href="../../../assets/admin/style2.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <?php include "../../../includes/sidebar_admin.php"; ?>

        <div class="main-content">
            <!-- Page Header  -->
            <div class="page-header">
                <h1>Tambah Wisata Baru</h1>
                <p>Tambahkan destinasi wisata baru ke dalam database</p>
            </div>

            <!-- <?php if ($error) : ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?> -->

            <!-- Form  -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="form-tambah">
                        <div class="form-group">
                            <label for="nama">Nama Wisata <span class="required">*</span></label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama wisata" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="kategori">Kategori <span class="required">*</span></label>
                                <select id="kategori" name="kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Wisata Alam">Wisata Alam</option>
                                    <option value="Wisata Buatan">Wisata Buatan</option>
                                    <option value="Wisata Budaya">Wisata Budaya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="lokasi">Lokasi <span class="required">*</span></label>
                                <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan lokasi wisata" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="operasional">Operasional <span class="required">*</span></label>
                                <input type="text" id="operasional" name="operasional" placeholder="Masukkan jam operasional wisata" required>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga <span class="required">*</span></label>
                                <input type="text" id="harga" name="harga" placeholder="Masukkan harga wisata" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi <span class="required">*</span></label>
                            <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi wisata" rows="5" required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="number" id="rating" name="rating" min="0" max="5" step="0.1" value="5.0">
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar <span class="required">*</span></label>
                                <input type="file" id="gambar" name="gambar" accept="image/*" required>
                            </div>
                        </div>

                        

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Wisata
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

    <script src="../../../assets/admin/script.js?v=<?= time() ?>"></script>
</body>
</html>
