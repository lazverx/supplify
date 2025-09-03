<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPenjual = User::where('role', 'penjual')->count();
        $totalProduk = Produk::count();
        $totalPembeli = User::where('role', 'pembeli')->count();

        return view('penjual.dashboard', compact('totalPenjual', 'totalProduk', 'totalPembeli'));
    }
}
