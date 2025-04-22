CREATE DATABASE IF NOT EXISTS db_kuliah;
USE db_kuliah;

CREATE TABLE kuliah_mahasiswa (
    npm CHAR(13) PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    jurusan ENUM('Teknik Informatika', 'Sistem Operasi') NOT NULL,
    alamat TEXT NOT NULL
);

CREATE TABLE kuliah_matakuliah (
    kodemk CHAR(6) PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    jumlah_sks INT(3) NOT NULL
);

CREATE TABLE kuliah_krs (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_npm CHAR(13),
    matakuliah_kodemk CHAR(6),
    FOREIGN KEY (mahasiswa_npm) REFERENCES kuliah_mahasiswa(npm),
    FOREIGN KEY (matakuliah_kodemk) REFERENCES kuliah_matakuliah(kodemk)
);