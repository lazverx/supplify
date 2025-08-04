<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Riwayat Transaksi Produk Saya
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="p-2 border">Produk</th>
                                <th class="p-2 border">Pembeli</th>
                                <th class="p-2 border">Jumlah</th>
                                <th class="p-2 border">Harga Total</th>
                                <th class="p-2 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksis as $transaksi)
                                <tr>
                                    <td class="p-2 border">{{ $transaksi->produk->nama_produk }}</td>
                                    <td class="p-2 border">{{ $transaksi->pembeli->name ?? 'Tidak Diketahui' }}</td>
                                    <td class="p-2 border">{{ $transaksi->jumlah }}</td>
                                    {{-- <td class="p-2 border">{{ $transaksi->alamat_pengiriman }}</td> --}}
                                    <td class="p-2 border">Rp{{ number_format($transaksi->total_harga) }}</td>
                                    <td class="p-2 border">{{ $transaksi->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center p-4">Belum ada transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
