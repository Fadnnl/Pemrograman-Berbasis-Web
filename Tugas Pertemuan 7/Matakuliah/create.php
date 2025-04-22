<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../db.php';
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $stmt = $conn->prepare("INSERT INTO kuliah_matakuliah (kodemk, nama, jumlah_sks) VALUES (?, ?, ?)");
    $stmt->execute([$kodemk, $nama, $jumlah_sks]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tambah Mata Kuliah</h1>
    <form method="POST">
        Kode MK: <input type="text" name="kodemk" required><br>
        Nama Mata Kuliah: <input type="text" name="nama" required><br>
        Jumlah SKS: <input type="number" name="jumlah_sks" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>