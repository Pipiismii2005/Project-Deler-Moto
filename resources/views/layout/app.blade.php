<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SB Admin 2 - Dashboard</title>

    <!-- Font & Styles -->
    <link href="{{ asset('sb-Admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">
    <link href="{{ asset('sb-Admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SportMart</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    @if (Auth::user()->role === 'penjual')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('penjual.halamanpenjual') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Penjual</span>
        </a>
    </li>
    @elseif (Auth::user()->role === 'admin')
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Admin</span>
        </a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Master Section -->
    @if (Auth::user()->role === 'admin')
    <div class="sidebar-heading">Admin Menu</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.lihatuser') }}">
            <i class="fas fa-users"></i>
            <span>Kelola User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.lihatkategori') }}">
            <i class="fas fa-th-list"></i>
            <span>Kategori</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.lihatproduk') }}">
            <i class="fas fa-box"></i>
            <span>Produk</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.lihatulasan') }}">
            <i class="fas fa-star"></i>
            <span>Ulasan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.lihattransaksi') }}">
            <i class="fas fa-receipt"></i>
            <span>Transaksi</span>
        </a>
    </li>


   <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.lihatprofile') }}">
        <i class="fas fa-id-card"></i>
        <span>Profile Pengguna</span>
    </a>
</li>



    @elseif (Auth::user()->role === 'penjual')
    <div class="sidebar-heading">Penjual Menu</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('penjual.lihatkategori') }}">
            <i class="fas fa-th-list"></i>
            <span>Kategori</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('penjual.lihatproduk') }}">
            <i class="fas fa-box"></i>
            <span>Produk</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.lihatulasan') }}">
            <i class="fas fa-star"></i>
            <span>Ulasan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.lihattransaksi') }}">
            <i class="fas fa-receipt"></i>
            <span>Transaksi</span>
        </a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Logout -->
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="nav-link p-0 m-0">
            @csrf
            <button type="submit" class="btn btn-link text-white w-100 text-left">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
</ul>

        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @yield('konten')
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center">
                        <span>&copy; SportMart 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('sb-Admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-Admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb-Admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb-Admin/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
