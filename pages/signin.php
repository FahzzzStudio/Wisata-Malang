<?php 
// Include header yang sudah ada session_start dan koneksi database
require_once __DIR__ . '/../config/functions.php';
require_once __DIR__ . '/../config/config.php';

// Jika sudah login, redirect ke profile
if (isset($_SESSION['user_id'])) {
    header('Location: /app_wisata_malang/pages/');
    exit;
}

// Proses login
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($email && $password) {
        $user = loginUser($db, $email, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nama'] = $user['nama_lengkap'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: /app_wisata_malang/pages/');
            exit;
        } else {
            $error = 'Email atau password salah!';
        }
    } else {
        $error = 'Semua field harus diisi!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../assets/css/style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/responsive.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="body-sign">
    <!-- Sign In Form  -->
    <section class="section">
        <div class="container">
            <div style="max-width: 600px; margin: 0 auto;">
                <div style="background: white; padding: 3rem; border-radius: 1rem; box-shadow: var(--shadow-lg);">
                    <h2 style="text-align: center; margin-bottom: 0.5rem; color: var(--dark);">Selamat Datang Kembali</h2>
                    <p style="text-align: center; color: var(--dark-gray); margin-bottom: 2rem;">Masuk ke akun Anda</p>
                    
                    <?php if ($error): ?>
                        <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="">
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
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Sign In</button>
                    </form>
                    
                    <p style="text-align: center; margin-top: 1.5rem; color: var(--dark-gray);">
                        Belum punya akun? <a href="signup.php" style="color: var(--primary-color); font-weight: 600;">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>