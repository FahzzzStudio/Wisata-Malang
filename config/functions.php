<?php
// File: config/functions.php
// Fungsi: Kumpulan fungsi PHP untuk operasi CRUD dan helper

// Include koneksi database
require_once __DIR__ . '/database.php';

// ==================== FUNGSI WISATA ====================

// Fungsi untuk mengambil semua data wisata
function ambilSemuaWisata($koneksi) {
    $query = "SELECT * FROM wisata ORDER BY id DESC";
    $result = mysqli_query($koneksi, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

// Fungsi untuk mengambil wisata berdasarkan ID
function ambilWisataById($koneksi, $id) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $query = "SELECT * FROM wisata WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk mengambil wisata berdasarkan kategori
function ambilWisataByKategori($koneksi, $kategori) {
    $kategori = mysqli_real_escape_string($koneksi, $kategori);
    $query = "SELECT * FROM wisata WHERE kategori = '$kategori' ORDER BY id DESC";
    $result = mysqli_query($koneksi, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

// Fungsi untuk mencari wisata berdasarkan nama
function cariWisata($koneksi, $keyword) {
    $keyword = mysqli_real_escape_string($koneksi, $keyword);
    $query = "SELECT * FROM wisata WHERE nama LIKE '%$keyword%' OR lokasi LIKE '%$keyword%' ORDER BY id DESC";
    $result = mysqli_query($koneksi, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

// Fungsi untuk menambah wisata baru
function tambahWisata($koneksi, $data) {
    $nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['nama']));
    $kategori = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['kategori']));
    $lokasi = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['lokasi']));
    $deskripsi = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['deskripsi']));
    $gambar = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['gambar']));
    $rating = isset($data['rating']) ? floatval($data['rating']) : 5.0;
    $jam_operasional = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['operasional']));
    $harga_tiket = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['harga']));

    // Upload file gambar
    $poster = $_FILES['poster']['name'];
    $tmp = $_FILES['poster']['tmp_name'];
    move_uploaded_file($tmp, "../../uploads/" . $poster);
    
    $query = "INSERT INTO wisata (nama, kategori, lokasi, deskripsi, gambar, rating, jam_operasional, harga_tiket) 
            VALUES ('$nama', '$kategori', '$lokasi', '$deskripsi', '$gambar', '$rating', '$jam_operasional', '$harga_tiket')";
    
    return mysqli_query($koneksi, $query);
}

// Fungsi untuk mengupdate wisata
function updateWisata($koneksi, $data, $file, $id) {
    // $id = htmlspecialchars(mysqli_real_escape_string($koneksi, $id));
    $id = (int)$id;
    $nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['nama']));
    $kategori = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['kategori']));
    $lokasi = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['lokasi']));
    $deskripsi = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['deskripsi']));
    // $gambar = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['gambar']));
    $rating = isset($data['rating']) ? floatval($data['rating']) : 5.0;
    $gambar = ''; // akan ditentukan nanti lewat $_FILES
    $jam_operasional = isset($data['operasional']) ? mysqli_real_escape_string($koneksi, $data['operasional']) : '';
    $harga_tiket = isset($data['harga']) ? mysqli_real_escape_string($koneksi, $data['harga']) : '';

    // Cek poster baru
    // Upload file gambar baru (jika ada)
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "../../../uploads/" . $gambar);
    } else {
        // Ambil gambar lama dari database
        $result = mysqli_query($koneksi, "SELECT gambar FROM wisata WHERE id=$id");
        $gambarRow = mysqli_fetch_assoc($result);
        $gambar = $gambarRow['gambar'];
    }
    
    $query = "UPDATE wisata SET 
            nama = '$nama',
            kategori = '$kategori',
            lokasi = '$lokasi',
            deskripsi = '$deskripsi',
            gambar = '$gambar',
            rating = '$rating',
            jam_operasional = '$jam_operasional',
            harga_tiket = '$harga_tiket'
            WHERE id = '$id'";

    return mysqli_query($koneksi, $query);
}

// Fungsi untuk menghapus wisata
function hapusWisata($koneksi, $id) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $query = "DELETE FROM wisata WHERE id = '$id'";
    
    return mysqli_query($koneksi, $query);
}

// ==================== FUNGSI USER ====================

