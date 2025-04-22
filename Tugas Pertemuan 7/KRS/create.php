<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../db.php';
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    // Cek apakah npm dan kodemk valid
    $stmt = $conn->prepare("SELECT * FROM kuliah_mahasiswa WHERE npm = ?");
    $stmt->execute([$mahasiswa_npm]);
    if (!$stmt->fetch()) {
        die("NPM tidak ditemukan!");
    }

    $stmt = $conn->prepare("SELECT * FROM kuliah_matakuliah WHERE kodemk = ?");
    $stmt->execute([$matakuliah_kodemk]);
    if (!$stmt->fetch()) {
        die("Kode MK tidak ditemukan!");
    }

    $stmt = $conn->prepare("INSERT INTO kuliah_krs (mahasiswa_npm, matakuliah_kodemk) VALUES (?, ?)");
    $stmt->execute([$mahasiswa_npm, $matakuliah_kodemk]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah KRS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tambah KRS</h1>
    <form method="POST">
        NPM Mahasiswa:
        <select name="mahasiswa_npm" required>
            <?php
            $stmt = $conn->query("SELECT * FROM kuliah_mahasiswa");
            $mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mahasiswa as $row) {
                echo "<option value='" . htmlspecialchars($row['npm']) . "'>" . htmlspecialchars($row['nama']) . "</option>";
            }
            ?>
        </select><br>

        Kode MK Mata Kuliah:
        <select name="matakuliah_kodemk" required>
            <?php
            $stmt = $conn->query("SELECT * FROM kuliah_matakuliah");
            $matakuliah = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($matakuliah as $row) {
                echo "<option value='" . htmlspecialchars($row['kodemk']) . "'>" . htmlspecialchars($row['nama']) . "</option>";
            }
            ?>
        </select><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>