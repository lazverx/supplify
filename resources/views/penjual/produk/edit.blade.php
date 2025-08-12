<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            ✏ Edit Produk
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8 px-4 animate-fadeIn">
        
        {{-- Error Message --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow mb-6 border border-red-300">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-[#FAE3AC] border border-[#2D3250]/40 rounded-xl shadow-lg p-6">
            <form action="{{ route('penjual.produk.update', $produk) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Nama Produk --}}
                <div>
                    <label for="nama_produk" class="block font-semibold text-[#2D3250] mb-1">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" 
                        class="w-full p-3 border border-[#2D3250]/30 rounded-lg focus:ring-2 focus:ring-[#2D3250] focus:outline-none"
                        value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="deskripsi" class="block font-semibold text-[#2D3250] mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="w-full p-3 border border-[#2D3250]/30 rounded-lg focus:ring-2 focus:ring-[#2D3250] focus:outline-none"
                        required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                </div>

                {{-- Harga --}}
                <div>
                    <label for="harga" class="block font-semibold text-[#2D3250] mb-1">Harga</label>
                    <input type="number" name="harga" id="harga"
                        class="w-full p-3 border border-[#2D3250]/30 rounded-lg focus:ring-2 focus:ring-[#2D3250] focus:outline-none"
                        value="{{ old('harga', $produk->harga) }}" required>
                </div>

                {{-- Stok --}}
                <div>
                    <label for="stok" class="block font-semibold text-[#2D3250] mb-1">Stok</label>
                    <input type="number" name="stok" id="stok"
                        class="w-full p-3 border border-[#2D3250]/30 rounded-lg focus:ring-2 focus:ring-[#2D3250] focus:outline-none"
                        value="{{ old('stok', $produk->stok) }}" required>
                </div>

                {{-- Lokasi --}}
                <div>
                    <label for="lokasi" class="block font-semibold text-[#2D3250] mb-1">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi"
                        class="w-full p-3 border border-[#2D3250]/30 rounded-lg focus:ring-2 focus:ring-[#2D3250] focus:outline-none"
                        value="{{ old('lokasi', $produk->lokasi) }}" required>
                </div>

                {{-- Foto --}}
                <div>
                    <label for="foto" class="block font-semibold text-[#2D3250] mb-1">Ganti Foto Produk (opsional)</label>
                    <input type="file" name="foto" id="foto"
                        class="w-full p-2 border border-[#2D3250]/30 rounded-lg bg-white focus:ring-2 focus:ring-[#2D3250] focus:outline-none">
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="bg-[#2D3250] text-[#FAE3AC] px-5 py-2 rounded-lg shadow hover:bg-[#1f223a] transition-all duration-200">
                        💾 Simpan Perubahan
                    </button>
                    <a href="{{ route('penjual.produk.index') }}"
                        class="bg-gray-500 text-white px-5 py-2 rounded-lg shadow hover:bg-gray-600 transition-all duration-200">
                        ❌ Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.4s ease-in-out;
        }
    </style>
</x-app-layout>
