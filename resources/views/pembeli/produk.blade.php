@extends('layout.master')

@section('abc')
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Produk</h2>
    <div class="row">
        @foreach($produk as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 250px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($item->description, 100) }}</p>
                    <p class="card-text fw-bold text-primary">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    <div class="mt-auto d-flex justify-content-between">
                        <form action="{{ route('keranjang.tambah', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Beli</button>
                        </form>
    <form action="{{ route('keranjang.tambah', $item->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
</form>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
