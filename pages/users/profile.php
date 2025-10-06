<?php 
require_once '../../config/config.php';

// Redirect jika belum login
if (!isLoggedIn()) {
    header('Location: ' . BASE_URL . 'pages/users/signin.php');
    exit;
}

$user = getCurrentUser();
include '../../includes/header.php'; 
?>

Hero Section 
<section class="hero" style="height: 300px;">
    <div class="hero-content">
        <h1>Profile Pengunjung</h1>
    </div>
</section>

Profile Content 
<section class="section">
    <div class="container">
        Profile Card 
        <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: var(--shadow-md); margin-bottom: 3rem;">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 2rem;">
                <div>
                    <h2 style="color: var(--primary-color); font-size: 1.75rem; margin-bottom: 0.5rem;">Profil Pribadi | Profil Saya</h2>
                    <p style="color: var(--dark-gray);">Tempat di mana ceritamu bertemu dengan indahnya Malang.</p>
                </div>
                <button class="btn btn-primary" onclick="editProfile()">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
                <div>
                    <p style="color: var(--dark-gray); margin-bottom: 0.5rem;">Nama Lengkap</p>
                    <p style="color: var(--primary-color); font-weight: 600; font-size: 1.1rem;"><?php echo htmlspecialchars($user['name']); ?></p>
                </div>
                
                <div>
                    <p style="color: var(--dark-gray); margin-bottom: 0.5rem;">Nomor Telepon</p>
                    <p style="color: var(--primary-color); font-weight: 600; font-size: 1.1rem;"><?php echo htmlspecialchars($user['phone']); ?></p>
                </div>
                
                <div>
                    <p style="color: var(--dark-gray); margin-bottom: 0.5rem;">Email</p>
                    <p style="color: var(--primary-color); font-weight: 600; font-size: 1.1rem;"><?php echo htmlspecialchars($user['email']); ?></p>
                </div>
            </div>
        </div>
        
        Favorite Destinations 
        <div>
            <h2 style="font-size: 2rem; margin-bottom: 1rem;">Wisata <span style="color: var(--primary-color);">Favorite</span></h2>
            <p style="color: var(--dark-gray); margin-bottom: 2rem;">Persiapkan untuk kisah seru bersama pesona Malang.</p>
            
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
            </div>
            
            <div class="text-center mt-4">
                <a href="<?php echo BASE_URL; ?>pages/users/favorite.php" class="btn btn-outline">Lihat lebih banyak</a>
            </div>
        </div>
        
        Logout Button 
        <div class="text-center mt-5">
            <button onclick="handleLogout()" class="btn" style="background: #dc3545; color: white;">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </button>
        </div>
    </div>
</section>

<script>
function editProfile() {
    showNotification('Fitur edit profile akan segera tersedia!');
}

function handleLogout() {
    if (confirm('Apakah Anda yakin ingin keluar?')) {
        // Hapus session simulasi
        localStorage.removeItem('isLoggedIn');
        localStorage.removeItem('userEmail');
        localStorage.removeItem('userName');
        localStorage.removeItem('userPhone');
        
        showNotification('Logout berhasil!');
        
        setTimeout(() => {
            window.location.href = '<?php echo BASE_URL; ?>index.php';
        }, 1000);
    }
}
</script>

<?php include '../../includes/footer.php'; ?>
