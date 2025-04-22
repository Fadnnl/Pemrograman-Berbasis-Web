<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $stmt = $conn->prepare("UPDATE kuliah_matakuliah SET nama = ?, jumlah_sks = ? WHERE kodemk = ?");
    $stmt->execute([$nama, $jumlah_sks, $kodemk]);

    header("Location: index.php");
    exit;
}

$kodemk = $_GET['kodemk'];
$stmt = $conn->prepare("SELECT * FROM kuliah_matakuliah WHERE kodemk = ?");
$stmt->execute([$kodemk]);
$matakuliah = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Edit Mata Kuliah</h1>
    <form method="POST">
        <input type="hidden" name="kodemk" value="<?= htmlspecialchars($matakuliah['kodemk']) ?>">
        Nama Mata Kuliah: <input type="text" name="nama" value="<?= htmlspecialchars($matakuliah['nama']) ?>" required><br>
        Jumlah SKS: <input type="number" name="jumlah_sks" value="<?= htmlspecialchars($matakuliah['jumlah_sks']) ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>