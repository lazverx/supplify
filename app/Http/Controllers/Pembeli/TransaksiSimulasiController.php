<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk; 
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class TransaksiSimulasiController extends Controller
{
    public function bayar(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
    $user = Auth::user();

    // Simulasi input jumlah dan alamat
    $jumlah = $request->input('jumlah', 1);
    $alamat = $request->input('alamat_pengiriman', 'Alamat default pembeli');

    $total = $produk->harga * $jumlah;

    // Simpan transaksi ke DB
    $transaksi = Transaksi::create([
        'produk_id' => $produk->id,
        'user_id' => $user->id,
        'jumlah' => $jumlah,
        'total_harga' => $total,
        'alamat_pengiriman' => $alamat,
        'status' => 'done', // atau bisa 'pending' dulu
    ]);

    return redirect()->route('pembeli.transaksi.index')->with('success', 'Simulasi transaksi berhasil!');
    }

    public function status($id)
    {
        $produk = Produk::findOrFail($id);

        return view('pembeli.transaksi.status', compact('produk'));
    }
}
