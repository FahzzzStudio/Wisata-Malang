<?php 
// Include header yang sudah ada session_start dan koneksi database
include '../includes/header.php'; 
?>

<!-- Hero Section  -->
<section class="hero" style="height: 300px;">
    <div class="hero-content">
        <h1>Hubungi Kami</h1>
    </div>
</section>

<!-- Contact Content  -->
<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;">
            <!-- Contact Form  -->
            <div>
                <h2 style="font-size: 2rem; margin-bottom: 1rem;">Kirim Pesan</h2>
                <p style="color: var(--dark-gray); margin-bottom: 2rem;">Punya pertanyaan atau saran? Jangan ragu untuk menghubungi kami!</p>
                
                <form id="contactForm" onsubmit="return handleContactSubmit(event)">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-input" placeholder="Masukkan nama lengkap" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-input" placeholder="Masukkan email" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Subjek</label>
                        <input type="text" name="subjek" class="form-input" placeholder="Masukkan subjek pesan" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Pesan</label>
                        <textarea name="pesan" class="form-input" rows="5" placeholder="Tulis pesan Anda..." required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Kirim Pesan</button>
                </form>
            </div>
            
            <!-- Contact Info  -->
            <div>
                <h2 style="font-size: 2rem; margin-bottom: 1rem;">Informasi Kontak</h2>
                <p style="color: var(--dark-gray); margin-bottom: 2rem;">Anda juga bisa menghubungi kami melalui:</p>
                
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: var(--shadow-md); display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 60px; height: 60px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-map-marker-alt" style="color: var(--white); font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Alamat</h4>
                            <p style="color: var(--dark-gray);">Malang, Jawa Timur, Indonesia</p>
                        </div>
                    </div>
                    
                    <div style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: var(--shadow-md); display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 60px; height: 60px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-phone" style="color: var(--white); font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Telepon</h4>
                            <p style="color: var(--dark-gray);">+62-828-3892-4865</p>
                        </div>
                    </div>
                    
                    <div style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: var(--shadow-md); display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 60px; height: 60px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-envelope" style="color: var(--white); font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Email</h4>
                            <p style="color: var(--dark-gray);">malangraya@gmail.com</p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media  -->
                <div style="margin-top: 2rem;">
                    <h3 style="margin-bottom: 1rem;">Ikuti Kami</h3>
                    <div class="social-links">
                        <a href="#" class="social-link" style="background: var(--primary-color); color: white;"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link" style="background: var(--primary-color); color: white;"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="social-link" style="background: var(--primary-color); color: white;"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link" style="background: var(--primary-color); color: white;"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <!-- Map  -->
                <div style="margin-top: 2rem; border-radius: 1rem; overflow: hidden; box-shadow: var(--shadow-md);">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252230.02028974562!2d112.43253103750001!3d-7.9666204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629dc2f2f2b45%3A0x2e8583e3a7b73b!2sMalang%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1234567890" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function handleContactSubmit(event) {
    event.preventDefault();
    alert('Pesan berhasil dikirim! Kami akan segera menghubungi Anda.');
    document.getElementById('contactForm').reset();
    return false;
}
</script>

<?php include '../includes/footer.php'; ?>
