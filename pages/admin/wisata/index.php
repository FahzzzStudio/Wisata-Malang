<?php
require_once "../../../config/functions.php";
require_once "../../../config/database.php";

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
                    <input type="text" id="searchAdmin" placeholder="Cari wisata...">
                </div>
                <div class="top-bar-right">
                    <a href="tambah.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Wisata
                    </a>
                </div>
            </div>

            <div class="page-header">
                <h1>Kelola Data Wisata</h1>
                <p class="page-subtitle">Tempat dimana untuk mengelola data wisata yang ada</p>
                <!-- <button><a href="../../../pages/admin/wisata/tambah.php">Tambah Wisata</a></button> -->
            </div>

            <?php if (isset($_GET['status'])) : ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                Data wisata berhasil <?= htmlspecialchars($_GET['status']) ?>
            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h2>Daftar Wisata (<?= count($wisata) ?> data)</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
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
                                            <a href="detail.php?id=<?= $w['id'] ?>" class="btn-action btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="edit.php?id=<?= $w['id'] ?>" class="btn-action btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="hapus.php?id=<?= $w['id'] ?>" class="btn-action btn-danger" onclick="return confirm('Yakin?')" title="Hapus">
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
</body>
</html>