<?php
include '../db.php';

$stmt = $conn->query("SELECT * FROM kuliah_matakuliah");
$matakuliah = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Data Mata Kuliah</h1>
    <a href="create.php">Tambah Mata Kuliah</a>
    <table border="1">
        <tr>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>Jumlah SKS</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($matakuliah as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['kodemk']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['jumlah_sks']) ?></td>
            <td>
                <a href="edit.php?kodemk=<?= $row['kodemk'] ?>" class="edit">Edit</a>
                <a href="delete.php?kodemk=<?= $row['kodemk'] ?>" class="delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>