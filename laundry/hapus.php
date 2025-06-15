<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("INSERT INTO riwayat_transaksi SELECT * FROM transaksi WHERE id = $id");
    $conn->query("DELETE FROM transaksi WHERE id = $id");
}

header("Location: index.php");
exit;
?>