<?php 
require_once '../config/config.php';
include '../includes/header.php'; 
?>

Hero Section 
<section class="hero" style="height: 300px;">
    <div class="hero-content">
        <h1>Tentang Kami</h1>
    </div>
</section>

About Content 
<section class="section">
    <div class="container">
        <div style="display: flex; gap: 3rem; align-items: center; margin-bottom: 4rem;">
            <div style="flex: 1;">
                <img src="/placeholder.svg?height=400&width=500" alt="Malang Beach" style="width: 100%; border-radius: 1rem; box-shadow: var(--shadow-lg);">
            </div>
            
            <div style="flex: 1;">
                <h2 style="font-size: 2rem; margin-bottom: 1rem;">Mengapa kami <span style="color: var(--primary-color);">ada?</span></h2>
                <p style="color: var(--dark-gray); line-height: 1.8; margin-bottom: 2rem;">
                    Kami percaya setiap sudut Malang menyimpan banyak cerita. Misi kami adalah membantu setiap orang menemukan pengalaman terbaik di kota ini: mudah, lengkap, dan autentik. Dan kami menjadikan Malang sebagai destinasi wisata yang ramah, mudah dijelajahi, dan selalu berkesan.
                </p>
                
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="display: flex; align-items: start; gap: 1rem;">
                        <div style="width: 50px; height: 50px; background: var(--primary-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-info-circle" style="color: var(--primary-color); font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Menyediakan informasi wisata yang lengkap & terpercaya.</h4>
                        </div>
                    </div>
                    
                    <div style="display: flex; align-items: start; gap: 1rem;">
                        <div style="width: 50px; height: 50px; background: var(--primary-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-users" style="color: var(--primary-color); font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Mendorong pariwisata lokal agar lebih dikenal.</h4>
                        </div>
                    </div>
                    
                    <div style="display: flex; align-items: start; gap: 1rem;">
                        <div style="width: 50px; height: 50px; background: var(--primary-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-route" style="color: var(--primary-color); font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Membantu wisatawan merencanakan perjalanan.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        What We Believe 
        <div class="section-header">
            <h2 class="section-title">Apa yang <span>Kami Percaya</span></h2>
            <p class="section-subtitle">Nikmati ragam destinasi wisata yang memikat hati, hanya di Malang</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-bottom: 4rem;">
            <div style="text-align: center;">
                <div style="width: 100px; height: 100px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-shield-alt" style="color: white; font-size: 2.5rem;"></i>
                </div>
                <h3 style="margin-bottom: 1rem; color: var(--dark);">Keaslian</h3>
                <p style="color: var(--dark-gray);">Menampilkan sisi Malang yang nyata, bukan sekadar promosi.</p>
            </div>
            
            <div style="text-align: center;">
                <div style="width: 100px; height: 100px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-user-friends" style="color: white; font-size: 2.5rem;"></i>
                </div>
                <h3 style="margin-bottom: 1rem; color: var(--dark);">Kebersamaan</h3>
                <p style="color: var(--dark-gray);">Mendorong wisata berkelanjutan bersama warga lokal.</p>
            </div>
            
            <div style="text-align: center;">
                <div style="width: 100px; height: 100px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-hiking" style="color: white; font-size: 2.5rem;"></i>
                </div>
                <h3 style="margin-bottom: 1rem; color: var(--dark);">Petualangan</h3>
                <p style="color: var(--dark-gray);">Selalu ada hal baru untuk dijelajahi.</p>
            </div>
        </div>
        
        CTA 
        <div style="background: linear-gradient(rgba(23, 162, 184, 0.9), rgba(23, 162, 184, 0.9)), url('/placeholder.svg?height=300&width=1200') center/cover; padding: 3rem; border-radius: 1rem; text-align: center; color: white;">
            <h2 style="font-size: 2rem; margin-bottom: 1rem;">Ayo Mulai Petualanganmu di Malang</h2>
            <p style="margin-bottom: 2rem; font-size: 1.1rem;">Nikmati petualangan terbaik yang sudah diatur dengan sempurna. Dari destinasi wisata hingga pengalaman kuliner, semuanya siap untuk kamu jelajahi tanpa ribet.</p>
            <a href="<?php echo BASE_URL; ?>pages/kategori.php" class="btn" style="background: white; color: var(--primary-color);">Mulai Jelajahi</a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
