<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class MarketplaceController extends Controller
{
    public function index(Request $request) {
        // Ambil query pencarian & filter dari request
        $search = $request->input('search');
        $filter_harga = $request->input('filter_harga');
        $filter_stok = $request->input('filter_stok');

        // Query dasar produk dengan status approved
        $query = Produk::where('status', 'approved');

        // 🔍 Pencarian (nama & deskripsi)
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        // 🎯 Filter harga
        if ($filter_harga === 'murah') {
            $query->orderBy('harga', 'asc');
        } elseif ($filter_harga === 'mahal') {
            $query->orderBy('harga', 'desc');
        }

        // 📦 Filter stok
        if ($filter_stok === 'tersedia') {
            $query->where('stok', '>', 0);
        } elseif ($filter_stok === 'habis') {
            $query->where('stok', '=', 0);
        }

        // Pagination (8 produk per halaman)
        $produk = $query->paginate(8);

        // Kirim request agar search/filter tetap ada setelah ganti halaman
        $produk->appends($request->all());

        return view('pembeli.marketplace.index', compact('produk', 'search', 'filter_harga', 'filter_stok'));
    }

    public function show($id) {
        $produk = Produk::where('status', 'approved')->findOrFail($id);
        return view('pembeli.marketplace.show', compact('produk'));
    }
}
