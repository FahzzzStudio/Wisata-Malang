<?php 
// Include header yang sudah ada session_start dan koneksi database
include '../includes/header.php'; 

// Ambil ID wisata dari URL
$id_wisata = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil data wisata berdasarkan ID
$wisata = ambilWisataById($db, $id_wisata);

// Jika wisata tidak ditemukan, redirect ke halaman kategori
if (!$wisata) {
    header('Location: /pages/kategori.php');
    exit;
}

// Cek apakah wisata ini sudah difavoritkan oleh user (jika sudah login)
$is_favorited = false;
if (isset($_SESSION['user_id'])) {
    $is_favorited = cekFavorite($db, $_SESSION['user_id'], $id_wisata);
}
?>

Hero Section 
<section class="hero" style="height: 300px;">
    <div class="hero-content">
        <h1>Detail Wisata</h1>
    </div>
</section>

Detail Content 
<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            Main Content 
            <div>
                Image 
                <div style="border-radius: 1rem; overflow: hidden; margin-bottom: 2rem;">
                    <img src="/assets/img/<?php echo htmlspecialchars($wisata['gambar']); ?>" 
                        alt="<?php echo htmlspecialchars($wisata['nama']); ?>" 
                        style="width: 100%; height: 400px; object-fit: cover;">
                </div>
                
                Title & Info 
                <h1 style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--dark);">
                    <?php echo htmlspecialchars($wisata['nama']); ?>
                </h1>
                
                <div style="display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap;">
                    <span class="btn btn-primary" style="cursor: default;">
                        <?php echo htmlspecialchars($wisata['kategori']); ?>
                    </span>
                    <span class="btn btn-outline" style="cursor: default;">
                        <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($wisata['lokasi']); ?>
                    </span>
                    <span class="btn btn-outline" style="cursor: default;">
                        <i class="fas fa-star"></i> <?php echo number_format($wisata['rating'], 1); ?>
                    </span>
                </div>
                
                Description 
                <div style="background: var(--light-gray); padding: 2rem; border-radius: 1rem; margin-bottom: 2rem;">
                    <h2 style="margin-bottom: 1rem; color: var(--dark);">Tentang wisata</h2>
                    <p style="line-height: 1.8; color: var(--dark-gray);">
                        <?php echo nl2br(htmlspecialchars($wisata['deskripsi'])); ?>
                    </p>
                </div>
                
                Additional Info 
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                    <div style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: var(--shadow-md);">
                        <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">
                            <i class="fas fa-clock"></i> Jam Operasional
                        </h3>
                        <p style="color: var(--dark-gray);">
                            <?php echo htmlspecialchars($wisata['jam_buka']); ?>
                        </p>
                    </div>
                    
                    <div style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: var(--shadow-md);">
                        <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">
                            <i class="fas fa-ticket-alt"></i> Harga Tiket
                        </h3>
                        <p style="color: var(--dark-gray);">
                            <?php echo htmlspecialchars($wisata['harga_tiket']); ?>
                        </p>
                    </div>
                </div>
            </div>
            
            Sidebar 
            <div>
                QR Code 
                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: var(--shadow-md); text-align: center; margin-bottom: 1.5rem;">
                    <img src="/assets/img/qr/<?php echo htmlspecialchars($wisata['qr_code']); ?>" 
                        alt="QR Code Lokasi" 
                        style="width: 200px; height: 200px; margin: 0 auto 1rem;">
                    <a href="<?php echo htmlspecialchars($wisata['link_maps']); ?>" 
                        target="_blank" 
                        class="btn btn-primary" 
                        style="width: 100%;">
                        <i class="fas fa-map-marked-alt"></i> Cek Lokasi Wisata
                    </a>
                </div>
                
                Favorite Button 
                <?php if (isset($_SESSION['user_id'])): ?>
                    <button onclick="toggleFavorite(this, <?php echo $id_wisata; ?>)" 
                            class="btn <?php echo $is_favorited ? 'btn-primary' : 'btn-outline'; ?>" 
                            style="width: 100%; margin-bottom: 1rem;" 
                            data-wisata-id="<?php echo $id_wisata; ?>">
                        <i class="fas fa-heart"></i> 
                        <?php echo $is_favorited ? 'Hapus dari Favorite' : 'Tambah ke Favorite'; ?>
                    </button>
                <?php else: ?>
                    <a href="/pages/signin.php" class="btn btn-outline" style="width: 100%; margin-bottom: 1rem; display: block; text-align: center;">
                        <i class="fas fa-heart"></i> Login untuk Favorite
                    </a>
                <?php endif; ?>
                
                Share Button 
                <button onclick="shareWisata()" class="btn btn-outline" style="width: 100%;">
                    <i class="fas fa-share-alt"></i> Bagikan Wisata
                </button>
            </div>
        </div>
    </div>
</section>

<script>
function shareWisata() {
    if (navigator.share) {
        navigator.share({
            title: '<?php echo htmlspecialchars($wisata['nama']); ?>',
            text: 'Lihat wisata <?php echo htmlspecialchars($wisata['nama']); ?> di Malang!',
            url: window.location.href
        }).catch(err => console.log('Error sharing:', err));
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(window.location.href);
        alert('Link berhasil disalin!');
    }
}
</script>

<?php include '../includes/footer.php'; ?>
