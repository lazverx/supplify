<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;


class ProfileController extends Controller
{
    public function index()
    {
        $penjual = Auth::user();

        // Kalau profil belum ada, bikin profil kosong biar gak error
        if (!$penjual->profile) {
            $penjual->profile()->create([
                'alamat' => null,
                'no_hp' => null,
            ]);
        }

        // Cek kalau no_hp atau alamat masih kosong → kasih warning
        if (empty($user->profile->no_hp) || empty($user->profile->alamat)) {
            session()->flash('warning', 'Lengkapi biodata Anda terlebih dahulu!');
        }

        return view('penjual.profile.index', compact('penjual'));
    }


    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('penjual.profile.edit', compact('profile'));
    }

    public function update(Request $request)
{
    $messages = [
        'alamat.required' => 'Alamat tidak boleh kosong, wajib diisi untuk data perusahaan!',
        'no_hp.required' => 'Nomor HP harus diisi agar pelanggan bisa menghubungi Anda!',
        'email_kontak.required' => 'Email kontak wajib diisi!',
        'nama_perusahaan.required' => 'Nama perusahaan tidak boleh kosong!',
        'email_kontak.email' => 'Format email kontak tidak valid!',
    ];

    $request->validate([
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
        'email_kontak' => 'required|email|max:255',
        'nama_perusahaan' => 'required|string|max:255',
    ], $messages);

    Auth::user()->profile()->updateOrCreate(
        ['user_id' => Auth::id()],
        $request->only('alamat', 'no_hp', 'email_kontak', 'nama_perusahaan')
    );

    return redirect()->back()->with('success', 'Biodata berhasil diperbarui.');
}

}
