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
                                <th class="p-3">Jumlah</th>
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
                        <form action="{{ route('pembeli.cart.checkout') }}" method="GET">
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
<footer class="bg-[#FBE3A0] text-black fade-up">
    <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <img src="{{ asset('image/logo-supplify.png') }}" alt="Logo Supplify" class="w-12 mb-4">
            <p class="text-sm mb-4">Supplify mempermudah Anda terhubung dengan pemasok terpercaya.</p>
        </div>

        <div>
            <h3 class="font-bold mb-3">Customer Service</h3>
            <ul class="space-y-2 text-sm">
                <li>
                    📧 Email:
                    <a href="mailto:ajipamungkasoffice7308@gmail.com" class="hover:underline text-[#223A5E]">
                        ajipamungkasoffice7308@gmail.com
                    </a>
                </li>
                <li>
                    💬 WhatsApp:
                    <a href="https://wa.me/6282329453188" target="_blank" class="hover:underline text-[#223A5E]">
                        +62 823-2945-3188
                    </a>
                </li>
                <li>
                    📱 Instagram:
                    <a href="https://instagram.com/supplify" target="_blank" class="hover:underline text-[#223A5E]">
                        @supplify
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="font-bold mb-3">Jam Layanan</h3>
            <p class="text-sm">Senin - Jumat: 08:00 - 17:00 WIB</p>
            <p class="text-sm">Sabtu: 09:00 - 15:00 WIB</p>
            <p class="text-sm">Minggu & Libur Nasional: Tutup</p>
        </div>
    </div>

    <div class="bg-[#223A5E] text-white text-center py-4">
        <p class="text-sm">© 2025 Supplify. All rights reserved.</p>
    </div>
</footer>