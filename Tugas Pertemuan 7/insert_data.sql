INSERT INTO kuliah_mahasiswa (npm, nama, jurusan, alamat) VALUES
('1234567890123', 'Siska Putri', 'Teknik Informatika', 'Jl. Contoh No. 1'),
('9876543210987', 'Ujang Aziz', 'Sistem Operasi', 'Jl. Contoh No. 2'),
('1112223334445', 'Veronica Setyano', 'Teknik Informatika', 'Jl. Contoh No. 3'),
('5556667778889', 'Rizka Nurmala Putri', 'Sistem Operasi', 'Jl. Contoh No. 4'),
('2223334445556', 'Eren Putra', 'Teknik Informatika', 'Jl. Contoh No. 5'),
('6667778889990', 'Putra Abdul Rachman', 'Sistem Operasi', 'Jl. Contoh No. 6'),
('3334445556667', 'Rahmat Andriyadi', 'Teknik Informatika', 'Jl. Contoh No. 7'),
('7778889990001', 'Ayu Puspitasari', 'Sistem Operasi', 'Jl. Contoh No. 8'),
('4445556667778', 'Putri Ayuni', 'Teknik Informatika', 'Jl. Contoh No. 9'),
('8889990001112', 'Andri Muhammad', 'Sistem Operasi', 'Jl. Contoh No. 10');

INSERT INTO kuliah_matakuliah (kodemk, nama, jumlah_sks) VALUES
('MK001', 'Basis Data', 3),
('MK002', 'Pemrograman Berbasis Web', 3),
('MK003', 'Algoritma dan Struktur Data', 3),
('MK004', 'Kajian Jurnal Informatika', 2),
('MK005', 'Basis Data', 3),
('MK006', 'Pemrograman Berbasis Web', 3),
('MK007', 'Algoritma dan Struktur Data', 3);

INSERT INTO kuliah_krs (mahasiswa_npm, matakuliah_kodemk) VALUES
('1234567890123', 'MK001'), -- Siska Putri - Basis Data
('9876543210987', 'MK002'), -- Ujang Aziz - Pemrograman Berbasis Web
('1112223334445', 'MK001'), -- Veronica Setyano - Basis Data
('5556667778889', 'MK003'), -- Rizka Nurmala Putri - Algoritma dan Struktur Data
('2223334445556', 'MK004'), -- Eren Putra - Kajian Jurnal Informatika
('6667778889990', 'MK001'), -- Putra Abdul Rachman - Basis Data
('3334445556667', 'MK001'), -- Rahmat Andriyadi - Basis Data
('7778889990001', 'MK002'), -- Ayu Puspitasari - Pemrograman Berbasis Web
('4445556667778', 'MK002'), -- Putri Ayuni - Pemrograman Berbasis Web
('8889990001112', 'MK003'); -- Andri Muhammad - Algoritma dan Struktur Data