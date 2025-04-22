<?php
include '../db.php';

$npm = $_GET['npm'];
$stmt = $conn->prepare("DELETE FROM kuliah_mahasiswa WHERE npm = ?");
$stmt->execute([$npm]);

header("Location: index.php");
exit;
?>