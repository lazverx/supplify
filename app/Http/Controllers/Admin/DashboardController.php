<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    $totalProduk = Produk::count();
    $totalPengguna = User::count();
    $totalTransaksi = Transaksi::count();

    // Ambil data penjualan per bulan
    $penjualanData = Transaksi::select(
        DB::raw("MONTH(created_at) as bulan"),
        DB::raw("SUM(total_harga) as total_penjualan")
    )
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get()
        ->keyBy('bulan');

    // Buat array Januari-Desember
    $bulan = [];
    $penjualan = [];
    for ($i = 1; $i <= 12; $i++) {
        $bulan[] = date("F", mktime(0, 0, 0, $i, 1));
        $penjualan[] = $penjualanData[$i]->total_penjualan ?? 0;
    }

    return view('admin.dashboard', compact(
        'totalProduk',
        'totalPengguna',
        'totalTransaksi',
        'bulan',
        'penjualan'
    ));
}
}
