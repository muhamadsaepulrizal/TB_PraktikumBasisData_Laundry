<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$port = 8111;
$dbname = 'laundry_db';

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
