<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Detail Produk
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col md:flex-row gap-8">
            <!-- Bagian Kiri: Gambar Produk -->
            <div class="md:w-1/2 flex justify-center items-center">
                <div class="w-full aspect-[4/3] overflow-hidden rounded-lg bg-gray-100">
                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}"
                         class="w-full h-full object-contain" />
                </div>
            </div>

            <!-- Bagian Kanan: Detail Produk -->
            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $produk->nama_produk }}</h3>

                    <p class="text-gray-600 mb-2">
                        <span class="font-semibold">Deskripsi:</span> {{ $produk->deskripsi }}
                    </p>

                    <p class="text-gray-600 mb-2">
                        <span class="font-semibold">Stok:</span> {{ $produk->stok }}
                    </p>

                    <p class="text-gray-600 mb-4">
                        <span class="font-semibold">Lokasi:</span> {{ $produk->lokasi }}
                    </p>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-4 mt-6">
                    <form action="{{ route('admin.validasi.approve', $produk->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                            Setujui
                        </button>
                    </form>

                    <form action="{{ route('admin.validasi.reject', $produk->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                            Tolak
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
