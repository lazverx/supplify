<?php

namespace App\Http\Controllers\Pembeli;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiItem;


class TransaksiSimulasiController extends Controller
{
    // Halaman checkout, terima produk
    public function checkout($id)
    {
        $produk = Produk::findOrFail($id);

        // ambil user login + profile (eager loading)
        $user = \App\Models\User::with('profile')->find(Auth::id());

        return view('pembeli.transaksi.checkout', compact('produk', 'user'));
    }

    // Proses pembayaran
    public function bayar(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'nullable|integer|min:1',
            'alamat_pengiriman' => 'required|string|max:255',
        ]);

        $produk = Produk::findOrFail($validated['produk_id']);

        // ambil qty dari request, default 1 kalau tidak ada
        $qty = (int) $request->input('jumlah', 1);

        // cek stok dengan $qty
        if ($produk->stok < $qty) {
            return back()->with('error', 'Stok produk tidak mencukupi.');
        }

        DB::beginTransaction();
        try {
            $qty = $request->input('jumlah', 1); // default 1 kalau tidak ada
            $total_harga = $produk->harga * $qty;

            // Simpan transaksi (header)
            $transaksi = Transaksi::create([
                'produk_id' => $produk->id,                 // kalau schema-mu masih pakai produk_id
                'user_id' => auth()->id(),
                'jumlah' => $qty,
                'total_harga' => $total_harga,
                'alamat_pengiriman' => $validated['alamat_pengiriman'],
                'status' => 'done',
            ]);

            // Simpan detail (1 item)
            TransaksiItem::create([
                'transaksi_id' => $transaksi->id,
                'produk_id'    => $produk->id,
                'qty'          => $qty,
                'harga'        => $produk->harga,           // harga satuan dari DB
                'subtotal'     => $total_harga,
            ]);

            // Kurangi stok sekali saja
            $produk->decrement('stok', $qty);

            DB::commit();

            return redirect()->route('pembeli.transaksi.index', $transaksi->id)
                ->with('success', 'Pembelian berhasil.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memproses transaksi: ' . $e->getMessage());
        }
    }


    // Halaman status transaksi
    public function status(Transaksi $transaksi)
    {
        return view('pembeli.transaksi.status', compact('transaksi'));
    }
}
