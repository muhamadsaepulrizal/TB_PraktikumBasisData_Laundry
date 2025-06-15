<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("UPDATE transaksi SET status = 'Selesai' WHERE id = $id");
}

header("Location: index.php");
exit;
?>
