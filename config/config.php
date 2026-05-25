<?php
$host = "127.0.0.1";
$user = "root";
$pass = "Virdi702";
$db   = "admin_tools";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>