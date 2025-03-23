<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_rapat = $_POST['nama_rapat'];
    $tanggal_rapat = $_POST['tanggal_rapat'];
    $jam_rapat = $_POST['jam_rapat'];

    $sql = "UPDATE rapat SET nama_rapat = '$nama_rapat', tanggal_rapat = '$tanggal_rapat', jam_rapat = '$jam_rapat' WHERE id = '$id'";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: daftar_rapat.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>