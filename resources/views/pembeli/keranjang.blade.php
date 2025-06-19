@extends('layout.master')

@section('abc')
<div class="container mt-5">
    <h2 class="text-center mb-4">Keranjang Belanja</h2>

    @if(session('cart') && count(session('cart')) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $totalHarga = 0; @endphp
            @foreach(session('cart') as $id => $item)
                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $totalHarga += $subtotal;
                @endphp
                <tr>
                    <td><img src="{{ asset('storage/' . $item['gambar']) }}" width="80"></td>
                    <td>{{ $item['name'] }}</td>
                    <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('keranjang.hapus', $id) }}" method="POST">
                            @csrf

                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-end"><strong>Total</strong></td>
                <td colspan="2"><strong>Rp {{ number_format($totalHarga, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('checkout.form') }}" class="btn btn-success">Checkout</a>
    @else
        <p class="text-center">Keranjang masih kosong.</p>
    @endif
</div>
@endsection
