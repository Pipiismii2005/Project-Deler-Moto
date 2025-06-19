@extends('layout.app')

@section('konten')
<div class="content-wrapper">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-primary">Selamat Datang, Penjual!</h2>
        <p class="text-center mb-5">Kelola produkmu, pantau transaksi, dan tingkatkan penjualanmu di sini.</p>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-left-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Manajemen Kategori</h5>
                        <p class="card-text">Atur dan klasifikasikan produk agar lebih mudah ditemukan oleh pembeli.</p>
                        <a href="{{ route('penjual.lihatkategori') }}" class="btn btn-outline-primary btn-sm">Lihat Kategori</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-left-success">
                    <div class="card-body">
                        <h5 class="card-title text-success">Manajemen Produk</h5>
                        <p class="card-text">Tambahkan, ubah, dan kelola stok produk dengan mudah.</p>
                        <a href="{{ route('penjual.lihatproduk') }}" class="btn btn-outline-success btn-sm">Lihat Produk</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-left-warning">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Pantau Transaksi</h5>
                        <p class="card-text">Tinjau pesanan masuk dan validasi transaksi pelanggan.</p>
                        <a href="{{ route('admin.lihattransaksi') }}" class="btn btn-outline-warning btn-sm">Lihat Transaksi</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info mt-4" role="alert">
            Tip: Pastikan produkmu selalu tersedia agar pelanggan tidak kecewa. 🚀
        </div>
    </div>
</div>
@endsection
