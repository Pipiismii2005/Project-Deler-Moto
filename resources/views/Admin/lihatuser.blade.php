@extends('layout.app')

@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
    
   
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="table-responsive pt-3">
          <table class="table table-striped project-orders-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $us)
              <tr>
                <td>{{ $us->id }}</td>
                <td>{{ $us->name }}</td>
                <td>{{ $us->email }}</td>
                <td>{{ $us->password }}</td>
                <td>{{ $us->role }}</td>
  
                <td>
                  <div class="d-flex align-items-center">
                    <a href="{{ route('admin.edituser', $us->id) }}" class="btn btn-success btn-sm btn-icon-text me-3">
                      <i class="typcn typcn-edit btn-icon-prepend"></i> Edit
                    </a>
                    <form action="{{ route('admin.deleteuser', $us->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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