<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
{
    $transaksis = Transaksi::whereHas('transaksis.produk', function ($query) {
        $query->where('user_id', auth()->id());
    })
    ->with([
        'pembeli',
        'transaksis.produk'
    ])
    ->get();

    return view('penjual.transaksi.index', compact('transaksis'));
}

}
