<?php 
// Include header yang sudah ada session_start dan koneksi database
include '../includes/header.php'; 

// Ambil parameter kategori dan pencarian dari URL
$kategori_filter = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$keyword = isset($_GET['search']) ? $_GET['search'] : '';

// Ambil data wisata berdasarkan filter
if ($keyword) {
    $data_wisata = cariWisata($db, $keyword);
} elseif ($kategori_filter) {
    $data_wisata = ambilWisataByKategori($db, $kategori_filter);
} else {
    $data_wisata = ambilSemuaWisata($db);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../assets/css/responsive.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?= time() ?>">  
</head>
<body>
    <!-- Hero Section  -->
    <section class="hero" style="height: 300px;">
        <div class="hero-content">
            <h1>Destinasi</h1>
        </div>
    </section>

    <!-- Search & Filter Section  -->
    <section class="section">
        <div class="container">
            <div class="search-filter-wrapper" style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: var(--shadow-md); margin-bottom: 2rem;">
                <form method="GET" action="" style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <div class="input-icon" style="flex: 1; min-width: 250px;">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search" id="searchInput" class="form-input" 
                            placeholder="Ketik destinasi wisata yang ingin dilihat" 
                            value="<?php echo htmlspecialchars($keyword); ?>">
                    </div>
                    
                    <div style="flex: 1; min-width: 200px;">
                        <select name="kategori" id="categoryFilter" class="form-input">
                            <option value="">Pilih kategori wisata</option>
                            <option value="Wisata Alam" <?php echo $kategori_filter == 'Wisata Alam' ? 'selected' : ''; ?>>Wisata Alam</option>
                            <option value="Wisata Buatan" <?php echo $kategori_filter == 'Wisata Buatan' ? 'selected' : ''; ?>>Wisata Buatan</option>
                            <option value="Wisata Kebudayaan" <?php echo $kategori_filter == 'Wisata Kebudayaan' ? 'selected' : ''; ?>>Wisata Kebudayaan</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Cari wisata</button>
                </form>
            </div>
            
            <?php if ($keyword || $kategori_filter): ?>
                <div style="margin-bottom: 1.5rem;">
                    <p style="color: var(--text-secondary);">
                        Menampilkan <?php echo count($data_wisata); ?> hasil
                        <?php if ($keyword): ?>
                            untuk pencarian "<strong><?php echo htmlspecialchars($keyword); ?></strong>"
                        <?php endif; ?>
                        <?php if ($kategori_filter): ?>
                            dalam kategori "<strong><?php echo htmlspecialchars($kategori_filter); ?></strong>"
                        <?php endif; ?>
                    </p>
                </div>
            <?php endif; ?>
            
            <!-- Destinations Grid  -->
            <div class="destinations-grid">
                <?php if (!empty($data_wisata)): ?>
                    <?php foreach ($data_wisata as $wisata): ?>
                        <div class="destination-card">
                            <div class="card-image">
                                <img src="/assets/img/<?php echo htmlspecialchars($wisata['gambar']); ?>" 
                                    alt="<?php echo htmlspecialchars($wisata['nama']); ?>">
                                <div class="card-badge">
                                    <i class="fas fa-star"></i>
                                    <span><?php echo number_format($wisata['rating'], 1); ?></span>
                                </div>
                                <div class="card-favorite" onclick="toggleFavorite(this, <?php echo $wisata['id']; ?>)" 
                                    data-wisata-id="<?php echo $wisata['id']; ?>">
                                    <i class="far fa-heart"></i>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="card-category"><?php echo htmlspecialchars($wisata['kategori']); ?></p>
                                <h3 class="card-title"><?php echo htmlspecialchars($wisata['nama']); ?></h3>
                                <p class="card-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo htmlspecialchars($wisata['lokasi']); ?></span>
                                </p>
                                <a href="/pages/detail.php?id=<?php echo $wisata['id']; ?>" 
                                    class="btn btn-primary" style="width: 100%;">Lihat detail wisata</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                        <i class="fas fa-search" style="font-size: 4rem; color: var(--text-secondary); margin-bottom: 1rem;"></i>
                        <h3>Wisata tidak ditemukan</h3>
                        <p style="color: var(--text-secondary); margin-top: 0.5rem;">
                            Coba gunakan kata kunci atau kategori lain
                        </p>
                        <a href="/pages/kategori.php" class="btn btn-primary" style="margin-top: 1rem;">Lihat Semua Wisata</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include '../includes/footer.php'; ?>

</body>
</html>
