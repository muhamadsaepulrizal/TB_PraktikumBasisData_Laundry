<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Riwayat Transaksi - Laundry Kinclong</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-4">
    <h2 class="mb-4 text-center">Riwayat Transaksi</h2>
    <a href="index.php" class="btn btn-success mb-3">Kembali ke Halaman Utama</a>

    <div class="table-responsive mb-4">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-secondary text-center">
                <tr>
                    <th>ID</th><th>Nama</th><th>Telepon</th><th>Layanan</th>
                    <th>Berat</th><th>Harga</th><th>Status</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $riwayat = $conn->query("SELECT * FROM riwayat_transaksi ORDER BY id DESC");
            while ($row = $riwayat->fetch_assoc()) {
                echo "<tr>
                    <td class='text-center'>{$row['id']}</td>
                    <td>" . htmlspecialchars($row['nama_pelanggan']) . "</td>
                    <td>" . htmlspecialchars($row['no_telepon']) . "</td>
                    <td>" . htmlspecialchars($row['jenis_layanan']) . "</td>
                    <td class='text-center'>{$row['berat_kg']} kg</td>
                    <td>Rp " . number_format($row['harga_total'], 0, ',', '.') . "</td>
                    <td class='text-center'>{$row['status']}</td>
                    <td class='text-center'>
                        <a href='hapus_final.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Hapus permanen?')\">Hapus</a>
                    </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
        <a href="bersihkan_riwayat.php" class="btn btn-secondary btn-sm" onclick="return confirm('Bersihkan semua riwayat?')">Bersihkan Semua Riwayat</a>
    </div>
</div>
</body>
</html>
