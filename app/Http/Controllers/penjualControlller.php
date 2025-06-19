<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;

class penjualControlller extends Controller
{
    public function lihatkategori()
    {
        $kategori = Category::all();
        return view('penjual.lihatkategori', compact('kategori'));
    }
    public function tambahkategori()
    {
        return view('penjual.tambahkategori');
    }
    public function simpankategori(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
        ]);
        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('penjual.lihatkategori');
    }
    public function editkategori($id)
    {
        $kategori = Category::find($id);
        return view('penjual.editkategori', compact('kategori'));
    }
    public function updatekategori(Request $request, $id)
    {
        $kategori = Category::find($id);
        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
        ]);
        $kategori->name = $request->name;
        $kategori->description = $request->description;
        $kategori->update();
        return redirect()->route('penjual.lihatkategori');
    }
    public function deletekategori($id)
    {
        Category::destroy($id);
        return redirect()->route('penjual.lihatkategori');
    }

    public function lihatproduk()
    {
        $produk = Product::with('Category')->get();
        return view('penjual.lihatproduk', compact('produk'));
    }
    public function tambahproduk()
    {
        $produk = Product::all();
        $kategori = Category::all();
        return view('penjual.tambahproduk', compact('kategori', 'produk'));
    }
    public function simpanproduk(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'gambar' => 'required|image|max:2048',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock_quantity' => 'required|integer',
        ]);

        $path = $request->file('gambar')->store('produk', 'public');

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'gambar' => $path,
            'price' => $request->price,
            'description' => $request->description,
            'stock_quantity' => $request->stock_quantity,
        ]);
        return redirect()->route('penjual.lihatproduk');
    }
    public function editproduk($id)
    {
        $produk = Product::find($id);
        $kategori = Category::all();
        return view('penjual.editproduk', compact('produk', 'kategori'));
    }
    public function updateproduk(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        // Ambil semua data kecuali gambar
        $data = $request->only('name', 'category_id', 'price', 'description', 'stock_quantity');

        // Cek apakah ada gambar baru diupload
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk', 'public');
            $data['gambar'] = $path;
        }

        $produk->update($data);

        return redirect()->route('penjual.lihatproduk');
    }

    public function deleteproduk($id)
    {
        $produk = Product::findOrFail($id);
        $produk->delete();
        return redirect()->route('penjual.lihatproduk');
    }
public function lihatulasan()
{
    $ulasan = Review::with('Product', 'User')->get();
    $transaksi = Transaction::with(['user', 'items.product'])
        ->where('status', 'pending')
        ->get();

    return view('admin.lihatulasan', compact('ulasan', 'transaksi'));
}

    public function lihattransaksi()
    {
        $transaksi = Transaction::with('User')->get();
        return view('penjual.lihattransaksi', compact('transaksi'));
    }



public function validasiTransaksi($id)
{
    $transaksi = \App\Models\Transaction::findOrFail($id);

    if ($transaksi->status === 'pending') {
        $transaksi->status = 'completed';
        $transaksi->save();
    }

    return redirect()->back()->with('success', 'Transaksi berhasil divalidasi.');
}
public function batalkanTransaksi($id)
{
    $transaksi = Transaction::findOrFail($id);

    if ($transaksi->status === 'pending') {
        $transaksi->status = 'cancelled';
        $transaksi->save();
    }

    return redirect()->back()->with('success', 'Transaksi berhasil dibatalkan.');
}


}
