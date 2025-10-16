<?php 
// Include header yang sudah ada session_start dan koneksi database
include '../includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang</title>
    <link rel="stylesheet" href="../assets/css/responsive.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?= time() ?>">
</head>
    <!-- Hero Section  -->
    <section class="hero" style="height: 300px;">
        <div class="hero-content">
            <h1>Tentang Kami</h1>
        </div>
    </section>

    <!-- About Content  -->
    <section class="section">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <div style="text-align: center; margin-bottom: 3rem;">
                    <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--dark);">
                        Selamat Datang di <span style="color: var(--primary-color);">Malang</span>
                    </h2>
                    <p style="font-size: 1.2rem; color: var(--dark-gray); line-height: 1.8;">
                        Platform informasi wisata terlengkap untuk menjelajahi keindahan Malang Raya
                    </p>
                <!-- </div>
                
                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: var(--shadow-md); margin-bottom: 2rem;">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Tentang Website Ini</h3>
                    <p style="line-height: 1.8; color: var(--dark-gray); margin-bottom: 1rem;">
                        Website Malang adalah platform digital yang didedikasikan untuk membantu wisatawan 
                        menemukan dan menjelajahi berbagai destinasi wisata menarik di Malang Raya. 
                        Kami menyediakan informasi lengkap tentang wisata alam, wisata buatan, dan wisata kebudayaan 
                        yang ada di Kota Malang dan sekitarnya.
                    </p>
                    <p style="line-height: 1.8; color: var(--dark-gray);">
                        Dengan fitur pencarian yang mudah, informasi detail setiap destinasi, dan sistem favorit, 
                        kami berkomitmen untuk membuat pengalaman wisata Anda di Malang menjadi lebih mudah dan menyenangkan.
                    </p>
                </div>
                
                <div style="background: var(--light-gray); padding: 2rem; border-radius: 1rem; margin-bottom: 2rem;">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Visi Kami</h3>
                    <p style="line-height: 1.8; color: var(--dark-gray);">
                        Menjadi platform informasi wisata terpercaya dan terlengkap untuk Malang Raya, 
                        membantu meningkatkan kunjungan wisatawan dan mendukung perkembangan pariwisata lokal.
                    </p>
                </div>
                
                <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: var(--shadow-md);">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Misi Kami</h3>
                    <ul style="line-height: 2; color: var(--dark-gray); padding-left: 1.5rem;">
                        <li>Menyediakan informasi wisata yang akurat dan terkini</li>
                        <li>Memudahkan wisatawan dalam merencanakan perjalanan mereka</li>
                        <li>Mempromosikan keindahan dan keunikan destinasi wisata Malang</li>
                        <li>Mendukung pelaku usaha pariwisata lokal</li>
                    </ul>
                </div> -->
            </div>
        </div>
    </section>

    <?php include '../includes/footer.php'; ?>
</html>
