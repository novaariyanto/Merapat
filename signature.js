// Mendapatkan elemen canvas dan context
const canvas = document.getElementById('signatureCanvas');
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

    // Menonaktifkan scroll saat menggambar
    e.preventDefault();
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

    // Menonaktifkan scroll saat menggambar
    e.preventDefault();
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

// Menambahkan event untuk menonaktifkan scroll saat menggambar
canvas.addEventListener('wheel', (e) => {
    e.preventDefault(); // Menonaktifkan scroll dengan mouse
});

document.body.addEventListener('touchmove', (e) => {
    e.preventDefault(); // Menonaktifkan scroll saat menggambar di mobile
}, { passive: false });

// Menambahkan event untuk membersihkan canvas
document.getElementById('clearSignature').addEventListener('click', () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height); // Membersihkan canvas
});
document.querySelector('form').addEventListener('submit', (e) => {
    const signatureData = canvas.toDataURL();
    document.getElementById('signatureData').value = signatureData;
});