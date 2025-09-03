<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Riwayat Penjualan Produk
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Card Container -->
            <div class="bg-[#FAE3AC] p-6 rounded-xl shadow-lg">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('penjual.transaksi.export.pdf') }}"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                        Export PDF
                    </a>
                </div>
                <!-- Tabel -->
                <div class="overflow-x-auto bg-white rounded-xl shadow-inner">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1F2544] text-white">
                                <th class="p-3 text-sm font-semibold">Produk</th>
                                <th class="p-3 text-sm font-semibold">Pembeli</th>
                                <th class="p-3 text-sm font-semibold">Jumlah</th>
                                <th class="p-3 text-sm font-semibold">Alamat Pembeli</th>
                                <th class="p-3 text-sm font-semibold">Harga Total</th>
                                <th class="p-3 text-sm font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksis as $transaksi)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 font-medium text-gray-800">
                                    @foreach ($transaksi->transaksisProduk as $item)
                                    {{ $item->produk->nama_produk }}
                                    <span class="text-sm text-gray-500">(x{{ $item->qty }})</span><br>
                                    @endforeach
                                </td>

                                <td class="p-3 text-gray-700">
                                    {{ $transaksi->pembeli->name ?? 'Tidak Diketahui' }}
                                </td>
                                <td class="p-3 text-gray-700">
                                    {{ $transaksi->transaksisProduk->sum('qty') }}
                                </td>
                                <td class="p-3 text-gray-700">
                                    {{ $transaksi->alamat_pengiriman }}
                                </td>
                                <td class="p-3 text-gray-700">
                                    Rp{{ number_format($transaksi->transaksisProduk->sum(function($item) {
                                            return $item->qty * $item->harga;
                                        }), 0, ',', '.') }}
                                </td>
                                <td class="p-3">
                                    <span class="px-3 py-1 text-sm rounded-full 
                {{ $transaksi->status == 'Selesai' ? 'bg-green-100 text-green-700' : 
                   ($transaksi->status == 'Pending' ? 'bg-yellow-100 text-yellow-700' : 
                   'bg-green-100 text-green-700') }}">
                                        {{ ucwords($transaksi->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center p-6 text-gray-500">
                                    Belum ada transaksi.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $transaksis->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

{{-- Footer --}}
<footer class="bg-[#FAE3AC] text-black"
    data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
            <img src="{{ asset('image/logo-supplify.png') }}" class="h-[50px] w-auto">
            <p class="text-sm mb-4">Supplify mempermudah Anda terhubung dengan pemasok terpercaya.</p>
        </div>
        <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            <h3 class="font-bold mb-3">Customer Service</h3>
            <ul class="space-y-2 text-sm">
                <li class="flex items-center gap-2">
                    <img src="{{ asset('image/icons/gmail.svg') }}" class="w-5 h-5">
                    <a href="mailto:ajipamungkasoffice7308@gmail.com" class="hover:underline text-[#223A5E]">
                        ajipamungkasoffice7308@gmail.com
                    </a>
                </li>
                <li class="flex items-center gap-2">
                    <img src="{{ asset('image/icons/whatsapp.svg') }}" class="w-5 h-5">
                    <a href="https://wa.me/6282329453188" target="_blank" class="hover:underline text-[#223A5E]">
                        +62 823-2945-3188
                    </a>
                </li>
                <li class="flex items-center gap-2">
                    <img src="{{ asset('image/icons/instagram.svg') }}" class="w-5 h-5">
                    <a href="https://www.instagram.com/supplify_project?igsh=MTR6a3VqZTgzZ21zYg==" target="_blank" class="hover:underline text-[#223A5E]">
                        @supplify
                    </a>
                </li>
            </ul>
        </div>
        <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
            <h3 class="font-bold mb-3">Jam Layanan</h3>
            <p class="text-sm">Senin - Jumat: 08:00 - 17:00 WIB</p>
            <p class="text-sm">Sabtu: 09:00 - 15:00 WIB</p>
            <p class="text-sm">Minggu & Libur Nasional: Tutup</p>
        </div>
    </div>
    <div class="bg-[#1F2544] text-white text-center py-4"
        data-aos="fade-in" data-aos-duration="1000">
        <p class="text-sm">© 2025 Supplify. All rights reserved.</p>
    </div>
</footer>