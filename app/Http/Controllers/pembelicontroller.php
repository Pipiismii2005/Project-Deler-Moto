<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pembelicontroller extends Controller
{
    public function lihatproduk(){
        $produk = Product::all();
        return view('pembeli.produk', compact('produk'));
    }

   public function tambah($id, Request $request)
{
    $produk = Product::findOrFail($id);
    
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'name' => $produk->name,
            'price' => $produk->price,
            'gambar' => $produk->gambar,
            'quantity' => 1
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang');
}
public function hapus($id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }
    return redirect()->back()->with('success', 'Produk dihapus dari keranjang');
}
public function index()
{
    $cart = session()->get('cart', []);
    return view('pembeli.keranjang', compact('cart'));
}

 public function form()
    {
        return view('pembeli.checkout');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'payment_method' => 'required|in:transfer_bank,cod,e-wallet,credit_card'
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang kosong!');
        }

        DB::beginTransaction();
        try {
            $transaction = Transaction::create([
                'user_id' => auth()->id(),
                'total_amount' => collect($cart)->sum(function($item) {
                    return $item['price'] * $item['quantity'];
                }),
                'status' => 'pending',
                'payment_method' => $request->payment_method,
            ]);

            foreach ($cart as $productId => $item) {
                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            session()->forget('cart'); // kosongkan keranjang

            DB::commit();
            return redirect()->route('pesanan.saya')->with('success', 'Checkout berhasil! Transaksi sedang diproses.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Checkout gagal: ' . $e->getMessage());
        }
    }
    public function pesananSaya()
{
    $pesanan = Transaction::with('items.product')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('pembeli.pesanan', compact('pesanan'));
}

}

