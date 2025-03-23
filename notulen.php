<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notulen Rapat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
<?php include 'menu.php'; ?>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Notulen Rapat</h1>
        <form method="POST" action="simpan_notulen.php">
            <input type="hidden" name="id_rapat" value="<?php echo $_GET['id_rapat']; ?>">
            <div class="mb-4">
                <label for="poin_penting" class="block text-sm font-medium text-gray-700">Poin Penting:</label>
                <textarea name="poin_penting" id="poin_penting" required class="mt-1 block w-full p-2 rounded border-gray-300"></textarea>
            </div>
            <div class="mb-4">
                <label for="keputusan" class="block text-sm font-medium text-gray-700">Keputusan:</label>
                <textarea name="keputusan" id="keputusan" required class="mt-1 block w-full p-2 rounded border-gray-300"></textarea>
            </div>
            <div class="mb-4">
                <label for="tindakan" class="block text-sm font-medium text-gray-700">Tindakan:</label>
                <textarea name="tindakan" id="tindakan" required class="mt-1 block w-full p-2 rounded border-gray-300"></textarea>
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 p-2 rounded text-white">Simpan Notulen</button>
        </form>
        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-4 text-indigo-600">Daftar Notulen</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poin Penting</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keputusan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        include 'koneksi.php';
                        $id_rapat = $_GET['id_rapat'];
                        $sql = "SELECT poin_penting, keputusan, tindakan FROM notulen WHERE id_rapat = '$id_rapat'";
                        $result = mysqli_query($koneksi, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-pre-line'>" . $row["poin_penting"]. "</td>";
                                echo "<td class='px-6 py-4 whitespace-pre-line'>" . $row["keputusan"]. "</td>";
                                echo "<td class='px-6 py-4 whitespace-pre-line'>" . $row["tindakan"]. "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' class='px-6 py-4 whitespace-nowrap text-center'>Tidak ada data notulen.</td></tr>";
                        }
                        mysqli_close($koneksi);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>