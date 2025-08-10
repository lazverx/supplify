<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">{{ $produk->nama }}</h1>
                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}" class="w-64 h-64 object-cover mb-4">
                    <p class="mb-2"><strong>Harga:</strong> Rp{{ number_format($produk->harga, 0, ',', '.') }}/Kg</p>
                    <p class="mb-2"><strong>Stok:</strong> {{ $produk->stok }} Kg</p>
                    <p class="mb-4"><strong>Deskripsi:</strong> {{ $produk->deskripsi }}</p>

                    <form method="GET" action="{{ route('pembeli.transaksi.checkout', $produk->id) }}">
                        <div class="mb-4">
                            <label for="jumlah" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah (Kg):</label>
                            <input type="number" id="jumlah" name="jumlah" value="1" min="1" max="{{ $produk->stok }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                        </div>

                        <div class="mb-4">
                            <label for="alamat_pengiriman" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat Pengiriman:</label>
                            <textarea id="alamat_pengiriman" name="alamat_pengiriman" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="totalHarga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total Harga:</label>
                            <input type="text" id="totalHarga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 dark:bg-gray-700 dark:text-white" readonly>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Beli Sekarang
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Script Harga Otomatis -->
    <script>
        const hargaSatuan = {{ $produk->harga }};
        const totalHargaEl = document.getElementById('totalHarga');
        const inputJumlah = document.getElementById('jumlah');

        function hitungTotalHarga() {
            let jumlah = parseInt(inputJumlah.value) || 1;
            const max = parseInt(inputJumlah.max);
            if (jumlah > max) {
                jumlah = max;
                inputJumlah.value = max;
            }
            totalHargaEl.value = "Rp" + (jumlah * hargaSatuan).toLocaleString('id-ID');
        }

        inputJumlah.addEventListener('input', hitungTotalHarga);
        window.addEventListener('DOMContentLoaded', hitungTotalHarga);
    </script>

</x-app-layout>
