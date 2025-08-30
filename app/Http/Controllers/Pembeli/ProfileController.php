<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Kalau profil belum ada, bikin profil kosong biar gak error
        if (!$user->profile) {
            $user->profile()->create([
                'alamat' => null,
                'no_hp' => null,
            ]);
        }

        // Cek kalau no_hp atau alamat masih kosong → kasih warning
        if (empty($user->profile->no_hp) || empty($user->profile->alamat)) {
            session()->flash('warning', 'Lengkapi biodata Anda terlebih dahulu!');
        }

        return view('pembeli.profile.index', compact('user'));
    }


    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('pembeli.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'no_hp'  => 'required|string|max:20',
            'email_kontak' => 'nullable|email',
            'nama_perusahaan' => 'nullable|string|max:255',
        ], [
            'alamat.required' => 'Alamat tidak boleh kosong.',
            'no_hp.required'  => 'Nomor HP wajib diisi.',
            'no_hp.max'       => 'Nomor HP terlalu panjang, maksimal 20 karakter.',
            'email_kontak.email' => 'Email kontak harus berupa email yang valid.',
        ]);

        // Simpan data profile
        $user = auth()->user();
        $user->profile()->updateOrCreate([], [
            'alamat'          => $request->alamat,
            'no_hp'           => $request->no_hp,
            'email_kontak'    => $request->email_kontak,
            'nama_perusahaan' => $request->nama_perusahaan,
        ]);

        return redirect()->route('pembeli.profile.index')->with('success', 'Biodata berhasil diperbarui.');
    }
}
