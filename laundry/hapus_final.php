<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM riwayat_transaksi WHERE id = $id");
}
header("Location: riwayat.php");
exit;
