<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function approve($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->status = 'approved';
        $produk->save();

        // return redirect()->route('admin.produk.index')->with('success', 'Produk disetujui');
        return redirect()->back()->with('success', 'Produk berhasil disetujui.');
    }

    public function reject($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->status = 'rejected';
        $produk->save();

        return redirect()->route('admin.produk.index')->with('error', 'Produk ditolak');
    }

    public function log(Request $request)
    {
        $query = Produk::whereIn('status', ['approved', 'rejected']);

        if ($request->has('status') && in_array($request->status, ['approved', 'rejected'])) {
            $query->where('status', $request->status);
        }

        $produk = $query->latest()->paginate(10);

        return view('admin.validasi.log', compact('produk'));
    }
}
