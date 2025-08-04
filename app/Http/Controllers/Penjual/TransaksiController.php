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
        $transaksis = Transaksi::whereHas('produk', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('produk', 'pembeli')->get();

        return view('penjual.transaksi.index', compact('transaksis'));
    }
}
