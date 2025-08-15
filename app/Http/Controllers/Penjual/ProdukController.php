<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::where('user_id', Auth::id())->get();
        return view('penjual.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('penjual.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|integer|min:0',
            'foto' => 'required|image',
            'stok' => 'required|integer',
            'lokasi' => 'required',
        ]);

        $path = $request->file('foto')->store('produks', 'public');

        Produk::create([
            'user_id' => auth()->id(),
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $path,
            'status' => 'pending',
            'stok' => $request->stok,
            'lokasi' => $request->lokasi,
        ]);
     
        return redirect()->back()->with('success', 'Produk berhasil diajukan');
        
    }

    public function edit(Produk $produk)
    {
        // $this->authorize('update', $produk);
        return view('penjual.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        // $this->authorize('update', $produk);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer',
            'lokasi' => 'required|string',
            'foto' => 'nullable|image',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'lokasi' => $request->lokasi,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produks', 'public');
        }

        $produk->update($data);

        return redirect()->back()->with('success', 'Produk berhasil diperbaharui');
    }

    public function log()
    {
        $produks = Produk::where('user_id', Auth::id())->orderByDesc('created_at')->get();
        return view('penjual.produk.log', compact('produks'));
    }



    public function destroy(Produk $produk)
    {
        // $this->authorize('delete', $produk);
        $produk->delete();

        return redirect()->route('penjual.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
