<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   
    public function lihatuser()
    {
        $user = User::all(); 
        return view('admin.lihatuser', compact('user'));
    }

 
    public function tambahuser()
    {
        return view('admin.tambahuser');
    }

    public function simpanuser(Request $request)
    {
   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,penjual,pembeli',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.lihatuser')->with('success', 'User berhasil ditambahkan.');
    }

    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
           'role' => 'required|in:admin,penjual,pembeli',

            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.lihatuser')->with('success', 'User berhasil diperbarui.');
    }

 
    public function deleteuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.lihatuser')->with('success', 'User berhasil dihapus.');
    }

    public function lihatkategori(){
        $kategori = Category::all();
        return view('admin.lihatkategori', compact('kategori'));

    }

    public function lihatproduk(){
        $produk = Product::with('Category')->get();
        return view('admin.lihatproduk', compact('produk'));
    }

    public function lihatulasan(){
        $ulasan = Review::with('Product', 'User')->get();
        return view('admin.lihatulasan', compact('ulasan')); 
    }
public function lihattransaksi() {
    $transaksi = Transaction::with('User')->get();
    return view('admin.lihattransaksi', compact('transaksi'));
}


public function lihatprofile() {
    $profiles = Profile::with('User')->get();
    return view('admin.lihatprofil', compact('profiles'));
}

}
