<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda Tangan di Canvas</title>
    <style>
        #canvas {
            border: 1px solid #000;
            cursor: crosshair;
        }
        .container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tanda Tangan di Canvas</h2>
        <canvas id="canvas" width="500" height="200"></canvas>
        <br>
        <button id="clear">Bersihkan</button>
    </div>

   

    <script >
    // Mendapatkan elemen canvas dan context
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

// Variabel untuk melacak apakah pengguna sedang menggambar
let isDrawing = false;

// Menyimpan posisi terakhir saat menggambar
let lastX = 0;
let lastY = 0;

// Fungsi untuk memulai menggambar
function startDrawing(e) {
    isDrawing = true;
    const { offsetX, offsetY } = getCoords(e);
    lastX = offsetX;
    lastY = offsetY;
}

// Fungsi untuk menghentikan menggambar
function stopDrawing() {
    isDrawing = false;
}

// Fungsi untuk menggambar pada canvas
function draw(e) {
    if (!isDrawing) return;

    const { offsetX, offsetY } = getCoords(e);
    ctx.beginPath();
    ctx.moveTo(lastX, lastY); // Menyambung ke titik sebelumnya
    ctx.lineTo(offsetX, offsetY); // Garis ke titik baru
    ctx.stroke();

    lastX = offsetX;
    lastY = offsetY;
}

// Fungsi untuk mendapatkan koordinat, baik untuk mouse maupun touch
function getCoords(e) {
    let offsetX, offsetY;
    if (e.type.startsWith('touch')) {
        // Untuk perangkat touch, kita ambil koordinat dari sentuhan pertama
        offsetX = e.touches[0].clientX - canvas.offsetLeft;
        offsetY = e.touches[0].clientY - canvas.offsetTop;
    } else {
        // Untuk mouse, ambil koordinat offset
        offsetX = e.offsetX;
        offsetY = e.offsetY;
    }
    return { offsetX, offsetY };
}

// Menambahkan event listeners untuk desktop (mouse)
canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mouseup', stopDrawing);
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseout', stopDrawing); // Menghentikan gambar saat keluar dari canvas

// Menambahkan event listeners untuk perangkat mobile (touch)
canvas.addEventListener('touchstart', startDrawing);
canvas.addEventListener('touchend', stopDrawing);
canvas.addEventListener('touchmove', draw);
canvas.addEventListener('touchcancel', stopDrawing);

// Menambahkan event untuk membersihkan canvas
document.getElementById('clear').addEventListener('click', () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height); // Membersihkan canvas
});


    </script>
</body>
</html>
