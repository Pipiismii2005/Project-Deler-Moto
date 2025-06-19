@extends('layout.master')

@section('abc')
<div class="container mt-5">
    <h2>Checkout</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <form action="{{ route('checkout.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="address" class="form-label">Alamat Pengiriman</label>
                <textarea name="address" id="address" class="form-control" required>{{ auth()->user()->profile->address ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="transfer_bank">Transfer Bank</option>
                    <option value="cod">Cash on Delivery</option>
                    <option value="e-wallet">E-Wallet</option>
                    <option value="credit_card">Kartu Kredit</option>
                </select>
            </div>

            <h5>Ringkasan Pesanan:</h5>
            <ul class="list-group mb-3">
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $item['name'] }} (x{{ $item['quantity'] }})
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
                </li>
            </ul>

            <button type="submit" class="btn btn-success">Proses Checkout</button>
        </form>
    @else
        <p>Keranjang kamu kosong.</p>
    @endif
</div>
@endsection
