<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Laundry - Laundry</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-4">
    <h2 class="mb-4 text-center">Laundry Admin</h2>

    <div class="card mb-4">
        <div class="card-header">
            <h4 class="mb-0">Harga Layanan per Kg</h4>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cuci Kering: <strong>Rp 10.000</strong>/KG</li>
                <li class="list-group-item">Cuci Setrika: <strong>Rp 15.000</strong>/KG</li>
                <li class="list-group-item">Setrika Saja: <strong>Rp 5.000</strong>/KG</li>
            </ul>
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-header">
            <h4 class="mb-0">Tambah Transaksi</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required />
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" required />
                </div>

                <div class="mb-3">
                    <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                    <select class="form-select" id="jenis_layanan" name="jenis_layanan" required>
                        <option value="" disabled selected>Pilih layanan</option>
                        <option value="Cuci Kering">Cuci Kering</option>
                        <option value="Cuci Setrika">Cuci Setrika</option>
                        <option value="Setrika Saja">Setrika Saja</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="berat_kg" class="form-label">Berat (kg)</label>
                    <input type="number" class="form-control" id="berat_kg" name="berat_kg" min="1" required />
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama_pelanggan'];
        $telepon = $_POST['no_telepon'];
        $layanan = $_POST['jenis_layanan'];
        $berat = $_POST['berat_kg'];
        

        if ($layanan == "Cuci Kering") {
            $harga_per_kg = 10000;
        } elseif ($layanan == "Cuci Setrika") {
            $harga_per_kg = 15000;
        } elseif ($layanan == "Setrika Saja") {
            $harga_per_kg = 5000;
        } else {
            $harga_per_kg = 0;
        }

        $harga_total = $berat * $harga_per_kg;

        $sql = "INSERT INTO transaksi (nama_pelanggan, no_telepon, jenis_layanan, berat_kg, harga_total)
        VALUES ('$nama', '$telepon', '$layanan', $berat, $harga_total)";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Transaksi telah ditambahkan.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error: ' . $conn->error . '</div>';
        }
    }

    $result = $conn->query("SELECT * FROM transaksi");
    ?>

    <h2 class="mb-3">Riwayat Transaksi</h2>
    <a href="riwayat.php" class="btn btn-secondary mt-3">Lihat Riwayat Transaksi</a>
    <br>
    <br>

    <h2 class="mb-3">Daftar Transaksi</h2>
    <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light text-center">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td class="text-center"><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                <td><?= htmlspecialchars($row['no_telepon']) ?></td>
                <td><?= htmlspecialchars($row['jenis_layanan']) ?></td>
                <td class="text-center"><?= $row['berat_kg'] ?> kg</td>
                <td>Rp <?= number_format($row['harga_total'], 0, ',', '.') ?></td>
                <td class="text-center"><?= htmlspecialchars($row['status']) ?></td>
                <td class="text-center">
                    <?php if ($row['status'] != 'Selesai') { ?>
                        <a href="selesai.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm mb-1">Tandai Selesai</a><br>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <?php } else { ?>
                        <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper (optional for dropdowns, modals etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
