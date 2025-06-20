# Sistem Manajemen Dealer Motor

Aplikasi web berbasis Laravel untuk mengelola operasional dealer motor, mulai dari manajemen produk, transaksi penjualan, hingga pengelolaan pengguna dengan sistem hak akses.

## 🎯 Fitur Utama

- **Autentikasi Pengguna**  
  Registrasi, login, logout dengan dukungan hak akses berdasarkan peran (role).

- **Manajemen Produk (Admin)**  
  Tambah, edit, hapus motor, kelola stok, dan kelola gambar motor.

- **Pemesanan Produk (Customer)**  
  Lihat katalog motor, tambah ke keranjang, ajukan pembelian, dan lacak status transaksi.

- **Manajemen Transaksi (Sales)**  
  Buat dan kelola penjualan serta customer.

- **Manajemen Role dan Akses**  
  Sistem mendukung tiga jenis pengguna:
  - `Admin`: kelola data motor, pengguna, transaksi, dan laporan.
  - `Sales`: input data customer dan kelola transaksi.
  - `Customer`: lihat katalog dan ajukan pembelian.

- **Pencarian Motor**  
  Pencarian berdasarkan nama, merek, atau tipe.

- **Laporan Penjualan (Admin)**  
  Melihat riwayat transaksi, ringkasan pendapatan, dan status pengiriman.

## 🧱 Struktur Database (Singkat)

### Tabel `users`
- Menyimpan data pengguna (admin, sales, customer)
- Field utama: `name`, `email`, `password`, `role`

### Tabel `motorcycles`
- Menyimpan data motor
- Field utama: `merk`, `tipe`, `tahun`, `warna`, `harga`, `stok`

### Tabel `customers` & `sales`
- Menyimpan informasi lanjutan berdasarkan peran
- Relasi ke `users`

### Tabel `transactions`
- Menyimpan data pembelian motor
- Relasi: `customer_id`, `sales_id`, `motorcycle_id`

### Tabel `motorcycle_images`
- Menyimpan gambar motor
- Relasi ke `motorcycles`

## 🔁 Relasi Antar Tabel (ERD Sederhana)

- `users` → `customers` (One-to-One)
- `users` → `sales` (One-to-One)
- `customers` → `transactions` (One-to-Many)
- `sales` → `transactions` (One-to-Many)
- `motorcycles` → `transactions` (One-to-Many)
- `motorcycles` → `motorcycle_images` (One-to-Many)

## 🛠️ Cara Menjalankan

1. Clone repository:
   ```bash
   git clone https://github.com/Pipiismii2005/Project-Deler-Moto.git
   cd Project-Deler-Moto
