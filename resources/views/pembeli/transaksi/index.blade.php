<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            Riwayat Pembelian
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 animate-fadeIn">
        <div class="bg-[#FAE3AC] shadow-lg rounded-xl p-6 border border-[#2D3250]">
            @if ($transaksis->isEmpty())
            <p class="text-[#2D3250]/70 italic">Kamu belum melakukan pembelian apapun.</p>
            @else
            <div class="overflow-x-auto rounded-lg border border-[#2D3250]/30">
                <table class="min-w-full text-sm text-left border-collapse">
                    <thead class="bg-[#2D3250] text-[#FAE3AC] uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">Produk</th>
                            <th class="px-4 py-3">Total Item</th>
                            <th class="px-4 py-3">Total Harga</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($transaksis as $transaksi)
                        <tr class="hover:bg-[#FAE3AC]/40 transition-colors">
                            <td class="px-4 py-3 text-[#2D3250]">
                                @foreach ($transaksi->transaksis as $item)
                                {{ $item->produk->nama_produk }}
                                <span class="text-sm text-[#2D3250]/70">(x{{ $item->qty }})</span><br>
                                @endforeach
                            </td>
                            <td class="px-4 py-3 text-[#2D3250]">
                                {{ $transaksi->transaksis->sum('qty') }}
                            </td>
                            <td class="px-4 py-3 text-[#2D3250]">
                                Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3">
                                @if($transaksi->status === 'done')
                                <span class="inline-flex items-center gap-1 text-[#2D3250] bg-green-200 px-3 py-1 rounded-full text-xs font-medium border border-green-400">
                                    ✔ Selesai
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1 text-[#2D3250] bg-yellow-200 px-3 py-1 rounded-full text-xs font-medium border border-yellow-400">
                                    ⏳ Pending
                                </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-[#2D3250]/80">
                                {{ $transaksi->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

        <!-- 🔽 Pagination -->
        <div class="mt-8">
            {{ $transaksis->links('pagination::tailwind') }}
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


{{-- SweetAlert2 --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('error') }}",
        showConfirmButton: true
    });
</script>
@endif