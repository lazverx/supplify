<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() {
        $produks = Produk::where('status', 'pending')->get();
        return view('admin.produk.index', compact('produks'));
    }

    public function show($id) {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }
}
