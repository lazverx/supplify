<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('penjual.profile.edit', compact('profile'));
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
