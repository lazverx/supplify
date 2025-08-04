<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white dark:bg-slate-800 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-2">Status Pembayaran</h2>

        <p class="text-sm mb-4">Pembayaran untuk produk <strong>{{ $produk->nama }}</strong> telah berhasil disimulasikan.</p>

        <div class="text-green-600 font-bold mb-4">✅ Transaksi Berhasil</div>

        <a href="{{ route('dashboard') }}" class="text-blue-500 underline">Kembali ke Dashboard</a>
    </div>
</x-app-layout>
