<?php
require "../../../config/database.php";
require "../../../config/functions.php";
include "../../../includes/sidebar_admin.php";

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
</head>
<body>
    <div class="main-content">
        <div class="form-container">
            <h2><i class="fas fa-edit"></i>
                Edit Data Wisata
            </h2>
            <form action="" method="post" enctype="multipart/form-data">

                <label for="nama">Nama Wisata</label>
                <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($wisata['nama']) ?>">

                <label for="kategori">Kategori Wisata</label>
                <input type="text" name="kategori" id="kategori" value="<?= htmlspecialchars($wisata['kategori']) ?>">

                <label for="lokasi">Lokasi Wisata</label>
                <input type="text" name="lokasi" id="lokasi" value="<?= htmlspecialchars($wisata['lokasi']) ?>">

                <label for="deskripsi">Deskripsi Wisata</label>
                <textarea name="deskripsi" id="deskripsi"><?= htmlspecialchars($wisata['deskripsi']) ?></textarea>

                <label for="gambar">Foto Wisata</label>
                <img src="../../../uploads/<?= $wisata['gambar'] ?>" alt="gambar-lama">
                <p>Gambar lama</p>
                <p><?= $wisata['gambar'] ?></p>

                <label for="">Upload file gambar baru</label>
                <input type="file" name="gambar" id="gambar" accept="image/*">
                <small>* kosongkan jika tidak ingin mengubah gambar</small>

                <button type="submit" name="update" class="btn btn-primary">
                    Edit data
                </button>
                
                <button class="btn btn-primary">
                    <a href="index.php" class="btn btn-primary">
                        Batal
                    </a>
                </button>
            </form>
        </div>
    </div>
</body>
</html>