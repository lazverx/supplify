<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class LogTransaksiController extends Controller
{
    public function index(Request $request)
    {
        // ambil semua penjual (role = penjual)
        $penjuals = User::where('role', 'penjual')->get();

        $logs = TransaksiItem::with(['transaksi.pembeli', 'produk.penjual'])
            ->when($request->penjual_id, function ($query) use ($request) {
                $query->whereHas('produk.penjual', function ($q) use ($request) {
                    $q->where('id', $request->penjual_id);
                });
            })
            ->orderByRaw('CASE WHEN qty > 1 THEN 1 ELSE 0 END DESC')
            ->orderBy('created_at', 'desc')
            ->paginate(10) // pagination
            ->appends($request->all()); // biar filter tetap kebawa

        return view('admin.transaksi.log', compact('logs', 'penjuals'));
    }

    public function exportPdf(Request $request)
    {
        $penjualId = $request->input('penjual_id');

        $logs = TransaksiItem::with(['transaksi.pembeli', 'produk.penjual'])
            ->when($penjualId, function ($query) use ($penjualId) {
                $query->whereHas('produk.penjual', function ($q) use ($penjualId) {
                    $q->where('id', $penjualId);
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = Pdf::loadView('admin.log-transaksi.pdf', compact('logs', 'penjualId'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('log_transaksi.pdf');
    }
}
