@extends('layout.app')

@section('konten')
<div class="content-wrapper">
    <div class="col-xl-12 grid-margin stretch-card flex-column">
        <h5 class="mb-4 text-titlecase">Daftar Transaksi</h5>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive pt-3 px-3">
                    <table class="table table-striped project-orders-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama User</th>
                                <th>Total (Rp)</th>
                                <th>Status</th>
                                <th>Metode Pembayaran</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $trx)
                            <tr>
                                <td>{{ $trx->id }}</td>
                                <td>{{ $trx->User->name ?? 'User tidak ditemukan' }}</td>
                                <td>Rp{{ number_format($trx->total_amount, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge 
                                        @if($trx->status == 'pending') bg-warning
                                        @elseif($trx->status == 'completed') bg-success
                                        @else bg-danger @endif">
                                        {{ ucfirst($trx->status) }}
                                    </span>
                                </td>
                                <td>{{ ucwords(str_replace('_', ' ', $trx->payment_method)) }}</td>
                                <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- end content-wrapper -->
@endsection
