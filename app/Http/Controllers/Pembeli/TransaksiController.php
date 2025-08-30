<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['transaksis.produk'])
        ->where('user_id', Auth::id())
        ->latest()
        ->paginate(10);


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

        // Cek stok cukup
        if ($request->jumlah > $produk->stok) {
            return back()->with('error', 'Stok tidak mencukupi. Sisa stok: ' . $produk->stok . ' Kg');
        }

        // Hitung total harga
        $totalHarga = $produk->harga * $request->jumlah;

        // Kurangi stok dan buat transaksi dalam 1 transaksi DB
        DB::transaction(function () use ($request, $produk, $totalHarga) {
            // Kurangi stok
            $produk->stok -= $request->jumlah;
            $produk->save();

            // Simpan transaksi
            Transaksi::create([
                'user_id'    => Auth::id(),
                'produk_id'  => $produk->id,
                'jumlah'     => $request->jumlah,
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'total_harga' => $totalHarga,
                'status'     => 'waiting',
            ]);
        });

        return redirect()->route('pembeli.transaksi.index')->with('success', 'Transaksi berhasil dibuat.');
    }
}
