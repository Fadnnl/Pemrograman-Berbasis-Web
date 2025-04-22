<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $stmt = $conn->prepare("UPDATE kuliah_mahasiswa SET nama = ?, jurusan = ?, alamat = ? WHERE npm = ?");
    $stmt->execute([$nama, $jurusan, $alamat, $npm]);

    header("Location: index.php");
    exit;
}

$npm = $_GET['npm'];
$stmt = $conn->prepare("SELECT * FROM kuliah_mahasiswa WHERE npm = ?");
$stmt->execute([$npm]);
$mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Edit Mahasiswa</h1>
    <form method="POST">
        <input type="hidden" name="npm" value="<?= htmlspecialchars($mahasiswa['npm']) ?>">
        Nama: <input type="text" name="nama" value="<?= htmlspecialchars($mahasiswa['nama']) ?>" required><br>
        Jurusan:
        <select name="jurusan" required>
            <option value="Teknik Informatika" <?= $mahasiswa['jurusan'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
            <option value="Sistem Operasi" <?= $mahasiswa['jurusan'] == 'Sistem Operasi' ? 'selected' : '' ?>>Sistem Operasi</option>
        </select><br>
        Alamat: <textarea name="alamat" required><?= htmlspecialchars($mahasiswa['alamat']) ?></textarea><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>