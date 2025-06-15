<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM transaksi WHERE id = $id");
    $data = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $nama = $_POST['nama_pelanggan'];
    $telepon = $_POST['no_telepon'];
    $layanan = $_POST['jenis_layanan'];
    $berat = $_POST['berat_kg'];

    $harga_per_kg = match($layanan) {
        'Cuci Kering' => 10000,
        'Cuci Setrika' => 15000,
        'Setrika Saja' => 5000,
        default => 0
    };

    $harga = $berat * $harga_per_kg;

    $conn->query("UPDATE transaksi SET 
        nama_pelanggan='$nama', 
        no_telepon='$telepon',
        jenis_layanan='$layanan', 
        berat_kg=$berat, 
        harga_total=$harga 
        WHERE id = $id");
        

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h3 class="mb-4">Edit Transaksi</h3>

    <form method="POST" class="card p-4 shadow">
        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama_pelanggan" class="form-control" value="<?= $data['nama_pelanggan'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">No. Telepon:</label>
            <input type="text" name="no_telepon" class="form-control" value="<?= $data['no_telepon'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Layanan:</label>
            <select name="jenis_layanan" class="form-select" required>
                <option value="Cuci Kering" <?= $data['jenis_layanan']=='Cuci Kering'?'selected':'' ?>>Cuci Kering</option>
                <option value="Cuci Setrika" <?= $data['jenis_layanan']=='Cuci Setrika'?'selected':'' ?>>Cuci Setrika</option>
                <option value="Setrika Saja" <?= $data['jenis_layanan']=='Setrika Saja'?'selected':'' ?>>Setrika Saja</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Berat (kg):</label>
            <input type="number" name="berat_kg" min="1" class="form-control" value="<?= $data['berat_kg'] ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <br>
        <a href="index.php" class="btn btn-success">Kembali</a>
    </form>
</div>

</body>
</html>
