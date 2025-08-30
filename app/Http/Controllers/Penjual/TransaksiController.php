<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function index()
    {
        // Ambil transaksi penjual dengan pagination
        $transaksis = Transaksi::whereHas('transaksisProduk.produk', function ($q) {
            $q->where('user_id', Auth::id());
        })
            ->with(['transaksisProduk.produk', 'pembeli'])
            ->latest()
            ->paginate(10); // tampilkan 10 data per halaman

        return view('penjual.transaksi.index', compact('transaksis'));
    }


    public function exportPdf()
    {
        $transaksis = Transaksi::whereHas('transaksisProduk.produk', function ($q) {
            $q->where('user_id', Auth::id());
        })->with(['transaksisProduk.produk', 'pembeli'])->latest()->get();

        $pdf = Pdf::loadView('penjual.transaksi.pdf', compact('transaksis'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('riwayat-transaksi.pdf');
    }
}
