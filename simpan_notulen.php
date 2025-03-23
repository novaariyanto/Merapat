<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_rapat = $_POST['id_rapat'];
    $poin_penting = $_POST['poin_penting'];
    $keputusan = $_POST['keputusan'];
    $tindakan = $_POST['tindakan'];

    $sql = "INSERT INTO notulen (id_rapat, poin_penting, keputusan, tindakan) VALUES ('$id_rapat', '$poin_penting', '$keputusan', '$tindakan')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: notulen.php?id_rapat=$id_rapat");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>