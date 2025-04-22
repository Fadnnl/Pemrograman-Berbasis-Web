<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../db.php';
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $stmt = $conn->prepare("INSERT INTO kuliah_mahasiswa (npm, nama, jurusan, alamat) VALUES (?, ?, ?, ?)");
    $stmt->execute([$npm, $nama, $jurusan, $alamat]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form method="POST">
        NPM: <input type="text" name="npm" required><br>
        Nama: <input type="text" name="nama" required><br>
        Jurusan:
        <select name="jurusan" required>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Operasi">Sistem Operasi</option>
        </select><br>
        Alamat: <textarea name="alamat" required></textarea><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>