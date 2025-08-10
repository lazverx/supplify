<x-app-layout>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Status Transaksi
                </h2>

                <p><strong>Produk:</strong> {{ $transaksi->produk->nama_produk }}</p>
                <p><strong>Jumlah:</strong> {{ $transaksi->jumlah }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                <p><strong>Alamat Pengiriman:</strong> {{ $transaksi->alamat_pengiriman }}</p>
                <p><strong>Status:</strong> {{ $transaksi->status }}</p>

                <div class="mt-4">
                    <a href="{{ route('pembeli.marketplace.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        Kembali ke Marketplace
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
