# TB_PraktikumBasisData_Laundry

# 🧼 Laundry Admin - Sistem Manajemen Transaksi Laundry

Sistem ini merupakan aplikasi web sederhana yang dibangun menggunakan **PHP** dan **MySQL**, dirancang khusus untuk membantu **admin atau operator laundry** dalam mencatat dan mengelola transaksi layanan laundry harian.

## ✨ Fitur Utama

- ✅ Tambah data transaksi pelanggan
- ✅ Hitung otomatis harga berdasarkan jenis layanan dan berat
- ✅ Edit transaksi yang sudah ada
- ✅ Tandai transaksi sebagai "Selesai"
- ✅ Pindahkan transaksi selesai ke riwayat
- ✅ Tampilkan daftar riwayat transaksi
- ✅ Hapus transaksi dari riwayat satu per satu atau sekaligus

## 🛠 Teknologi yang Digunakan

- PHP (native)
- MySQL / MariaDB
- Bootstrap 5 (untuk tampilan responsif)
- phpMyAdmin (opsional, untuk pengelolaan database)

## 📁 Struktur File

| File / Folder             | Fungsi                                                                 |
|---------------------------|------------------------------------------------------------------------|
| `index.php`               | Halaman utama, tambah & tampilkan transaksi aktif                     |
| `edit.php`                | Edit data transaksi                                                    |
| `selesai.php`             | Tandai transaksi sebagai selesai                                       |
| `hapus.php`               | Pindahkan transaksi selesai ke `riwayat_transaksi`                     |
| `riwayat.php`             | Lihat dan kelola transaksi yang sudah selesai                          |
| `hapus_final.php`         | Hapus transaksi riwayat secara permanen                                |
| `bersihkan_riwayat.php`   | Hapus semua riwayat transaksi sekaligus                                |
| `db.php`                  | Konfigurasi koneksi database                                           |
| `laundry_db.sql`          | File SQL untuk membuat struktur dan data awal database                 |

## ⚠️ Catatan

- Aplikasi ini belum dilengkapi sistem login, sehingga cocok digunakan untuk lingkungan internal (admin/kasir).
- ❗ **Catatan penting:**  
  Default port MySQL pada XAMPP umumnya adalah `3306`, **namun pada proyek ini menggunakan port `8111` karena beberapa alasan**.  
  Pastikan Anda menyesuaikan pengaturan port database Anda jika ingin menjalankan proyek ini secara lokal. 


---

📌 **Project ini dibuat sebagai tugas besar untuk keperluan pembelajaran pada mata kuliah Praktikum Basis Data.**

