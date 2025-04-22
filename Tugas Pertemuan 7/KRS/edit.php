<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    $stmt = $conn->prepare("UPDATE kuliah_krs SET mahasiswa_npm = ?, matakuliah_kodemk = ? WHERE id = ?");
    $stmt->execute([$mahasiswa_npm, $matakuliah_kodemk, $id]);

    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM kuliah_krs WHERE id = ?");
$stmt->execute([$id]);
$krs = $stmt->fetch(PDO::FETCH_ASSOC);

// Ambil data mahasiswa dan mata kuliah
$mahasiswa_stmt = $conn->prepare("SELECT * FROM kuliah_mahasiswa");
$mahasiswa_stmt->execute();
$mahasiswa = $mahasiswa_stmt->fetchAll(PDO::FETCH_ASSOC);

$matakuliah_stmt = $conn->prepare("SELECT * FROM kuliah_matakuliah");
$matakuliah_stmt->execute();
$matakuliah = $matakuliah_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit KRS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Edit KRS</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($krs['id']) ?>">
        NPM Mahasiswa:
        <select name="mahasiswa_npm" required>
            <?php foreach ($mahasiswa as $row): ?>
                <option value="<?= htmlspecialchars($row['npm']) ?>" <?= $row['npm'] == $krs['mahasiswa_npm'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['nama']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        Kode MK Mata Kuliah:
        <select name="matakuliah_kodemk" required>
            <?php foreach ($matakuliah as $row): ?>
                <option value="<?= htmlspecialchars($row['kodemk']) ?>" <?= $row['kodemk'] == $krs['matakuliah_kodemk'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['nama']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>