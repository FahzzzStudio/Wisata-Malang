<?php
// File: pages/admin/wisata/detail.php
// Fungsi: Halaman detail wisata

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

$wisata = ambilWisataById($db, $id);
if (!$wisata) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata - Admin</title>
    <link rel="stylesheet" href="../../../assets/admin/style2.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <?php include "../../../includes/sidebar_admin.php"; ?>

        <div class="main-content">
            <!-- Page Header  -->
            <div class="page-header">
                <h1>Detail Wisata</h1>
                <p>Informasi lengkap destinasi wisata</p>
            </div>

            <!-- Detail Card  -->
            <div class="card">
                <div class="card-body detail-body">
                    <div class="detail-image">
                        <img src="../../../uploads/<?= htmlspecialchars($wisata['gambar']) ?>" alt="<?= htmlspecialchars($wisata['nama']) ?>">
                    </div>

                    <div class="detail-info">
                        <h2><?= htmlspecialchars($wisata['nama']) ?></h2>
                        
                        <div class="detail-meta">
                            <div class="meta-item">
                                <span class="meta-label">Kategori:</span>
                                <span class="badge badge-info"><?= htmlspecialchars($wisata['kategori']) ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Lokasi:</span>
                                <span><i class="fas fa-map-pin"></i> <?= htmlspecialchars($wisata['lokasi']) ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Rating:</span>
                                <span><i class="fas fa-star" style="color: #ffc107;"></i> <?= number_format($wisata['rating'], 1) ?>/5.0</span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Harga:</span>
                                <span><?= htmlspecialchars($wisata['harga_tiket']) ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Jam Operasional:</span>
                                <span><?= htmlspecialchars($wisata['jam_operasional']) ?></span>
                            </div>
                        </div>

                        <div class="detail-description">
                            <h3>Deskripsi</h3>
                            <p><?= nl2br(htmlspecialchars($wisata['deskripsi'])) ?></p>
                        </div>

                        <div class="detail-actions">
                            <a href="edit.php?id=<?= $wisata['id'] ?>" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="index.php?hapus=<?= $wisata['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                            <a href="index.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../assets/admin/script.js?v=<?= time() ?>"></script>
</body>
</html>
