@extends('layout.app')

@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
    <h5 class="mb-2 text-titlecase mb-4">Ini Tabel</h5>

  </div>
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="table-responsive pt-3">
          <table class="table table-striped project-orders-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Nama Kategori</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Stok</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($produk as $prd)
              <tr>
                <td>{{ $prd->id }}</td>
                <td>{{ $prd->name }}</td>
                <td>{{ $prd->Category->name }}</td>
                <td>
                    <img src="{{ 'honda2.png'. $prd->gambar }}" alt="Gambar Produk" width="150">
                </td>
                <td>{{ $prd->price }}</td>
                <td>{{ $prd->description }}</td>
                <td>{{ $prd->stock_quantity }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection