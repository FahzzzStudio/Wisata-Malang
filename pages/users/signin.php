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
    <title>Masuk - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem;">
    
    <div style="background: white; padding: 3rem; border-radius: 1.5rem; box-shadow: var(--shadow-lg); max-width: 450px; width: 100%;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 0.5rem;">Masuk Malang</h1>
            <p style="color: var(--dark-gray);">Silahkan masuk untuk melanjutkan ke Malang Kab.</p>
        </div>
        
        <form id="signinForm" onsubmit="return handleSignIn(event)">
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
            
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Masuk</button>
        </form>
        
        <p style="text-align: center; margin-top: 1.5rem; color: var(--dark-gray);">
            Belum punya akun? <a href="<?php echo BASE_URL; ?>pages/users/signup.php" style="color: var(--primary-color); font-weight: 600;">Buat akun</a>
        </p>
    </div>
    
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
    <script>
    function handleSignIn(event) {
        event.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        // Simulasi login (dalam implementasi nyata, ini akan mengirim ke server)
        if (email && password) {
            // Simpan session simulasi
            localStorage.setItem('isLoggedIn', 'true');
            localStorage.setItem('userEmail', email);
            localStorage.setItem('userName', 'Fahmi Dwi Santoso');
            localStorage.setItem('userPhone', '(+62) 813-2847-7745');
            
            showNotification('Login berhasil! Mengalihkan...');
            
            setTimeout(() => {
                window.location.href = '<?php echo BASE_URL; ?>index.php';
            }, 1000);
        }
        
        return false;
    }
    </script>
</body>
</html>
