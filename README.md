# Aplikasi Rapat

Aplikasi web ini dirancang untuk memudahkan pengelolaan rapat dan absensi peserta. Aplikasi ini memungkinkan pengguna untuk:

* Membuat dan mengelola daftar rapat.
* Mengelola absensi peserta rapat.
* Menggunakan tanda tangan elektronik untuk konfirmasi kehadiran.
* Membuat dan mengelola notulen rapat.

## Fitur Utama

* **Daftar Rapat**: Menampilkan daftar rapat yang akan atau telah dilaksanakan.
* **Absensi Rapat**: Formulir absensi yang mudah digunakan untuk peserta rapat.
* **Tanda Tangan Elektronik**: Fitur tanda tangan elektronik menggunakan `canvas` untuk konfirmasi kehadiran.
* **Notulen Rapat**: Fitur untuk mencatat dan menyimpan notulen rapat.
* **Responsif**: Desain responsif yang dapat diakses melalui perangkat desktop maupun mobile.

## Teknologi yang Digunakan

* **HTML**: Struktur dasar halaman web.
* **CSS (Tailwind CSS)**: Styling halaman web untuk tampilan yang menarik dan responsif.
* **JavaScript**: Interaksi dan logika aplikasi, termasuk fitur tanda tangan elektronik.
* **PHP**: Logika sisi server untuk pengelolaan data.
* **MySQL**: Database untuk menyimpan data rapat, absensi, dan notulen.

## Instalasi

1.  **Clone Repository**:
    ```bash
    git clone https://github.com/novaariyanto/Merapat.git
    ```
2.  **Konfigurasi Database**:
    * Buat database MySQL dengan nama yang sesuai.
    * Impor file `koneksi.php` ke database Anda.
    * Sesuaikan konfigurasi koneksi database di file `koneksi.php`.
3.  **Setup Server**:
    * Letakkan folder aplikasi di direktori `htdocs` (jika menggunakan XAMPP) atau direktori server web Anda.
    * Akses aplikasi melalui browser.

## Struktur Folder

```
aplikasi-rapat/
├── koneksi.php
├── daftar_rapat.php
├── simpan_kehadiran.php
├── notulen.php
├── script.js
├── signature.js
└── ... (file lainnya)
```

* `koneksi.php`: File koneksi ke database MySQL.
* `daftar_rapat.php`: Halaman untuk menampilkan daftar rapat.
* `simpan_kehadiran.php`: File untuk menyimpan data absensi ke database.
* `notulen.php`: File untuk mengelola data notulen rapat.
* `script.js`: File JavaScript untuk interaksi halaman.
* `signature.js`: File JavaScript untuk fitur tanda tangan elektronik.

## Penggunaan

1.  **Daftar Rapat**:
    * Akses halaman `daftar_rapat.php` untuk melihat daftar rapat.
2.  **Absensi Rapat**:
    * Klik pada rapat yang ingin Anda absensi.
    * Isi formulir absensi dan tanda tangani pada `canvas`.
    * Klik "Konfirmasi Kehadiran" untuk menyimpan data absensi.
3.  **Notulen Rapat**:
    * Akses halaman `notulen.php` untuk melihat dan mengelola notulen rapat.
    * Tambahkan, edit, atau hapus notulen rapat sesuai kebutuhan.

## Kontribusi

Jika Anda ingin berkontribusi pada aplikasi ini, silakan fork repository dan buat pull request.

## Lisensi


---