// Fungsi untuk registrasi user baru
function registrasiUser($koneksi, $data) {
    $nama = mysqli_real_escape_string($koneksi, $data['nama_lengkap']);
    $email = mysqli_real_escape_string($koneksi, $data['email']);
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    
    // Cek apakah email sudah terdaftar
    $cek = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek) > 0) {
        return false; // Email sudah terdaftar
    }
    
    $query = "INSERT INTO users (nama_lengkap, email, password) VALUES ('$nama', '$email', '$password')";
    
    return mysqli_query($koneksi, $query);
}

// Fungsi untuk login user
function loginUser($koneksi, $email, $password) {
    $email = mysqli_real_escape_string($koneksi, $email);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }
    
    return false;
}

// Fungsi untuk mengambil data user berdasarkan ID
function ambilUserById($koneksi, $id) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk update profil user
function updateProfil($koneksi, $id, $data) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $nama = mysqli_real_escape_string($koneksi, $data['nama_lengkap']);
    $email = mysqli_real_escape_string($koneksi, $data['email']);
    $no_telepon = mysqli_real_escape_string($koneksi, $data['no_telepon']);
    
    $query = "UPDATE users SET 
            nama_lengkap = '$nama',
            email = '$email',
            no_telepon = '$no_telepon'
            WHERE id = '$id'";

    return mysqli_query($koneksi, $query);
}

// ==================== FUNGSI ADMIN ====================

// Fungsi untuk login admin
function loginAdmin($koneksi, $username, $password) {
    $username = mysqli_real_escape_string($koneksi, $username);
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);
        
        // Verifikasi password
        if (password_verify($password, $admin['password'])) {
            return $admin;
        }
    }
    
    return false;
}

// ==================== FUNGSI FAVORITE ====================

// Fungsi untuk menambah favorite
function tambahFavorite($koneksi, $user_id, $wisata_id) {
    $user_id = mysqli_real_escape_string($koneksi, $user_id);
    $wisata_id = mysqli_real_escape_string($koneksi, $wisata_id);
    
    $query = "INSERT INTO favorites (user_id, wisata_id) VALUES ('$user_id', '$wisata_id')";
    
    return mysqli_query($koneksi, $query);
}

// Fungsi untuk menghapus favorite
function hapusFavorite($koneksi, $user_id, $wisata_id) {
    $user_id = mysqli_real_escape_string($koneksi, $user_id);
    $wisata_id = mysqli_real_escape_string($koneksi, $wisata_id);
    
    $query = "DELETE FROM favorites WHERE user_id = '$user_id' AND wisata_id = '$wisata_id'";
    
    return mysqli_query($koneksi, $query);
}

// Fungsi untuk mengambil semua favorite user
function ambilFavoriteUser($koneksi, $user_id) {
    $user_id = mysqli_real_escape_string($koneksi, $user_id);
    $query = "SELECT w.* FROM wisata w 
            INNER JOIN favorites f ON w.id = f.wisata_id 
            WHERE f.user_id = '$user_id' 
            ORDER BY f.created_at DESC";
    $result = mysqli_query($koneksi, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

// Fungsi untuk cek apakah wisata sudah difavorite
function cekFavorite($koneksi, $user_id, $wisata_id) {
    $user_id = mysqli_real_escape_string($koneksi, $user_id);
    $wisata_id = mysqli_real_escape_string($koneksi, $wisata_id);
    
    $query = "SELECT * FROM favorites WHERE user_id = '$user_id' AND wisata_id = '$wisata_id'";
    $result = mysqli_query($koneksi, $query);
    
    return mysqli_num_rows($result) > 0;
}

// ==================== FUNGSI HELPER ====================

// Fungsi untuk redirect
function redirect($url) {
    header("Location: $url");
    exit;
}

// Fungsi untuk cek apakah user sudah login
function cekLogin() {
    session_start();
    return isset($_SESSION['user_id']);
}

// Fungsi untuk cek apakah admin sudah login
function cekLoginAdmin() {
    session_start();
    return isset($_SESSION['admin_id']);
}

// Fungsi untuk format tanggal Indonesia
function formatTanggal($tanggal) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    $split = explode('-', date('Y-m-d', strtotime($tanggal)));
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

// Fungsi untuk membuat slug dari string
function buatSlug($string) {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    $string = preg_replace('/[\s-]+/', '-', $string);
    $string = trim($string, '-');
    return $string;
}
?>
