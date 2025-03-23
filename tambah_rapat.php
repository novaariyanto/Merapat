<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rapat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <?php include 'menu.php'; ?>
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-4 text-center text-indigo-600">Tambah Rapat Baru</h1>
        <form method="POST" action="simpan_rapat.php">
            <div class="mb-4">
                <label for="nama_rapat" class="block text-sm font-medium text-gray-700">Nama Rapat:</label>
                <input type="text" name="nama_rapat" id="nama_rapat" required class="mt-1 block w-full p-2 rounded border-gray-300">
            </div>
            <div class="mb-4">
                <label for="tanggal_rapat" class="block text-sm font-medium text-gray-700">Tanggal Rapat:</label>
                <input type="date" name="tanggal_rapat" id="tanggal_rapat" required class="mt-1 block w-full p-2 rounded border-gray-300">
            </div>
            <div class="mb-4">
                <label for="jam_rapat" class="block text-sm font-medium text-gray-700">Jam Rapat:</label>
                <input type="time" name="jam_rapat" id="jam_rapat" required class="mt-1 block w-full p-2 rounded border-gray-300">
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 p-2 rounded text-white">Simpan Rapat</button>
        </form>
    </div>
</body>
</html>