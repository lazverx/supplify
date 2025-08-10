<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;

class TransaksiSimulasiController extends Controller
{
    // Halaman checkout, terima produk
    public function checkout(Produk $produk)
    {
        return view('pembeli.transaksi.checkout', compact('produk'));
    }

    // Proses pembayaran
    public function bayar(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
            'alamat_pengiriman' => 'required|string|max:255',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        // Cek stok sebelum diproses
        if ($produk->stok < $request->jumlah) {
            return back()->with('error', 'Stok produk tidak mencukupi.');
        }

        $total_harga = $produk->harga * $request->jumlah;

        // Simpan transaksi
        $transaksi = Transaksi::create([
            'produk_id' => $produk->id,
            'user_id' => auth()->id(),
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'status' => 'done',
        ]);

        // Kurangi stok produk
        $produk->decrement('stok', $request->jumlah);

        return redirect()->route('pembeli.transaksi.status', $transaksi->id);
    }


    // Halaman status transaksi
    public function status(Transaksi $transaksi)
    {
        return view('pembeli.transaksi.status', compact('transaksi'));
    }
}
