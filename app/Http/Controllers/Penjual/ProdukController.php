<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        // Ambil keyword dari input form (misalnya name="search")
        $search = $request->input('search');

        // Query produk milik penjual yang login
        $query = Produk::where('user_id', Auth::id());

        // Kalau ada keyword, filter berdasarkan nama_produk atau deskripsi
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        // Ambil hasil query
        $produks = $query->orderByDesc('created_at')->paginate(10);

        // Kirim ke view
        return view('penjual.produk.index', compact('produks', 'search'));
    }


    public function create()
    {
        return view('penjual.produk.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'deskripsi.required'   => 'Deskripsi produk wajib diisi.',
            'harga.required'       => 'Harga produk wajib diisi.',
            'harga.integer'        => 'Harga harus berupa angka.',
            'stok.required'        => 'Stok wajib diisi.',
            'stok.integer'         => 'Stok harus berupa angka.',
            'lokasi.required'      => 'Lokasi wajib diisi.',
            'foto.required'        => 'Foto produk wajib diunggah.',
            'foto.image'           => 'Foto produk harus berupa gambar.',
        ];

        $request->validate([
            'nama_produk' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|integer|min:0',
            'stok'        => 'required|integer',
            'lokasi'      => 'required',
            'foto'        => 'required|image',
        ], $messages);

        $path = $request->file('foto')->store('produks', 'public');

        Produk::create([
            'user_id'     => auth()->id(),
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'lokasi'      => $request->lokasi,
            'foto'        => $path,
            'status'      => 'pending',
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diajukan!');
    }


    public function edit(Produk $produk)
    {
        // $this->authorize('update', $produk);
        return view('penjual.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $messages = [
            'nama_produk.required' => 'Nama produk wajib diisi!',
            'deskripsi.required'   => 'Deskripsi produk wajib diisi!',
            'harga.required'       => 'Harga produk wajib diisi!',
            'harga.integer'        => 'Harga harus berupa angka!',
            'stok.required'        => 'Stok produk wajib diisi!',
            'stok.integer'         => 'Stok harus berupa angka!',
            'lokasi.required'      => 'Lokasi produk wajib diisi!',
            'foto.image'           => 'Foto produk harus berupa gambar!',
        ];

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'required|integer|min:0',
            'stok'        => 'required|integer',
            'lokasi'      => 'required|string',
            'foto'        => 'nullable|image',
        ], $messages);

        $data = [
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'lokasi'      => $request->lokasi,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produks', 'public');
        }

        $produk->update($data);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }


    public function log(Request $request)
    {
        // Ambil keyword dari input form (misalnya name="search")
        $search = $request->input('search');

        // Query produk milik penjual yang login
        $query = Produk::where('user_id', Auth::id());

        // Kalau ada keyword, filter berdasarkan nama_produk atau deskripsi
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

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
