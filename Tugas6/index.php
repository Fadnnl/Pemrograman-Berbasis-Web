<?php
// Data bandara
$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000,
];

$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000,
];

$hasil = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maskapai = $_POST['maskapai'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $harga = (int)$_POST['harga'];
    $tanggal = date("d-m-Y");

    $pajak = $bandara_asal[$asal] + $bandara_tujuan[$tujuan];
    $total = $harga + $pajak;

    // Generate nomor maskapai otomatis (contoh random 3 digit)
    $nomor_maskapai = "MSK" . rand(100, 999);

    $hasil = [
        "nomor" => $nomor_maskapai,
        "tanggal" => $tanggal,
        "maskapai" => $maskapai,
        "asal" => $asal,
        "tujuan" => $tujuan,
        "harga" => $harga,
        "pajak" => $pajak,
        "total" => $total,
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas Pertemuan 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background:rgb(184, 203, 223);
        }
        .container {
            max-width: 700px;
        }
        .card {
            border: none;
            border-radius: 16px;
        }
        .table th {
            width: 40%;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">Formulir Pendaftaran Rute Penerbangan</h2>
        <p class="text-muted">Masukkan data penerbangan untuk menghitung total harga tiket</p>
    </div>

    <div class="card shadow p-4">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Maskapai</label>
                <input type="text" name="maskapai" class="form-control" placeholder="Contoh: Garuda Indonesia" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bandara Asal</label>
                <select name="asal" class="form-select" required>
                    <option value="">-- Pilih Bandara Asal --</option>
                    <?php foreach ($bandara_asal as $nama => $pajak): ?>
                        <option value="<?= $nama ?>"><?= $nama ?> (Rp <?= number_format($pajak) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Bandara Tujuan</label>
                <select name="tujuan" class="form-select" required>
                    <option value="">-- Pilih Bandara Tujuan --</option>
                    <?php foreach ($bandara_tujuan as $nama => $pajak): ?>
                        <option value="<?= $nama ?>"><?= $nama ?> (Rp <?= number_format($pajak) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Tiket (Rp)</label>
                <input type="number" name="harga" class="form-control" placeholder="Contoh: 500000" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Simpan Tiket</button>
            </div>
        </form>
    </div>

    <?php if (!empty($hasil)): ?>
        <div class="card shadow mt-5 p-4 bg-white">
            <h4 class="mb-3 text-success">Detail Tiket</h4>
            <table class="table table-bordered">
                <tr><th>Nomor</th><td><?= $hasil['nomor'] ?></td></tr>
                <tr><th>Tanggal</th><td><?= $hasil['tanggal'] ?></td></tr>
                <tr><th>Nama Maskapai</th><td><?= $hasil['maskapai'] ?></td></tr>
                <tr><th>Asal Penerbangan</th><td><?= $hasil['asal'] ?></td></tr>
                <tr><th>Tujuan Penerbangan</th><td><?= $hasil['tujuan'] ?></td></tr>
                <tr><th>Harga Tiket</th><td>Rp <?= number_format($hasil['harga']) ?></td></tr>
                <tr><th>Pajak</th><td>Rp <?= number_format($hasil['pajak']) ?></td></tr>
                <tr class="table-primary"><th>Total Harga Tiket</th><td><strong>Rp <?= number_format($hasil['total']) ?></strong></td></tr>
            </table>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
