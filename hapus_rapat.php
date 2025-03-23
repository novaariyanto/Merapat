<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM rapat WHERE id = '$id'";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: daftar_rapat.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    echo "ID rapat tidak ditemukan.";
}
?>