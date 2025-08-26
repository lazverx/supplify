<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            Log Transaksi
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 animate-fadeIn">
        <div class="bg-[#FAE3AC] shadow-lg rounded-xl p-6 border border-[#2D3250]">

            {{-- 🔎 Filter Penjual + Export PDF --}}
            <div class="flex items-center justify-between mb-6">
                <form method="GET" action="{{ route('admin.transaksi.log') }}" class="flex items-center gap-3">
                    <select name="penjual_id" class="border px-3 py-2 rounded-lg">
                        <option value="">-- Semua Penjual --</option>
                        @foreach($penjuals as $penjual)
                        <option value="{{ $penjual->id }}" {{ request('penjual_id') == $penjual->id ? 'selected' : '' }}>
                            {{ $penjual->name }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-[#2D3250] text-[#FAE3AC] px-4 py-2 rounded-lg hover:bg-[#2D3240]">
                        Filter
                    </button>
                </form>

                <a href="{{ route('admin.log-transaksi.export-pdf', ['penjual_id' => request('penjual_id')]) }}"
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                    Export PDF
                </a>
            </div>



            @php
            $groupedLogs = $logs->groupBy(function($item) {
            return $item->qty > 1 ? 'Pembelian Banyak' : 'Pembelian Satuan';
            });
            @endphp

            @foreach($groupedLogs as $groupName => $items)
            <h3 class="text-lg font-semibold text-[#2D3250] mt-6 mb-4 border-b border-[#2D3250]/30 pb-2">
                {{ $groupName }}
            </h3>

            @if($items->isEmpty())
            <p class="text-[#2D3250]/70 italic">Belum ada transaksi untuk kategori ini.</p>
            @else
            <div class="overflow-x-auto rounded-lg border border-[#2D3250]/30 mb-6">
                <table class="min-w-full text-sm text-left border-collapse">
                    <thead class="bg-[#2D3250] text-[#FAE3AC] uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Pembeli</th>
                            <th class="px-4 py-3">Penjual</th>
                            <th class="px-4 py-3">Produk</th>
                            <th class="px-4 py-3">Harga Satuan</th>
                            <th class="px-4 py-3">Jumlah</th>
                            <th class="px-4 py-3">Subtotal</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($items as $item)
                        <tr class="hover:bg-[#FAE3AC]/40 transition-colors">
                            <td class="px-4 py-3 text-[#2D3250]">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-medium text-[#2D3250]">{{ $item->transaksi->pembeli->name }}</td>
                            <td class="px-4 py-3 text-[#2D3250]">{{ $item->produk->penjual->name }}</td>
                            <td class="px-4 py-3 text-[#2D3250]">{{ $item->produk->nama_produk }}</td>
                            <td class="px-4 py-3 text-[#2D3250]">Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-[#2D3250] text-center">{{ $item->qty }}</td>
                            <td class="px-4 py-3 text-[#2D3250]">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                @if($item->transaksi->status === 'done')
                                <span class="inline-flex items-center gap-1 text-[#2D3250] bg-green-200 px-3 py-1 rounded-full text-xs font-medium border border-green-400">
                                    ✔ Selesai
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1 text-[#2D3250] bg-yellow-200 px-3 py-1 rounded-full text-xs font-medium border border-yellow-400">
                                    ⏳ Pending
                                </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-[#2D3250]/80">{{ $item->created_at->format('d M Y - H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @endforeach

            {{-- 📄 Pagination --}}
            <div class="mt-6">
                {{ $logs->links() }}
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.4s ease-in-out;
        }
    </style>
</x-app-layout>