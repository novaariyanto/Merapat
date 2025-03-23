<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hadir Rapat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>
<body class="bg-gray-100 p-8">
    <?php include 'menu.php'; ?>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Daftar Hadir Rapat</h1>
        <div class="mb-4 text-center">
            <a href="index.php?id_rapat=<?php echo $_GET['id_rapat']; ?>" class="bg-blue-600 hover:bg-blue-700 p-2 rounded text-white">Isi Kehadiran (Absen)</a>
            <button onclick="exportToExcel()" class="bg-green-600 hover:bg-green-700 p-2 rounded text-white ml-2">Ekspor ke Excel</button>
        </div>
        <div class="overflow-x-auto">
            <table id="daftarHadirTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanda Tangan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Hadir</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    include 'koneksi.php';
                    $id_rapat = $_GET['id_rapat'];
                    $sql = "SELECT nama, divisi, jenis_kelamin, tanda_tangan, waktu_hadir FROM peserta WHERE id_rapat = '$id_rapat'";
                    $result = mysqli_query($koneksi, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["nama"] . "</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["divisi"] . "</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["jenis_kelamin"] . "</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'><img src='" . $row["tanda_tangan"] . "' class='h-12'></td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["waktu_hadir"] . "</td>";
                                
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='px-6 py-4 whitespace-nowrap text-center'>Tidak ada data kehadiran.</td></tr>";
                    }
                    mysqli_close($koneksi);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function exportToExcel() {
            const table = document.getElementById('daftarHadirTable');
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Daftar Hadir');
            XLSX.writeFile(wb, 'daftar_hadir_<?php echo $_GET['id_rapat']; ?>.xlsx');
        }
    </script>
</body>
</html>