<?php
include '../db.php';

$stmt = $conn->query("
    SELECT krs.id, mahasiswa.nama AS nama_mahasiswa, matakuliah.nama AS nama_matakuliah, matakuliah.jumlah_sks
    FROM kuliah_krs krs
    JOIN kuliah_mahasiswa mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
    JOIN kuliah_matakuliah matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
");
$krs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Data KRS</h1>
    <a href="create.php">Tambah KRS</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Mata Kuliah</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($krs as $index => $row): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($row['nama_mahasiswa']) ?></td>
            <td><?= htmlspecialchars($row['nama_matakuliah']) ?></td>
            <td><?= htmlspecialchars($row['nama_mahasiswa']) ?> Mengambil Mata Kuliah <?= htmlspecialchars($row['nama_matakuliah']) ?> (<?= htmlspecialchars($row['jumlah_sks']) ?> SKS)</td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>