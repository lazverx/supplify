<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            Status Transaksi
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 animate-fadeIn">
        <div class="bg-[#FAE3AC] shadow-lg rounded-xl p-6 border border-[#2D3250]">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-[#2D3250] border-b border-[#2D3250]/30 pb-2">
                    Detail Transaksi
                </h3>
            </div>

            <div class="space-y-3 text-[#2D3250]">
                <p><strong>Produk:</strong> {{ $transaksi->produk->nama_produk }}</p>
                <p><strong>Jumlah:</strong> {{ $transaksi->jumlah }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                <p><strong>Alamat Pengiriman:</strong> {{ $transaksi->alamat_pengiriman }}</p>
                <p>
                    <strong>Status:</strong>
                    @if($transaksi->status === 'done')
                        <span class="inline-flex items-center gap-1 text-[#2D3250] bg-green-200 px-3 py-1 rounded-full text-xs font-medium border border-green-400">
                            ✔ Selesai
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 text-[#2D3250] bg-yellow-200 px-3 py-1 rounded-full text-xs font-medium border border-yellow-400">
                            ⏳ Pending
                        </span>
                    @endif
                </p>
            </div>

            <div class="mt-6">
                <a href="{{ route('pembeli.marketplace.index') }}" 
                   class="bg-[#2D3250] text-[#FAE3AC] px-4 py-2 rounded-lg shadow hover:bg-[#1f223d] transition-colors">
                    ← Kembali ke Marketplace
                </a>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.4s ease-in-out;
        }
    </style>
</x-app-layout>
