<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Edit Biodata</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('penjual.profile.update') }}">
        @csrf
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="w-full border rounded p-2"
                value="{{ old('alamat', $profile->alamat ?? '') }}">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="w-full border rounded p-2"
                value="{{ old('no_hp', $profile->no_hp ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Email Kontak (opsional, untuk perusahaan)</label>
            <input type="email" name="email_kontak" class="w-full border rounded p-2"
                value="{{ old('email_kontak', $profile->email_kontak ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Nama Perusahaan (opsional)</label>
            <input type="text" name="nama_perusahaan" class="w-full border rounded p-2"
                value="{{ old('nama_perusahaan', $profile->nama_perusahaan ?? '') }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</x-app-layout>
