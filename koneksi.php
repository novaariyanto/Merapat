<?php
$host = "localhost"; // Ganti jika host database berbeda
$username = "toor"; // Ganti dengan username database Anda
$password = "Toor100%"; // Ganti dengan password database Anda
$database = "db_absen";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>