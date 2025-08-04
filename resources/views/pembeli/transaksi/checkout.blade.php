<x-app-layout>
    <x-slot name="title">Checkout</x-slot>

    <div class="p-6 max-w-5xl mx-auto space-y-6">
        {{-- Alamat Pengiriman --}}
        <div class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow flex items-start justify-between gap-4">
            <div>
                <div class="text-lg font-semibold">📍 Address</div>
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                    <div class="font-semibold">Kucing</div>
                    <div class="text-xs">+62 875 5432 100</div>
                    <div class="mt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</div>
                </div>
            </div>
            <div class="text-sm text-blue-500 underline cursor-pointer">Edit</div>
        </div>

        {{-- Produk yang dibeli --}}
        <div class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow flex gap-4">
            <img src="{{ asset('storage/' . $produk->foto) }}" class="w-32 h-32 object-cover rounded-lg" alt="{{ $produk->nama }}">
            <div class="flex-1 space-y-2">
                <div class="text-lg font-semibold">{{ $produk->nama }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-300">{{ $produk->deskripsi }}</div>
                <table class="mt-2 text-sm w-full">
                    <tr>
                        <td class="pr-4">Harga</td>
                        <td>: Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>: 1</td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>: Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Metode Pembayaran & Ringkasan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Payment Method --}}
            <div class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow">
                <div class="text-lg font-semibold mb-4">Payment Method</div>
                <div class="grid grid-cols-4 gap-3">
                    @foreach(['paypal', 'visa', 'mastercard', 'gpay', 'stripe', 'amex'] as $logo)
                        <img src="{{ asset("images/payments/$logo.png") }}" alt="{{ $logo }}" class="h-8 object-contain mx-auto">
                    @endforeach
                </div>
            </div>

            {{-- Ringkasan Pembayaran --}}
            <div class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow space-y-2">
                <div class="text-lg font-semibold mb-2">Ringkasan Pembayaran</div>
                <div class="text-sm">
                    <div class="flex justify-between"><span>Subtotal Pesanan</span><span>Rp{{ number_format($produk->harga, 0, ',', '.') }}</span></div>
                    <div class="flex justify-between"><span>Total Harga Produk</span><span>Rp{{ number_format($produk->harga, 0, ',', '.') }}</span></div>
                    <div class="flex justify-between"><span>Subtotal Pengiriman</span><span>Rp3.500</span></div>
                    <div class="flex justify-between"><span>Biaya Layanan</span><span>Rp2.000</span></div>
                    <div class="flex justify-between"><span>Voucher Diskon</span><span>-Rp1.000</span></div>
                    <div class="border-t border-gray-300 dark:border-gray-600 my-2"></div>
                    <div class="flex justify-between font-bold"><span>Total Pembayaran</span><span>Rp{{ number_format($produk->harga + 3500 + 2000 - 1000, 0, ',', '.') }}</span></div>
                </div>

                <form action="{{ route('pembeli.transaksi.bayar', $produk->id) }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="jumlah" value="1">
                    <input type="hidden" name="alamat_pengiriman" value="Alamat default pengguna (sementara)">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-xl text-center mt-2">
                        Buy Now
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
