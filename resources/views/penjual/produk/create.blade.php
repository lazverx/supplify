<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Ajukan Produk</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <form action="{{ route('penjual.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-white">Nama Produk</label>
                <input type="text" name="nama_produk" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-white">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border px-3 py-2 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-white">Harga</label>
                <input type="number" name="harga" class="w-full border px-3 py-2 rounded" min="0">
            </div>

            <div class="mb-4 text-white">
                <label class="block text-white">Foto</label>
                <input type="file" name="foto" class="w-full">
            </div>

            <div class="mb-4">
                <label class="block text-white">Stok</label>
                <input type="number" name="stok" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-white">Lokasi</label>
                <input type="text" name="lokasi" class="w-full border px-3 py-2 rounded">
            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded" type="submit">Kirim</button>
        </form>

    </div>
</x-app-layout>