<?php
require "../../../config/database.php";
require "../../../config/functions.php";
include "../../../includes/sidebar_admin.php";

$id = $_GET['id'];

$wisata = ambilWisataById($koneksi, $id);

$kategori = ambilWisataByKategori($koneksi, $id);



if (isset($_POST['update'])) {
    if(updateWisata($db, $_POST, $_FILES, $id)) {
        header("location: index.php?status=success");
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
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama wisata">

                <label for="kategori">Kategori Wisata</label>
                <input type="text" name="kategori" id="kategori" placeholder="Masukkan kategori wisata">

                <label for="lokasi">Lokasi Wisata</label>
                <input type="text" name="lokasi" id="lokasi" placeholder="Masukkan lokasi wisata">

                <label for="deskripsi">Deskripsi Wisata</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi wisata"></textarea>

                <label for="gambar">Foto Wisata</label>
                <input type="file" name="gambar" id="gambar" accept="image/*">


            </form>
        </div>
    </div>
</body>
</html>