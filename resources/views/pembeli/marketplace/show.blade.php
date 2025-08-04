<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Produk
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="md:flex">
                    <!-- Gambar Produk -->
                    <div class="md:w-1/2 flex justify-center items-center p-6">
                        <img src="{{ asset('storage/' . $produk->foto) }}"
                            alt="{{ $produk->nama }}"
                            class="rounded-lg max-h-80 w-auto object-contain">
                    </div>

                    <!-- Detail Produk -->
                    <div class="md:w-1/2 p-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $produk->nama }}</h3>

                        <p class="text-gray-700 dark:text-gray-300 mb-2">
                            <span class="font-semibold">Harga:</span> Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>

                        <p class="text-gray-700 dark:text-gray-300 mb-2">
                            <span class="font-semibold">Stok:</span> {{ $produk->stok }}
                        </p>

                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            <span class="font-semibold">Lokasi:</span> {{ $produk->lokasi }}
                        </p>

                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            <span class="font-semibold">Deskripsi:</span><br>
                            {{ $produk->deskripsi }}
                        </p>

                        {{-- Tombol pembelian atau lainnya bisa ditambahkan di sini --}}
                        {{--<button class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                            Beli Sekarang
                        </button>--}}
                        <a href="{{ route('pembeli.transaksi.checkout', ['produk' => $produk->id]) }}"
                            class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                            Beli Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>