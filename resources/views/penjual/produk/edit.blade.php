<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Edit Produk</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6">
        {{-- Menampilkan pesan error jika validasi gagal --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penjual.produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_produk" class="block text-white">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="w-full p-2 rounded"
                       value="{{ old('nama_produk', $produk->nama_produk) }}" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-white">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full p-2 rounded" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-white">Harga</label>
                <input type="number" name="harga" id="harga" class="w-full p-2 rounded"
                       value="{{ old('harga', $produk->harga) }}" required>
            </div>

            <div class="mb-4">
                <label for="stok" class="block text-white">Stok</label>
                <input type="number" name="stok" id="stok" class="w-full p-2 rounded"
                       value="{{ old('stok', $produk->stok) }}" required>
            </div>

            <div class="mb-4">
                <label for="lokasi" class="block text-white">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="w-full p-2 rounded"
                       value="{{ old('lokasi', $produk->lokasi) }}" required>
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-white">Ganti Foto Produk (opsional)</label>
                <input type="file" name="foto" id="foto" class="w-full p-2 rounded">
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
                <a href="{{ route('penjual.produk.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
