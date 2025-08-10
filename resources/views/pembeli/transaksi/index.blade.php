<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Riwayat Pembelian
        </h2>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if ($transaksis->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">Kamu belum melakukan pembelian apapun.</p>
            @else
                <table class="w-full text-left text-sm text-gray-600 dark:text-gray-300">
                    <thead class="border-b font-medium dark:border-gray-500">
                        <tr>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                            <tr class="border-b dark:border-gray-700">
                                <td>{{ $transaksi->produk->nama_produk }}</td>
                                <td>{{ $transaksi->jumlah }}</td>
                                <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="px-2 py-1 rounded-full 
                                        {{ $transaksi->status === 'done' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                        {{ ucfirst($transaksi->status) }}
                                    </span>
                                </td>
                                <td>{{ $transaksi->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
