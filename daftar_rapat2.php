<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rapat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white p-8"> 
    <?php include 'menu.php'; ?>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center text-green-700">Daftar Rapat</h1> 
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-100"> 
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Rapat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Rapat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Rapat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    include 'koneksi.php';
                    $sql = "SELECT id, nama_rapat, tanggal_rapat, jam_rapat FROM rapat";
                    $result = mysqli_query($koneksi, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["nama_rapat"]. "</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["tanggal_rapat"]. "</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["jam_rapat"]. "</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>";

                            echo "<a href='daftar_hadir.php?id_rapat=" . $row["id"] . "' class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2'>Daftar Hadir</a>";

                            echo "<a href='index.php?id_rapat=" . $row["id"] . "' class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2'>Isi Kehadiran</a>";

                            echo "<a href='notulen.php?id_rapat=" . $row["id"] . "' class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2'>Notulen</a>";

                            echo "<button onclick='confirmAction(\"edit\", " . $row["id"] . ")' class='bg-yellow-300 hover:bg-yellow-400 text-gray-800 font-bold py-2 px-4 rounded mr-2'>Edit</button>";

                            echo "<button onclick='confirmAction(\"hapus\", " . $row["id"] . ")' class='bg-red-300 hover:bg-red-400 text-gray-800 font-bold py-2 px-4 rounded'>Hapus</button>";

                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='px-6 py-4 whitespace-nowrap text-center'>Tidak ada data rapat.</td></tr>";
                    }
                    mysqli_close($koneksi);
                    ?>
                </tbody>
            </table>
        </div>
        <div class="mt-6 text-center">
            <a href="tambah_rapat.php" class="bg-green-500 hover:bg-green-700 p-2 rounded text-white">Tambah Rapat Baru</a>
        </div>
    </div>

    <script>
        function confirmAction(action, id) {
            const password = prompt("Masukkan password :");
            if (password === "sekolahdulu") {
                if (action === "edit") {
                    window.location.href = `edit_rapat.php?id=${id}`;
                } else if (action === "hapus") {
                    window.location.href = `hapus_rapat.php?id=${id}`;
                }
            } else {
                alert("Password salah. Aksi dibatalkan.");
            }
        }
    </script>
</body>
</html>