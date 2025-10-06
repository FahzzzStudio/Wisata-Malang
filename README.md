# Website Informasi Wisata Kota Malang

Website informasi wisata yang menampilkan destinasi wisata, budaya, kuliner, dan keindahan alam Kota Malang secara digital.

## Fitur Utama

### Untuk Pengunjung (User)
- **Beranda**: Hero section, destinasi populer, dan kategori wisata
- **Kategori**: Daftar wisata berdasarkan kategori (alam, edukasi, kuliner, sejarah, dll)
- **Detail Wisata**: Informasi lengkap tempat wisata dengan gambar, deskripsi, lokasi, jam buka
- **Tentang Kami**: Profil website dan tim pengembang
- **Kontak**: Halaman kontak dengan form dan informasi kontak
- **Favorite**: Daftar wisata yang disimpan pengguna (setelah login)
- **Profile**: Data pengguna dan menu ubah profil
- **Autentikasi**: Sign In dan Sign Up

## Teknologi yang Digunakan

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP (tanpa framework)
- **Database**: MySQL (untuk pengembangan selanjutnya)
- **Icon**: Font Awesome 6.4.0

## Struktur Folder

\`\`\`
malang-tourism/
├── assets/
│   ├── css/
│   │   ├── style.css
│   │   └── responsive.css
│   ├── js/
│   │   └── main.js
│   └── images/
├── config/
│   └── config.php
├── includes/
│   ├── header.php
│   └── footer.php
├── pages/
│   ├── users/
│   │   ├── signin.php
│   │   ├── signup.php
│   │   ├── profile.php
│   │   └── favorite.php
│   ├── kategori.php
│   ├── detail.php
│   ├── tentang-kami.php
│   └── kontak.php
├── uploads/
├── index.php
└── README.md
\`\`\`

## Cara Instalasi

1. **Download atau Clone Project**
   - Download ZIP dari repository atau clone menggunakan git

2. **Setup Web Server**
   - Pastikan sudah terinstall XAMPP, WAMP, atau web server lainnya
   - Copy folder project ke direktori htdocs (untuk XAMPP) atau www (untuk WAMP)

3. **Konfigurasi Base URL**
   - Buka file `config/config.php`
   - Sesuaikan `BASE_URL` dengan lokasi project Anda
   \`\`\`php
   define('BASE_URL', 'http://localhost/malang-tourism/');
   \`\`\`

4. **Jalankan Project**
   - Buka browser dan akses: `http://localhost/malang-tourism/`

## Fitur yang Sudah Diimplementasi

✅ Responsive design untuk desktop dan mobile
✅ Navbar dengan menu navigasi
✅ Hero section dengan background image
✅ Grid layout untuk destinasi wisata
✅ Card component dengan hover effect
✅ Form login dan register (UI)
✅ Halaman profile dan favorite
✅ Filter dan search wisata
✅ Pagination
✅ Footer dengan informasi kontak
✅ Smooth scroll dan animasi
✅ Local storage untuk simulasi login dan favorite

## Pengembangan Selanjutnya

Tahap berikutnya yang akan dikembangkan:
- [ ] Integrasi dengan database MySQL
- [ ] Sistem autentikasi yang sesungguhnya
- [ ] Dashboard admin untuk mengelola wisata
- [ ] Upload gambar wisata
- [ ] Sistem rating dan review
- [ ] Integrasi Google Maps API
- [ ] Fitur pencarian advanced
- [ ] Export data wisata ke PDF
- [ ] Notifikasi email
- [ ] Multi-language support

## Catatan Penting

- **Session Management**: Saat ini menggunakan localStorage untuk simulasi. Pada implementasi production, gunakan PHP session yang proper.
- **Security**: Pastikan untuk menambahkan validasi input, sanitasi data, dan proteksi CSRF pada tahap pengembangan backend.
- **Database**: File `config/config.php` sudah menyediakan konfigurasi database untuk pengembangan selanjutnya.
- **Images**: Saat ini menggunakan placeholder. Ganti dengan gambar asli di folder `assets/images/` atau `uploads/`.

## Kontributor

- **Developer**: Fahzzz
- **Tahun**: 2025
- **Tujuan**: Pembelajaran dan Portofolio

## Lisensi

Project ini dibuat untuk keperluan pembelajaran dan portofolio pribadi.

---

© Copyright 2025 Malang Raya. Seluruh hak cipta dilindungi | By Fahzzz
