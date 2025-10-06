-- Database untuk Website Wisata Malang
-- Buat database terlebih dahulu dengan nama: wisata_malang

CREATE DATABASE IF NOT EXISTS wisata_malang;
USE wisata_malang;

-- Tabel untuk data wisata
CREATE TABLE IF NOT EXISTS wisata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    kategori VARCHAR(100) NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    gambar VARCHAR(255) NOT NULL,
    rating DECIMAL(2,1) DEFAULT 5.0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel untuk user/pengguna
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    no_telepon VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk admin
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk favorite wisata
CREATE TABLE IF NOT EXISTS favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    wisata_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (wisata_id) REFERENCES wisata(id) ON DELETE CASCADE,
    UNIQUE KEY unique_favorite (user_id, wisata_id)
);

-- Insert data admin default (password: admin123)
INSERT INTO admin (username, password, nama_lengkap) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator');

-- Insert data wisata contoh
INSERT INTO wisata (nama, kategori, lokasi, deskripsi, gambar, rating) VALUES
('Jawa Timur Park 1', 'Wisata Buatan', 'Kecamatan Batu', 'Jawa Timur Park 1 adalah taman rekreasi dan belajar yang menggabungkan wahana permainan modern dengan edukasi. Tempat ini cocok untuk keluarga yang ingin berlibur sambil belajar tentang sains dan teknologi.', 'jatim-park-1.jpg', 5.0),
('Flora Wisata San Terra', 'Wisata Buatan', 'Kecamatan Batu', 'Taman bunga yang indah dengan berbagai jenis tanaman hias dan spot foto instagramable. Udara sejuk dan pemandangan yang asri membuat tempat ini cocok untuk relaksasi.', 'flora-san-terra.jpg', 5.0),
('Batu Night Spectacular', 'Wisata Buatan', 'Kecamatan Batu', 'Taman hiburan malam dengan berbagai wahana permainan dan pertunjukan lampu yang memukau. Cocok untuk menghabiskan malam bersama keluarga.', 'bns.jpg', 5.0),
('Gunung Bromo', 'Wisata Alam', 'Kecamatan Tumpang', 'Gunung Bromo adalah gunung berapi aktif yang terkenal dengan pemandangan sunrise yang spektakuler. Terletak di Taman Nasional Bromo Tengger Semeru dengan ketinggian 2.614 meter di atas permukaan laut.', 'bromo.jpg', 5.0),
('Pantai Balekambang', 'Wisata Alam', 'Kecamatan Bantur', 'Pantai dengan pasir putih dan pulau kecil yang dihubungkan dengan jembatan. Terdapat pura yang mirip dengan Tanah Lot di Bali.', 'balekambang.jpg', 4.8),
('Coban Rondo', 'Wisata Alam', 'Kecamatan Pujon', 'Air terjun setinggi 84 meter yang dikelilingi hutan pinus. Udara sejuk dan pemandangan alam yang indah membuat tempat ini cocok untuk piknik keluarga.', 'coban-rondo.jpg', 4.7);
