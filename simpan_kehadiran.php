<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_rapat = $_POST['id_rapat'];
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $signatureData = $_POST['signatureData'];

    // Simpan data tanda tangan
    $signatureFileName = uniqid() . '.png';
    $signaturePath = 'signatures/' . $signatureFileName;
    $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
    $signatureData = str_replace(' ', '+', $signatureData);
    $signatureData = base64_decode($signatureData);
    file_put_contents($signaturePath, $signatureData);

    $sql = "INSERT INTO peserta (id_rapat, nama, divisi, jenis_kelamin, tanda_tangan) VALUES ('$id_rapat', '$nama', '$divisi', '$jenis_kelamin', '$signaturePath')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: daftar_hadir.php?id_rapat=$id_rapat");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>