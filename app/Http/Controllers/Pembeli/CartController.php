<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
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

    public function checkout(Request $request)
    {
        DB::transaction(function () use ($request) {
            $cartItems = CartItem::with('produk')
                ->where('user_id', Auth::id())
                ->get();

            if ($cartItems->isEmpty()) {
                abort(400, 'Keranjang kosong');
            }

            // Hitung total & total qty
            $total = 0;
            $totalQty = 0;
            foreach ($cartItems as $item) {
                // Validasi stok per item
                if ($item->produk->stok < $item->qty) {
                    abort(400, 'Stok tidak mencukupi untuk produk: ' . $item->produk->nama_produk);
                }
                $total += $item->produk->harga * $item->qty;
                $totalQty += $item->qty;
            }

            // Ambil produk pertama (kalau schema transaksis masih memerlukan produk_id)
            $produkPertama = $cartItems->first();

            // Ambil alamat jika dikirim via request atau pakai alamat user (opsional)
            $alamat = $request->input('alamat_pengiriman') ?? (Auth::user()->alamat ?? null);

            // Buat transaksi header
            $transaksi = Transaksi::create([
                'produk_id' => $produkPertama ? $produkPertama->produk_id : null, // isi jika wajib di DB
                'user_id' => Auth::id(),
                'jumlah' => $totalQty,
                'total_harga' => $total,
                // 'alamat_pengiriman' => $alamat,
                'status' => 'done',
            ]);

            // Simpan setiap item ke transaksi_items dan kurangi stok tiap item ONCE
            foreach ($cartItems as $item) {
                TransaksiItem::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id'    => $item->produk_id,
                    'qty'          => $item->qty,
                    'harga'        => $item->produk->harga,
                    'subtotal'     => $item->produk->harga * $item->qty,
                ]);

                // kurangi stok sekali untuk item ini
                $item->produk->decrement('stok', $item->qty);
            }

            // Kosongkan cart setelah berhasil
            CartItem::where('user_id', Auth::id())->delete();
        });

        return redirect()
            ->route('pembeli.transaksi.index')
            ->with('success', 'Checkout berhasil');
    }
}
