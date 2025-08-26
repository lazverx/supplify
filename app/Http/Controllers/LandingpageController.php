<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
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

    return view('landing-page', compact('produks'));
}
}
