CREATE DATABASE IF NOT EXISTS project_management;
USE project_management;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'mandor', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, role) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

CREATE TABLE pekerja (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_lengkap VARCHAR(100) NOT NULL,
    panggilan VARCHAR(50),
    jabatan VARCHAR(50),
    klasifikasi VARCHAR(50),
    spesifikasi VARCHAR(100),
    no_hp VARCHAR(20),
    level VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE proyek (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_proyek VARCHAR(100) NOT NULL,
    lokasi VARCHAR(100),
    start_date DATE,
    end_date DATE,
    status ENUM('PROSES', 'SELESAI', 'ON PROGRESS') DEFAULT 'PROSES',
    prioritas ENUM('TINGGI', 'SEDANG', 'RENDAH') DEFAULT 'SEDANG',
    budget DECIMAL(15,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE proyek_pekerja (
    id INT PRIMARY KEY AUTO_INCREMENT,
    proyek_id INT,
    pekerja_id INT,
    status_keaktifan ENUM('Aktif', 'Keluar') DEFAULT 'Aktif',
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    upah_harian DECIMAL(10,2),
    FOREIGN KEY (proyek_id) REFERENCES proyek(id),
    FOREIGN KEY (pekerja_id) REFERENCES pekerja(id)
);

CREATE TABLE absensi (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pekerja_id INT,
    tanggal DATE,
    status ENUM('Hadir', 'Sakit', 'Ijin', 'Lembur', 'Setengah Hari'),
    koordinat VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pekerja_id) REFERENCES pekerja(id)
);

CREATE TABLE kasbon (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pekerja_id INT,
    tanggal DATE,
    jumlah DECIMAL(10,2),
    jenis VARCHAR(50),
    keterangan VARCHAR(255),
    status ENUM('belum dipotong', 'sudah dipotong') DEFAULT 'belum dipotong',
    FOREIGN KEY (pekerja_id) REFERENCES pekerja(id)
);
