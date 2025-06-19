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
                <th>Pembeli</th>
                <th>Nama Produk</th>
                <th>Rating</th>\
                <th>Komen</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ulasan as $ul)
              <tr>

                <td>{{ $ul->User->name }}</td>
                <td>{{ $ul->Product->name }}</td>
                <td>{{ $ul->rating }}</td>
                <td>{{ $ul->comment }}</td>
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