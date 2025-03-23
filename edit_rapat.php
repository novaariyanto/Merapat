<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT nama_rapat, tanggal_rapat, jam_rapat FROM rapat WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rapat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <?php include 'menu.php'; ?>
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-4 text-center text-indigo-600">Edit Rapat</h1>
        <form method="POST" action="update_rapat.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-4">
                <label for="nama_rapat" class="block text-sm font-medium text-gray-700">Nama Rapat:</label>
                <input type="text" name="nama_rapat" id="nama_rapat" value="<?php echo $row['nama_rapat']; ?>" required class="mt-1 block w-full p-2 rounded border-gray-300">
            </div>
            <div class="mb-4">
                <label for="tanggal_rapat" class="block text-sm font-medium text-gray-700">Tanggal Rapat:</label>
                <input type="date" name="tanggal_rapat" id="tanggal_rapat" value="<?php echo $row['tanggal_rapat']; ?>" required class="mt-1 block w-full p-2 rounded border-gray-300">
            </div>
            <div class="mb-4">
                <label for="jam_rapat" class="block text-sm font-medium text-gray-700">Jam Rapat:</label>
                <input type="time" name="jam_rapat" id="jam_rapat" value="<?php echo $row['jam_rapat']; ?>" required class="mt-1 block w-full p-2 rounded border-gray-300">
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 p-2 rounded text-white">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>