<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class MarketplaceController extends Controller
{
    public function index() {
        $produk = Produk::where('status', 'approved')->latest()->get();
        return view('pembeli.marketplace.index', compact('produk'));
    }

    public function show($id) {
        $produk = Produk::where('status', 'approved')->findOrFail($id);
        return view('pembeli.marketplace.show', compact('produk'));
    }
}
