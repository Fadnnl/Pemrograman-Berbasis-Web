<?php
include '../db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM kuliah_krs WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>