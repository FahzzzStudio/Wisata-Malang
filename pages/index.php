<?php 
// Include header yang sudah ada session_start dan koneksi database
include '../includes/header.php'; 

// Ambil data wisata populer (6 wisata pertama)
$wisata_populer = ambilSemuaWisata($db);
$wisata_populer = array_slice($wisata_populer, 0, 6);
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Jelajahi dan nikmati<br>keindahannya seluruh wisata<br>Malang Raya</h1>
        <p>Temukan destinasi wisata terbaik di Malang</p>
        <a href="/pages/kategori.php" class="btn btn-primary">Mulai Jelajahi</a>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mountain"></i>
                </div>
                <h3>Wisata Alam</h3>
                <p>Nikmati keindahan alam Malang yang memukau, dari gunung hingga pantai</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Wisata Buatan</h3>
                <p>Jelajahi berbagai destinasi wisata buatan yang menarik dan instagramable</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Wisata Kebudayaan</h3>
                <p>Rasakan pengalaman budaya lokal yang autentik dan berkesan</p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Destinations  -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Tempat <span>Populer</span></h2>
            <p class="section-subtitle">Destinasi wisata paling diminati</p>
        </div>
        
        <div class="destinations-grid">
            <?php if (!empty($wisata_populer)): ?>
                <?php foreach (array_slice($wisata_populer, 0, 3) as $wisata): ?>
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
                <p class="text-center">Belum ada data wisata.</p>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="/pages/kategori.php" class="btn btn-outline">Lihat lebih banyak</a>
        </div>
    </div>
</section>

<!-- Journey Section  -->
<section class="journey-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Temukan Keajaiban dalam <span>Setiap Perjalanan</span></h2>
            <p class="section-subtitle">Nikmati ragam destinasi wisata yang memikat hati, hanya di Malang</p>
        </div>
        
        <div class="journey-content">
            <div class="journey-image">
                <img src="/placeholder.svg?height=400&width=500" alt="Scenic View">
            </div>
            
            <div class="journey-steps">
                <div class="journey-step">
                    <div class="step-number">01</div>
                    <div class="step-content">
                        <h3>Temukan Pesona yang Tersembunyi!</h3>
                        <p>Jelajahi destinasi wisata yang belum banyak diketahui orang. Dari air terjun tersembunyi hingga desa wisata yang menenangkan, Malang menyimpan banyak kejutan.</p>
                    </div>
                </div>
                
                <div class="journey-step">
                    <div class="step-number">02</div>
                    <div class="step-content">
                        <h3>Buat Momen Jadi Tak Terlupakan</h3>
                        <p>Nikmati setiap momen bersama keluarga atau teman di tempat-tempat yang dirancang untuk menciptakan kenangan indah. Spot foto instagramable ada di mana-mana!</p>
                    </div>
                </div>
                
                <div class="journey-step">
                    <div class="step-number">03</div>
                    <div class="step-content">
                        <h3>Biarkan Malang Mengejutkanmu!</h3>
                        <p>Setiap sudut Malang punya cerita. Dari kuliner legendaris hingga seni jalanan yang memukau, kota ini siap memberikan pengalaman yang tak terduga.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Explore More Section  -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Jelajahi <span>Sekarang</span></h2>
            <p class="section-subtitle">Jelajahi destinasi wisata dan buat kenangan tak terlupakan</p>
        </div>
        
        <div class="destinations-grid">
            <?php if (!empty($wisata_populer)): ?>
                <?php foreach (array_slice($wisata_populer, 3, 3) as $wisata): ?>
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
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="/pages/kategori.php" class="btn btn-outline">Lihat lebih banyak</a>
        </div>
    </div>
</section>

<!-- Stats Section  -->
<section class="stats-section">
    <div class="container">
        <div class="stats-content">
            <div class="stats-image">
                <img src="/placeholder.svg?height=400&width=500" alt="Tourism Stats">
            </div>
            
            <div class="stats-info">
                <h2>Kami Rekomendasikan<br>Wisata Terbaik di<br><span>Malang</span></h2>
                <p>Ratusan destinasi wisata menanti untuk dijelajahi. Dari wisata alam yang memukau hingga kuliner legendaris, semua ada di Malang.</p>
                
                <div class="stats-grid">
                    <div class="stat-box">
                        <div class="stat-number">150+</div>
                        <div class="stat-label">Wisata</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Kuliner</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">20+</div>
                        <div class="stat-label">Hotel</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section  -->
<section class="gallery-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Rasakan Serunya <span>Berpetualang di Malang</span></h2>
            <p class="section-subtitle">Lihat koleksi foto dari berbagai destinasi yang telah dikunjungi</p>
        </div>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="/placeholder.svg?height=250&width=300" alt="Gallery 1">
            </div>
            <div class="gallery-item">
                <img src="/placeholder.svg?height=250&width=300" alt="Gallery 2">
            </div>
            <div class="gallery-item">
                <img src="/placeholder.svg?height=250&width=300" alt="Gallery 3">
            </div>
            <div class="gallery-item">
                <img src="/placeholder.svg?height=250&width=300" alt="Gallery 4">
            </div>
            <div class="gallery-item">
                <img src="/placeholder.svg?height=250&width=300" alt="Gallery 5">
            </div>
            <div class="gallery-item">
                <img src="/placeholder.svg?height=250&width=300" alt="Gallery 6">
            </div>
            <div class="gallery-item">
                <img src="/placeholder.svg?height=250&width=300" alt="Gallery 7">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section  -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <div class="cta-image">
                <img src="/placeholder.svg?height=300&width=400" alt="Malang Raya">
            </div>
            
            <div class="cta-text">
                <h2>
                    <span>Ayo berpetualang</span>
                    <span>ke Malang Raya</span>
                </h2>
                <p>Nikmati petualangan terbaik yang sudah diatur dengan sempurna. Dari destinasi wisata hingga pengalaman kuliner, semuanya siap untuk kamu jelajahi tanpa ribet.</p>
                <a href="/pages/kategori.php" class="btn btn-primary">Mulai Jelajahi</a>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
