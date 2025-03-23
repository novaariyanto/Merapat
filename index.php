<?php
include 'koneksi.php';

$id_rapat = isset($_GET['id_rapat']) ? $_GET['id_rapat'] : null;

if (!$id_rapat) {
    echo "ID rapat tidak valid.";
    header("Location: daftar_rapat.php");
    exit();
}

$sql_rapat = "SELECT nama_rapat, tanggal_rapat, jam_rapat FROM rapat WHERE id = '$id_rapat'";
$result_rapat = mysqli_query($koneksi, $sql_rapat);

if (mysqli_num_rows($result_rapat) > 0) {
    $row_rapat = mysqli_fetch_assoc($result_rapat);
    $nama_rapat = $row_rapat['nama_rapat'];
    $tanggal_rapat = $row_rapat['tanggal_rapat'];
    $jam_rapat = date('h:i A', strtotime($row_rapat['jam_rapat']));
} else {
    echo "Rapat tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Rapat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
         #signatureCanvas {
            border: 1px solid #ccc;
        }
        #fullscreenCanvasContainer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
        }
        #fullscreenCanvas {
            display: block;
            margin: auto;
            border: 1px solid #fff;
        }
        #closeFullscreen {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #f00;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-green-100 h-screen flex items-center justify-center">
    <div class="bg-white bg-opacity-75 p-8 rounded-lg shadow-lg w-96 text-gray-800">
        <h1 class="text-3xl font-semibold mb-2 text-center text-green-700"><?php echo $nama_rapat; ?></h1>
        <p class="text-sm text-gray-600 mb-4 text-center">
            <?php echo date('d F Y', strtotime($tanggal_rapat)); ?> - <?php echo $jam_rapat; ?>
        </p>
        <form method="POST" action="simpan_kehadiran.php" enctype="multipart/form-data">
            <input type="hidden" name="id_rapat" value="<?php echo $id_rapat; ?>">
            <div class="mb-4">
                <input type="text" name="nama" placeholder="Nama" required class="w-full p-2 rounded bg-gray-200 text-gray-800">
            </div>
            <div class="mb-4">
                <input type="text" name="divisi" placeholder="Divisi" required class="w-full p-2 rounded bg-gray-200 text-gray-800">
            </div>
            <div class="mb-4">
                <select name="jenis_kelamin" required class="w-full p-2 rounded bg-gray-200 text-gray-800">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
          
            <div class="mb-4" style=" overflow: hidden;">
                <label for="signatureCanvas">Tanda Tangan Elektronik:</label>
                <canvas id="signatureCanvas" width="300" height="150" style="border:1px solid #ccc;"></canvas>
                <button type="button" id="clearSignature" class="mt-2 bg-gray-300 hover:bg-gray-400 p-2 rounded text-gray-800">Bersihkan Tanda Tangan</button>
                <input type="hidden" name="signatureData" id="signatureData">
            </div>
            
            <button type="submit" class="w-full bg-green-500 hover:bg-green-700 p-2 rounded text-white">Konfirmasi Kehadiran</button>
        </form>
    </div>
    <script src="script.js"></script>
    <script src="signature.js"></script>
</body>
</html>