<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Transaksi Produk Saya
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-[#FAE3AC] p-6 rounded-xl shadow-lg">
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
                                    @foreach ($transaksi->transaksis as $item)
                                    {{ $item->produk->nama_produk }}
                                    <span class="text-sm text-gray-500">(x{{ $item->qty }})</span><br>
                                    @endforeach
                                </td>

                                <td class="p-3 text-gray-700">
                                    {{ $transaksi->pembeli->name ?? 'Tidak Diketahui' }}
                                </td>
                                <td class="p-3 text-gray-700">
                                    {{ $transaksi->jumlah }}
                                </td>
                                <td class="p-3 text-gray-700">
                                    {{ $transaksi->alamat_pengiriman }}
                                </td>
                                <td class="p-3 text-gray-700">
                                    Rp{{ number_format($transaksi->total_harga) }}
                                </td>
                                <td class="p-3">
                                    <span class="px-3 py-1 text-sm rounded-full 
                                            {{ $transaksi->status == 'Selesai' ? 'bg-green-100 text-green-700' : 
                                               ($transaksi->status == 'Pending' ? 'bg-yellow-100 text-yellow-700' : 
                                               'bg-green-100 text-green-700') }}">
                                        {{ $transaksi->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center p-6 text-gray-500">
                                    Belum ada transaksi.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>