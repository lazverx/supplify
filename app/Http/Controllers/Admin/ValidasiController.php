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

        return redirect()->route('admin.produk.index')->with('success', 'Produk disetujui');
    }

    public function reject($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->status = 'rejected';
        $produk->save();

        return redirect()->route('admin.produk.index')->with('error', 'Produk ditolak');
    }

    public function log()
    {
        $produk = Produk::whereIn('status', ['approved', 'rejected'])->latest()->get();
        return view('admin.validasi.log', compact('produk'));
    }
}


