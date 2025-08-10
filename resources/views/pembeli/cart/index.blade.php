<x-app-layout>
    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>

                    @if ($cartItems->isEmpty())
                        <p class="text-center text-gray-600 dark:text-gray-300">Keranjang kosong. Yuk, belanja dulu!</p>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-300 dark:border-gray-600">
                                    <th class="p-3">Produk</th>
                                    <th class="p-3">Harga</th>
                                    <th class="p-3">Qty</th>
                                    <th class="p-3">Subtotal</th>
                                    <th class="p-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach ($cartItems as $item)
                                    @php $subtotal = $item->produk->harga * $item->qty; $total += $subtotal; @endphp
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="p-3 flex items-center gap-3">
                                            <img src="{{ asset('storage/' . $item->produk->foto) }}" alt="{{ $item->produk->nama_produk }}" class="w-16 h-16 object-cover rounded">
                                            {{ $item->produk->nama_produk }}
                                        </td>
                                        <td class="p-3">Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                                        <td class="p-3">{{ $item->qty }}</td>
                                        <td class="p-3">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                        <td class="p-3">
                                            <form action="{{ route('pembeli.cart.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex justify-between items-center mt-6">
                            <p class="text-xl font-bold">Total: Rp {{ number_format($total, 0, ',', '.') }}</p>
                            <form action="{{ route('pembeli.cart.checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                                    Checkout Semua
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
