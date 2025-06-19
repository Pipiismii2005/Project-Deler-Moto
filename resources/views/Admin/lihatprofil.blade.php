@extends('layout.app')

@section('konten')
<div class="content-wrapper">
    <div class="col-xl-12 grid-margin stretch-card flex-column">
        <h5 class="mb-4 text-titlecase">Daftar Profil Pengguna</h5>
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
                                <th>Email</th>
                                <th>No. Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                            <tr>
                                <td>{{ $profile->id }}</td>
                                <td>{{ $profile->User->name ?? '-' }}</td>
                                <td>{{ $profile->User->email ?? '-' }}</td>
                                <td>{{ $profile->phone ?? '-' }}</td>
                                <td>{{ $profile->address ?? '-' }}</td>
                                <td>{{ $profile->birth_date ? \Carbon\Carbon::parse($profile->birth_date)->format('d-m-Y') : '-' }}</td>
                                <td>{{ $profile->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive -->
            </div> <!-- end card -->
        </div>
    </div>
</div>
@endsection
