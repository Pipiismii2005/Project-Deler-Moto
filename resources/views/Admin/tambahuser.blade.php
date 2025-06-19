@extends('layout.app')


@section('konten')
<div class="content-wrapper">

    <div class="col-xl-6 grid-margin stretch-card flex-column">
              <h5 class="mb-2 text-titlecase mb-4">Tambah User</h5>
            
            
          </div>
        
          <div class="row">
              
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Tambah User </h4>
                    <p class="card-description">
                      Basic form elements
                    </p>
  
<form class="forms-sample" action="{{ route('admin.simpanuser') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="code">Nama</label>
        <input type="text" class="form-control" id="code" name="name">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role">
            <option value="admin">Admin</option>
            <option value="penjual">Penjual</option>
            <option value="pembeli">Pembeli</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <a href="{{ route('admin.lihatuser') }}" class="btn btn-light">Cancel</a>
</form>

                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection