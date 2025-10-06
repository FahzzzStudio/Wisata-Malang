<?php 
require_once '../../config/config.php';

// Redirect jika sudah login
if (isLoggedIn()) {
    header('Location: ' . BASE_URL . 'index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem;">
    
    <div style="background: white; padding: 3rem; border-radius: 1.5rem; box-shadow: var(--shadow-lg); max-width: 450px; width: 100%;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 0.5rem;">Selamat Datang</h1>
            <p style="color: var(--dark-gray);">Silahkan membuat akun untuk melanjutkan ke Malang Kab.</p>
        </div>
        
        <form id="signupForm" onsubmit="return handleSignUp(event)">
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" id="fullname" class="form-input" placeholder="Nama Lengkap" required>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" class="form-input" placeholder="Alamat Email" required>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" class="form-input" placeholder="Kata Sandi" required>
                    <i class="fas fa-eye-slash password-toggle" onclick="togglePassword('password')"></i>
                </div>
            </div>
            
            <p style="color: var(--primary-color); font-weight: 600; margin-bottom: 0.5rem;">Konfirmasi</p>
            
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="confirmPassword" class="form-input" placeholder="Konfirmasi Kata Sandi" required>
                    <i class="fas fa-eye-slash password-toggle" onclick="togglePassword('confirmPassword')"></i>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Melanjutkan Daftar</button>
        </form>
        
        <p style="text-align: center; margin-top: 1.5rem; color: var(--dark-gray);">
            Sudah punya akun? <a href="<?php echo BASE_URL; ?>pages/users/signin.php" style="color: var(--primary-color); font-weight: 600;">Masuk</a>
        </p>
    </div>
    
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
    <script>
    function handleSignUp(event) {
        event.preventDefault();
        
        const fullname = document.getElementById('fullname').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        // Validasi password match
        if (password !== confirmPassword) {
            showNotification('Password tidak cocok!');
            return false;
        }
        
        // Simulasi registrasi (dalam implementasi nyata, ini akan mengirim ke server)
        if (fullname && email && password) {
            showNotification('Registrasi berhasil! Mengalihkan ke halaman login...');
            
            setTimeout(() => {
                window.location.href = '<?php echo BASE_URL; ?>pages/users/signin.php';
            }, 1500);
        }
        
        return false;
    }
    </script>
</body>
</html>
