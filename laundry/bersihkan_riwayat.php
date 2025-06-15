<?php
include 'db.php';
$conn->query("DELETE FROM riwayat_transaksi");
header("Location: riwayat.php");
exit;
