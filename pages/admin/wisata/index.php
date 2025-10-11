<?php
require_once "../../../config/functions.php";
require_once "../../../config/database.php";
include "../../../includes/sidebar_admin.php";

if (isset($_GET['hapus'])) {
    hapusWisata($koneksi, $_GET['hapus']);
    header("location: index.php");
}

$wisata = ambilSemuaWisata($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata</title>
    <link rel="stylesheet" href="../../../assets/admin/style.css?v=<?= time() ?>">
</head>
<body>
    <div class="main-content">
        <div class="page-header">
            <h1>Kelola Data Wisata</h1>
            <p class="page-subtitle">Tempat dimana untuk mengelola data wisata yang ada</p>
            <a href="../../../pages/admin/wisata/tambah.php">Tambah Wisata</a>
        </div>

        <div class="table-container">
            <h2>Daftar Wisata</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <!-- <th>Deskripsi</th> -->
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($wisata as $w) : ?>
                    <tr>
                        <td><?= $w['id'] ?></td>
                        <td><?= $w['nama'] ?></td>
                        <td><?= $w['kategori'] ?></td>
                        <td><?= $w['lokasi'] ?></td>
                        <!-- <td><?= $w['deskripsi'] ?></td> -->
                        <td><img src="../../../uploads/<?= $w['gambar'] ?>" width="80"></td>
                        <td>
                            <div class="action-buttons">
                                <a href="edit.php?id=<?= $w['id'] ?>">Edit</a>
                                <a href="hapus.php?id=<?= $w['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>