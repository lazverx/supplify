<x-app-layout>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Checkout - {{ $produk->nama_produk }}
                </h2>

                <div class="flex items-center gap-4 mb-6">
                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="w-32 h-32 object-cover rounded">
                    <div>
                        <p class="text-lg text-gray-800 dark:text-white font-semibold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $produk->deskripsi }}</p>
                    </div>
                </div>

                <form action="{{ route('pembeli.transaksi.bayar') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Jumlah</label>
                        <input type="number" name="jumlah" value="1" min="1" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Alamat Pengiriman</label>
                        <textarea name="alamat_pengiriman" rows="3" class="w-full border rounded p-2" required></textarea>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Bayar Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
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
            }).then(() => {
                window.location.href = "{{ route('pembeli.transaksi.index')}}";
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

