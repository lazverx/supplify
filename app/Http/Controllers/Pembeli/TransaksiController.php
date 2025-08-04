<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('produk')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pembeli.transaksi.index', compact('transaksis'));
    }

    public function checkout(Produk $produk)
    {
        return view('pembeli.transaksi.checkout', compact('produk'));
    }

    public function bayar(Request $request, $produkId)
    {
        $produk = Produk::findOrFail($produkId);

        $request->validate([
            'jumlah' => 'required|integer|min:1',
            'alamat_pengiriman' => 'required|string|max:255',
        ]);

        $totalHarga = $produk->harga * $request->jumlah;

        Transaksi::create([
            'user_id'    => Auth::id(),
            'produk_id'  => $produk->id,
            'jumlah'     => $request->jumlah,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'total_harga' => $totalHarga,
            'status'     => 'menunggu pembayaran', // atau 'pending'
        ]);

        return redirect()->route('pembeli.transaksi.index')->with('success', 'Transaksi berhasil dibuat.');
    }
}
