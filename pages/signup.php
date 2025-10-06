<?php 
// Include header yang sudah ada session_start dan koneksi database
include '../includes/header.php'; 

// Jika sudah login, redirect ke profile
if (isset($_SESSION['user_id'])) {
    header('Location: /pages/profile.php');
    exit;
}

// Proses registrasi
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if ($nama && $email && $password && $confirm_password) {
        if ($password !== $confirm_password) {
            $error = 'Password dan konfirmasi password tidak cocok!';
        } else {
            // $result = registerUser($db, $nama, $email, $password);
            if ($result === true) {
                $success = 'Registrasi berhasil! Silakan login.';
            } else {
                $error = $result;
            }
        }
    } else {
        $error = 'Semua field harus diisi!';
    }
}
?>

 Hero Section 
<section class="hero" style="height: 300px;">
    <div class="hero-content">
        <h1>Sign Up</h1>
    </div>
</section>

 Sign Up Form 
<section class="section">
    <div class="container">
        <div style="max-width: 500px; margin: 0 auto;">
            <div style="background: white; padding: 3rem; border-radius: 1rem; box-shadow: var(--shadow-lg);">
                <h2 style="text-align: center; margin-bottom: 0.5rem; color: var(--dark);">Buat Akun Baru</h2>
                <p style="text-align: center; color: var(--dark-gray); margin-bottom: 2rem;">Daftar untuk menyimpan wisata favorit Anda</p>
                
                <?php if ($error): ?>
                    <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div style="background: #efe; border: 1px solid #cfc; color: #3c3; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                        <?php echo htmlspecialchars($success); ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <div class="input-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" name="nama" class="form-input" placeholder="Masukkan nama lengkap" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" class="form-input" placeholder="Masukkan email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" class="form-input" placeholder="Masukkan password" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Password</label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirm_password" class="form-input" placeholder="Konfirmasi password" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Sign Up</button>
                </form>
                
                <p style="text-align: center; margin-top: 1.5rem; color: var(--dark-gray);">
                    Sudah punya akun? <a href="/pages/signin.php" style="color: var(--primary-color); font-weight: 600;">Sign In</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
