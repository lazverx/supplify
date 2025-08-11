<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;

class LogTransaksiController extends Controller
{
    public function index()
    {
        $logs = TransaksiItem::with(['transaksi.pembeli', 'produk.penjual'])
            ->orderByRaw('CASE WHEN qty > 1 THEN 1 ELSE 0 END DESC')
            ->orderBy('created_at', 'desc')
            ->get();


        return view('admin.transaksi.log', compact('logs'));
    }
}
