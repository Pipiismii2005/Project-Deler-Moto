<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pembelicontroller;
use App\Http\Controllers\penjualControlller;
use App\Http\Controllers\tampilkan;
use App\Http\Controllers\testing;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', [tampilkan::class, 'index'])->name('home');
Route::get('/', function () {
    return view('pembeli.prefix');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/halamanadmin', function () {
    return view('Admin.halamanadmin');
})->name('Admin');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth', 'admin')->group(function () {

    Route::get('/users', [AdminController::class, 'lihatuser'])->name('admin.lihatuser');
    Route::get('/users/create', [AdminController::class, 'tambahuser'])->name('admin.tambahuser');
    Route::post('/users', [AdminController::class, 'simpanuser'])->name('admin.simpanuser');
    Route::get('/users/{id}/edit', [AdminController::class, 'edituser'])->name('admin.edituser');
    Route::post('/users/{id}', [AdminController::class, 'updateuser'])->name('admin.updateuser');
    Route::delete('/users/{id}', [AdminController::class, 'deleteuser'])->name('admin.deleteuser');

    Route::get('/lihatkategori', [AdminController::class, 'lihatkategori'])->name('admin.lihatkategori');
    Route::get('/lihatproduk', [AdminController::class, 'lihatproduk'])->name('admin.lihatproduk');
    Route::get('/lihatulasan', [AdminController::class, 'lihatulasan'])->name('admin.lihatulasan');
    Route::get('/lihattransaksi', [AdminController::class, 'lihattransaksi'])->name('admin.lihattransaksi');
    Route::get('/lihatprofile', [AdminController::class, 'lihatprofile'])->name('admin.lihatprofile');
});

Route::middleware('auth', 'pembeli')->group(function () {
    Route::get('/halamanpembeli', [Authcontroller::class, 'pembeli'])->name('halamanpembeli');
    Route::get('/lihatproduct', [pembelicontroller::class, 'lihatproduk'])->name('lihatproduk');
    Route::post('/produk/beli/{id}', [PembeliController::class, 'beli'])->name('produk.beli');

Route::post('/keranjang/tambah/{id}', [pembelicontroller::class, 'tambah'])->name('keranjang.tambah');
Route::get('/keranjang', [pembelicontroller::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/hapus/{id}', [pembelicontroller::class, 'hapus'])->name('keranjang.hapus');
Route::get('/checkout', [pembelicontroller::class, 'form'])->name('checkout.form');
    Route::post('/checkout', [pembelicontroller::class, 'submit'])->name('checkout.submit');

        Route::get('/pesanan-saya', [pembelicontroller::class, 'pesananSaya'])->name('pesanan.saya');

    
    
});
Route::middleware('auth', 'penjual')->group(function () {
   
        Route::get('/halamanpenjual', [AuthController::class, 'penjual'])->name('penjual.halamanpenjual');
    Route::get('/kategori', [penjualControlller::class, 'lihatkategori'])->name('penjual.lihatkategori');
    Route::get('/kategori/create', [penjualControlller::class, 'tambahkategori'])->name('penjual.tambahkategori');
    Route::post('/kategori', [penjualControlller::class, 'simpankategori'])->name('penjual.simpankategori');
    Route::get('/kategori/{id}/edit', [penjualControlller::class, 'editkategori'])->name('penjual.editkategori');
    Route::post('/kategori/{id}', [penjualControlller::class, 'updatekategori'])->name('penjual.updatekategori');
    Route::delete('/kategori/{id}', [penjualControlller::class, 'deletekategori'])->name('penjual.deletekategori');

   
    Route::get('/produk', [penjualControlller::class, 'lihatproduk'])->name('penjual.lihatproduk');
    Route::get('/produk/create', [penjualControlller::class, 'tambahproduk'])->name('penjual.tambahproduk');
    Route::post('/produk', [penjualControlller::class, 'simpanproduk'])->name('penjual.simpanproduk');
    Route::get('/produk/{id}/edit', [penjualControlller::class, 'editproduk'])->name('penjual.editproduk');
    Route::post('/produk/update/{id}', [penjualControlller::class, 'updateproduk'])->name('penjual.updateproduk');
    Route::delete('/produk/{id}', [penjualControlller::class, 'deleteproduk'])->name('penjual.deleteproduk');
    Route::get('/lihatulasan', [penjualControlller::class, 'lihatulasan'])->name('admin.lihatulasan');
    Route::get('/lihattransaksi', [penjualControlller::class, 'lihattransaksi'])->name('admin.lihattransaksi');

    Route::post('/penjual/transaksi/validasi/{id}', [penjualControlller::class, 'validasiTransaksi'])->name('penjual.validasi.transaksi');
    Route::post('/penjual/transaksi/validasi/{id}', [penjualControlller::class, 'validasiTransaksi'])->name('penjual.validasi.transaksi');
Route::post('/penjual/transaksi/batalkan/{id}', [penjualControlller::class, 'batalkanTransaksi'])->name('penjual.batalkan.transaksi');


});
Route::middleware('tamu')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login/submit', [AuthController::class, 'submitregister'])->name('submitregister');
    Route::post('/register/submit', [AuthController::class, 'submitlogin'])->name('submitlogin');
});

Route::get('/testing', [testing::class, 'apa'])->name('testing');

Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi_tampil');


