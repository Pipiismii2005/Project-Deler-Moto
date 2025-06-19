@extends('layout.app')


@section('konten')
<div class="content-wrapper">

        
          <div class="row">
              
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Tambah Kategori </h4>
                    <p class="card-description">
                      Basic form elements
                    </p>
  
<form class="forms-sample" action="{{ route('penjual.simpankategori') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="code">Nama</label>
        <input type="text" class="form-control" id="code" name="name">
    </div>
    <div class="form-group">
        <label for="description">Deskripsi</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>



    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <a href="{{ route('admin.lihatuser') }}" class="btn btn-light">Cancel</a>
</form>

                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection