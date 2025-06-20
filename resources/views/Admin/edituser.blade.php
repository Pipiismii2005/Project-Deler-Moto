
`@extends('layout.app')


@section('konten')
<div class="content-wrapper">

        
          <div class="row">
              
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Edit User </h4>
                    <p class="card-description">
                      Basic form elements
                    </p>
  
<form class="forms-sample" action="{{ route('admin.updateuser', $user->id) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="code">Nama</label>
        <input type="text" class="form-control" id="code" name="name" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>
    
    <div class="form-group">
        <label for="role">Role</label>
<select class="form-control" id="role" name="role">
    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
    <option value="penjual" {{ $user->role == 'penjual' ? 'selected' : '' }}>Penjual</option>
    <option value="pembeli" {{ $user->role == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
</select>

    </div>



    <button type="submit" class="btn btn-primary me-2" >submit</button>
    <a href="{{ route('admin.lihatuser') }}" class="btn btn-light">Cancel</a>
</form>

                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection