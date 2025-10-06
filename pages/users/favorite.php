<?php 
require_once '../../config/config.php';

// Redirect jika belum login
if (!isLoggedIn()) {
    header('Location: ' . BASE_URL . 'pages/users/signin.php');
    exit;
}

include '../../includes/header.php'; 
?>

Hero Section 
<section class="hero" style="height: 300px;">
    <div class="hero-content">
        <h1>Tempat Wisata Favorite</h1>
    </div>
</section>

Favorite Content 
<section class="section">
    <div class="container">
        <div class="destinations-grid">
            Card 1 
            <div class="destination-card">
                <div class="card-image">
                    <img src="/placeholder.svg?height=200&width=300" alt="Jawa Timur Park 1">
                    <div class="card-badge">
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </div>
                    <div class="card-favorite active" onclick="toggleFavorite(this, 'wisata-1')" data-wisata-id="wisata-1">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="card-content">
                    <p class="card-category">Wisata Buatan</p>
                    <h3 class="card-title">Jawa Timur Park 1</h3>
                    <p class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Kecamatan Batu</span>
                    </p>
                    <a href="<?php echo BASE_URL; ?>pages/detail.php?id=1" class="btn btn-primary" style="width: 100%;">Lihat detail wisata</a>
                </div>
            </div>
            
            Card 2 
            <div class="destination-card">
                <div class="card-image">
                    <img src="/placeholder.svg?height=200&width=300" alt="Flora Wisata San Terra">
                    <div class="card-badge">
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </div>
                    <div class="card-favorite active" onclick="toggleFavorite(this, 'wisata-2')" data-wisata-id="wisata-2">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="card-content">
                    <p class="card-category">Wisata Buatan</p>
                    <h3 class="card-title">Flora Wisata San Terra</h3>
                    <p class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Kecamatan Batu</span>
                    </p>
                    <a href="<?php echo BASE_URL; ?>pages/detail.php?id=2" class="btn btn-primary" style="width: 100%;">Lihat detail wisata</a>
                </div>
            </div>
            
            Card 3 
            <div class="destination-card">
                <div class="card-image">
                    <img src="/placeholder.svg?height=200&width=300" alt="Batu Night Spectacular">
                    <div class="card-badge">
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </div>
                    <div class="card-favorite active" onclick="toggleFavorite(this, 'wisata-3')" data-wisata-id="wisata-3">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="card-content">
                    <p class="card-category">Wisata Buatan</p>
                    <h3 class="card-title">Batu Night Spectacular</h3>
                    <p class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Kecamatan Batu</span>
                    </p>
                    <a href="<?php echo BASE_URL; ?>pages/detail.php?id=3" class="btn btn-primary" style="width: 100%;">Lihat detail wisata</a>
                </div>
            </div>
            
            Duplicate untuk menampilkan lebih banyak 
            <div class="destination-card">
                <div class="card-image">
                    <img src="/placeholder.svg?height=200&width=300" alt="Jawa Timur Park 1">
                    <div class="card-badge">
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </div>
                    <div class="card-favorite active" onclick="toggleFavorite(this, 'wisata-4')" data-wisata-id="wisata-4">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="card-content">
                    <p class="card-category">Wisata Buatan</p>
                    <h3 class="card-title">Jawa Timur Park 1</h3>
                    <p class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Kecamatan Batu</span>
                    </p>
                    <a href="<?php echo BASE_URL; ?>pages/detail.php?id=1" class="btn btn-primary" style="width: 100%;">Lihat detail wisata</a>
                </div>
            </div>
            
            <div class="destination-card">
                <div class="card-image">
                    <img src="/placeholder.svg?height=200&width=300" alt="Flora Wisata San Terra">
                    <div class="card-badge">
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </div>
                    <div class="card-favorite active" onclick="toggleFavorite(this, 'wisata-5')" data-wisata-id="wisata-5">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="card-content">
                    <p class="card-category">Wisata Buatan</p>
                    <h3 class="card-title">Flora Wisata San Terra</h3>
                    <p class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Kecamatan Batu</span>
                    </p>
                    <a href="<?php echo BASE_URL; ?>pages/detail.php?id=2" class="btn btn-primary" style="width: 100%;">Lihat detail wisata</a>
                </div>
            </div>
            
            <div class="destination-card">
                <div class="card-image">
                    <img src="/placeholder.svg?height=200&width=300" alt="Batu Night Spectacular">
                    <div class="card-badge">
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </div>
                    <div class="card-favorite active" onclick="toggleFavorite(this, 'wisata-6')" data-wisata-id="wisata-6">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="card-content">
                    <p class="card-category">Wisata Buatan</p>
                    <h3 class="card-title">Batu Night Spectacular</h3>
                    <p class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Kecamatan Batu</span>
                    </p>
                    <a href="<?php echo BASE_URL; ?>pages/detail.php?id=3" class="btn btn-primary" style="width: 100%;">Lihat detail wisata</a>
                </div>
            </div>
        </div>
        
        Pagination 
        <div class="pagination" style="display: flex; justify-content: center; gap: 0.5rem; margin-top: 3rem;">
            <a href="#" class="btn btn-primary" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem;">1</a>
            <a href="#" class="btn btn-outline" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem;">2</a>
            <a href="#" class="btn btn-outline" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem;">3</a>
            <a href="#" class="btn btn-primary" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem;"><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<?php include '../../includes/footer.php'; ?>
