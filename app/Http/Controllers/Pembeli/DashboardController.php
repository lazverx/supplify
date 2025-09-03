<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\User;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ambil 10 produk terlaris (berdasar jumlah terjual)
        $terlaris = DB::table('transaksis')
            ->select('produk_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('produk_id')
            ->orderByDesc('total_terjual')
            ->limit(10)
            ->pluck('total_terjual', 'produk_id'); // key=produk_id, value=total

        $ids = $terlaris->keys()->all();

        // ambil detail produk + jaga urutan sesuai ranking terlaris
        $produks = collect();
        if (!empty($ids)) {
            $idsCsv = implode(',', $ids); // MySQL
            $produks = Produk::whereIn('id', $ids)
                ->orderByRaw("FIELD(id, $idsCsv)")
                ->get();
        }

        $totalPenjual = User::where('role', 'penjual')->count();
        $totalProduk = Produk::count();
        $totalPembeli = User::where('role', 'pembeli')->count();

        return view('pembeli.dashboard', compact('produks', 'totalPenjual', 'totalProduk', 'totalPembeli' ));
    }
}
