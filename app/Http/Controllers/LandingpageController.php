<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;


class LandingpageController extends Controller
{
    public function index()
    {
        $produkTerlaris = DB::table('transaksis')
            ->select('produk_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('produk_id')
            ->orderByDesc('total_terjual')
            ->limit(10)
            ->get();

        // Ambil detail produk
        $produkIds = $produkTerlaris->pluck('produk_id');
        $produks = Produk::whereIn('id', $produkIds)->get();

        $totalPenjual = User::where('role', 'penjual')->count();
        $totalProduk = Produk::count();
        $totalPembeli = User::where('role', 'pembeli')->count();

        return view('landing-page', compact('produks', 'totalPenjual', 'totalProduk', 'totalPembeli'));
    }
}
