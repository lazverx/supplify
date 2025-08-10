<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($produk->isEmpty())
                        <p class="text-center text-gray-600 dark:text-gray-300">Tidak ada produk yang tersedia saat ini.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($produk as $item)
                                <div class="group relative bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow hover:shadow-xl transition overflow-hidden">

                                    {{-- Gambar produk + icon cart --}}
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_produk }}"
                                            class="w-full h-48 object-cover transform group-hover:scale-105 transition duration-300">

                                       
                                        <form action="{{ route('pembeli.cart.store') }}" method="POST" class="absolute top-2 right-2">
                                            @csrf
                                            <input type="hidden" name="produk_id" value="{{ $item->id }}">
                                            <input type="hidden" name="qty" value="1">
                                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition duration-300">
                                                🛒
                                            </button>
                                        </form>
                                    </div>

                                    <div class="p-4">
                                        <h2 class="text-lg font-bold text-gray-800 dark:text-white">{{ $item->nama_produk }}</h2>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                            {{ Str::limit($item->deskripsi, 60) }}
                                        </p>

                                        <div class="flex justify-between">
                                            <p class="font-semibold text-blue-600 dark:text-blue-300">
                                                Rp {{ number_format($item->harga, 0, ',', '.') }} / Kg
                                            </p>
                                            <p class="font-semibold text-blue-600 dark:text-blue-300">
                                                Stok: {{ $item->stok }} Kg
                                            </p>
                                        </div>

                                        <div class="mt-4 flex flex-col gap-2">
                                            <a href="{{ route('pembeli.transaksi.checkout', $item->id) }}"
                                                class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                                                Beli
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
