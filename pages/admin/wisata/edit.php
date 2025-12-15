<?php
require "../../../config/database.php";
require "../../../config/functions.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;
if(!$id) {
    die("ID wisata tidak ditemukan");
}

// Ambil id wisata dari URL
// $id = $_GET['id'];

// Ambil data wisata sesuai id
$wisata = ambilWisataById($db, $id);

// Ambil data ketegori
$kategori = ambilWisataByKategori($db, $id);

if (isset($_POST['update'])) {
    if(updateWisata($db, $_POST, $_FILES, $id)) {
        header("location: index.php?status=success");
        exit;   
    } else {
        echo "Gagal mengedit data";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Wisata</title>
    <link rel="stylesheet" href="../../../assets/admin/style2.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <?php include "../../../includes/sidebar_admin.php"; ?>

        <div class="main-content">
            <div class="page-header">
                <h1>Edit Data Wisata</h1>
                <p class="page-subtitle">Tempat untuk mengedit data wisata yang ada</p>
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- <h2>Edit Data Wisata</h2> -->
                    <form action="" method="post" class="form-tambah" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Wisata</label>
                            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($wisata['nama']) ?>">

                        <div class="form-row">
                            <div class="form-group">
                                <label for="kategori">Kategori Wisata</label>
                                <input type="text" name="kategori" id="kategori" value="<?= htmlspecialchars($wisata['kategori']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi Wisata</label>
                                <input type="text" name="lokasi" id="lokasi" value="<?= htmlspecialchars($wisata['lokasi']) ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="operasional">Operasional Wisata</label>
                                <input type="text" name="operasional" id="operasional" value="<?= htmlspecialchars($wisata['jam_operasional']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Tiket Wisata</label>
                                <input type="text" name="harga" id="harga" value="<?= htmlspecialchars($wisata['harga_tiket']) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Wisata</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5"><?= htmlspecialchars($wisata['deskripsi']) ?></textarea>

                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" id="rating" name="rating" step="0.1" min="0" max="5" value="<?= htmlspecialchars($wisata['rating']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="gambar">Foto Wisata</label>
                            <img src="../../../uploads/<?= $wisata['gambar'] ?>" alt="gambar-lama">
                            <!-- <p>Gambar lama</p> -->
                            <p><?= $wisata['gambar'] ?></p><br>
                        </div>

                        <div class="form-group">
                            <label for="">Upload file gambar baru</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*">
                            <small>* kosongkan jika tidak ingin mengubah gambar</small>
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="update" class="btn btn-primary">
                                <i class="fas fa-edit"></i>Edit data
                            </button>
                            <a href="index.php" class="btn btn-secondary">
                                <i class="fas fa-times"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>