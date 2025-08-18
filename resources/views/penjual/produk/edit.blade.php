<x-app-layout>

    <div class="max-w-5xl mx-auto py-8 px-4 animate-fadeIn">

        <div class="bg-white rounded-xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">
            
            {{-- Left Info Section --}}
            <div class="bg-[#FAE3AC] p-8 flex flex-col justify-center">
                <p class="text-sm text-gray-800 mb-2">kami siap membantu</p>
                <h3 class="text-2xl font-bold text-[#2D3250] mb-4">Edit Produk Anda di Suplify</h3>
                <p class="text-gray-700 mb-6">
                    Isi formulir di samping untuk memperbarui informasi produk Anda agar tetap menarik 
                    dan relevan bagi pembeli yang tepat.
                </p>
                <div class="flex items-center text-gray-800 font-medium">
                    <span class="mr-2">📞</span> +62 123 4567 890
                </div>
            </div>

            {{-- Right Form Section --}}
            <div class="p-8">
                <form action="{{ route('penjual.produk.update', $produk) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Nama Produk --}}
                    <div>
                        <label for="nama_produk" class="block font-semibold text-[#2D3250] mb-1">Nama produk</label>
                        <input type="text" name="nama_produk" id="nama_produk"
                            class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-[#2D3250]"
                            value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="deskripsi" class="block font-semibold text-[#2D3250] mb-1">Deskripsi produk</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3"
                            class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-[#2D3250]"
                            required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    </div>

                    {{-- Harga --}}
                    <div>
                        <label for="harga" class="block font-semibold text-[#2D3250] mb-1">Harga</label>
                        <input type="number" name="harga" id="harga"
                            class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-[#2D3250]"
                            value="{{ old('harga', $produk->harga) }}" required>
                    </div>

                    {{-- Stok --}}
                    <div>
                        <label for="stok" class="block font-semibold text-[#2D3250] mb-1">Stok</label>
                        <input type="number" name="stok" id="stok"
                            class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-[#2D3250]"
                            value="{{ old('stok', $produk->stok) }}" required>
                    </div>

                    {{-- Lokasi --}}
                    <div>
                        <label for="lokasi" class="block font-semibold text-[#2D3250] mb-1">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi"
                            class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-[#2D3250]"
                            value="{{ old('lokasi', $produk->lokasi) }}" required>
                    </div>

                    {{-- Foto --}}
                    <div>
                        <label for="foto" class="block font-semibold text-[#2D3250] mb-1">Ganti foto produk</label>
                        <input type="file" name="foto" id="foto"
                            class="w-full p-2 border border-gray-400 rounded-md bg-white focus:ring-2 focus:ring-[#2D3250]">
                    </div>

                    {{-- Button --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-[#2D3250] text-white font-medium px-5 py-3 rounded-md shadow hover:bg-[#1f223a] transition">
                            → Kirim produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn { animation: fadeIn 0.4s ease-in-out; }
    </style>
</x-app-layout>
