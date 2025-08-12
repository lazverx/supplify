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
            $user->profile->create([
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
            'no_hp' => 'required|string|max:20',
            'email_kontak' => 'nullable|email|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
        ]);

        Auth::user()->profile->updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only('alamat', 'no_hp', 'email_kontak', 'nama_perusahaan')
        );

        return redirect()->back()->with('success', 'Biodata berhasil diperbarui.');
    }
}
