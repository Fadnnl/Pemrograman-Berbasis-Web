<?php
include '../db.php';

$stmt = $conn->query("SELECT * FROM kuliah_mahasiswa");
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="create.php">Tambah Mahasiswa</a>
    <table border="1">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($mahasiswa as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['npm']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['jurusan']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td>
                <a href="edit.php?npm=<?= $row['npm'] ?>" class="edit">Edit</a>
                <a href="delete.php?npm=<?= $row['npm'] ?>" class="delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>