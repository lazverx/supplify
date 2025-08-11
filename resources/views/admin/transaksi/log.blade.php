<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold text-white p-5">Log Transaksi</h1>

        @php
            $groupedLogs = $logs->groupBy(function($item) {
                return $item->qty > 1 ? 'Pembelian Banyak' : 'Pembelian Satuan';
            });
        @endphp

        @foreach($groupedLogs as $groupName => $items)
            <h2 class="text-lg font-semibold text-gray-200 mt-8 mb-3">{{ $groupName }}</h2>

            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pembeli</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Penjual</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produk</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga Satuan</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Total Pembelian</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($items as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $item->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $item->transaksi->pembeli->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $item->produk->penjual->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $item->produk->nama_produk }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 text-sm text-center text-gray-700">{{ $item->qty }}</td>
                                <td class="px-4 py-2 text-sm text-right text-gray-700">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 text-sm text-center">
                                    <span class="px-2 py-1 text-xs font-semibold rounded 
                                        {{ $item->transaksi->status === 'done' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($item->transaksi->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-sm text-center text-gray-500">
                                    {{ $item->created_at->format('d-m-Y H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</x-app-layout>
