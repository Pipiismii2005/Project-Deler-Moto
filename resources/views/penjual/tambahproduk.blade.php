@extends('layout.app')

@section('konten')
<div class="content-wrapper">
    <div class="col-xl-6 grid-margin stretch-card flex-column">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Produk</h4>
                        <p class="card-description">
                            Lengkapi informasi produk di bawah ini
                        </p>

                        <form action="{{ route('penjual.simpanproduk') }}" method="POST" enctype="multipart/form-data">
                            @csrf
<div class="form-group mb-3">
    <label for="category_id">Kategori</label>
    <select name="category_id" id="category_id" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategori as $kg)
            <option value="{{ $kg->id }}" {{ old('category_id') == $kg->id ? 'selected' : '' }}>
                {{ $kg->name }}
            </option>
        @endforeach
    </select>
</div>


                            <div class="form-group mb-3">
                                <label for="name">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama produk" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="gambar">Gambar Produk</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Harga produk" step="0.01" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi produk"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="stock_quantity">Stok</label>
                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="Jumlah stok" required>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="{{ route('penjual.lihatproduk') }}" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
