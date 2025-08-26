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
    $penjualId = auth()->id();

    $transaksis = \App\Models\Transaksi::with([
        'pembeli',
        'transaksisProduk.produk' => function ($q) use ($penjualId) {
            $q->where('user_id', $penjualId);
        }
    ])
    ->whereHas('transaksis.produk', function ($q) use ($penjualId) {
        $q->where('user_id', $penjualId);
    })
    ->orderByDesc('created_at')
    ->get();

    return view('penjual.transaksi.index', compact('transaksis'));
}

}
