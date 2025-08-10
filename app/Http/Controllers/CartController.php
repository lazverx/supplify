<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('produk')
            ->where('user_id', Auth::id())
            ->get();

        return view('pembeli.cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'qty'       => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('produk_id', $request->produk_id)
            ->first();

        if ($cartItem) {
            // Update qty jika produk sudah ada di cart
            $cartItem->qty += $request->qty;
            $cartItem->save();
        } else {
            // Tambahkan produk baru ke cart
            CartItem::create([
                'user_id'   => Auth::id(),
                'produk_id' => $request->produk_id,
                'qty'       => $request->qty
            ]);
        }

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function destroy($id)
    {
        CartItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Produk dihapus dari keranjang');
    }

    public function checkout()
    {
        DB::transaction(function () {
            $cartItems = CartItem::with('produk')
                ->where('user_id', Auth::id())
                ->get();

            if ($cartItems->isEmpty()) {
                abort(400, 'Keranjang kosong');
            }

            // Hitung total
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item->produk->harga * $item->qty;
            }

            // Ambil produk pertama di keranjang untuk isi produk_id di tabel transaksis
            $produkPertama = $cartItems->first();

            // Buat transaksi utama
            $transaksi = Transaksi::create([
                'user_id'   => Auth::id(),
                'produk_id' => $produkPertama->produk_id,
                'total'     => $total,
                'status'    => 'done'
            ]);

            // Simpan detail tiap produk di transaksi_items
            foreach ($cartItems as $item) {
                TransaksiItem::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id'    => $item->produk_id,
                    'qty'          => $item->qty,
                    'harga'        => $item->produk->harga,
                    'subtotal'     => $item->produk->harga * $item->qty
                ]);
            }

            // Kosongkan cart setelah checkout
            CartItem::where('user_id', Auth::id())->delete();
        });

        return redirect()
            ->route('pembeli.transaksi.index')
            ->with('success', 'Checkout berhasil');
    }
}
