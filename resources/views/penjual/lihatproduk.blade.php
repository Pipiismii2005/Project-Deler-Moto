@extends('layout.app')

@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
    <h5 class="mb-2 text-titlecase mb-4"></h5>
        <div>
       <a href="{{ route('penjual.tambahproduk') }}" class="btn btn-primary">Tambah Produk</a>

             </div>

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
                <th>Aksi</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($produk as $prd)
              <tr>
                <td>{{ $prd->id }}</td>
                <td>{{ $prd->name }}</td>
                <td>{{ $prd->Category->name }}</td>
                <td>
                    <img src="{{ 'storage/'. $prd->gambar }}" alt="Gambar Produk" width="150">
                </td>
                <td>{{ $prd->price }}</td>
                <td>{{ $prd->description }}</td>
                <td>{{ $prd->stock_quantity }}</td>
                                <td>
                  <div class="d-flex align-items-center">
                    <a href="{{ route('penjual.editproduk', $prd->id) }}" class="btn btn-success btn-sm btn-icon-text me-3">
                      <i class="typcn typcn-edit btn-icon-prepend"></i> Edit
                    </a>
                    <form action="{{ route('penjual.deleteproduk', $prd->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                    @csrf
                    @method('DELETE') <!-- ini penting -->
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="typcn typcn-trash btn-icon-prepend"></i> Delete
                    </button>
                    </form>

                  </div>
                </td>
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