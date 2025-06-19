@extends('layout.master')

@section('abc')
<div class="container mt-5">
    <h2>Daftar Pesanan Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse ($pesanan as $order)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <strong>Transaksi #{{ $order->id }}</strong><br>
                    <small>Tanggal: {{ $order->created_at->format('d M Y H:i') }}</small>
                </div>
                <div>
                    <span class="badge 
                        @if($order->status == 'pending') bg-warning 
                        @elseif($order->status == 'completed') bg-success 
                        @elseif($order->status == 'cancelled') bg-danger 
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group mb-3">
                    @foreach ($order->items as $item)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $item->product->name }} (x{{ $item->quantity }})
                            <span>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
                <p><strong>Total:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ strtoupper($order->payment_method) }}</p>
            </div>
        </div>
    @empty
        <p>Kamu belum memiliki pesanan.</p>
    @endforelse
</div>
@endsection
