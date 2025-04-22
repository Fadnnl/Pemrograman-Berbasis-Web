<?php
include '../db.php';

$kodemk = $_GET['kodemk'];
$stmt = $conn->prepare("DELETE FROM kuliah_matakuliah WHERE kodemk = ?");
$stmt->execute([$kodemk]);

header("Location: index.php");
exit;
?>