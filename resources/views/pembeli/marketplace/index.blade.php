<x-app-layout>
    <div class="py-12 bg-[#F5F7FA] dark:bg-[#1E1E2F] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-[#2D3250] rounded-xl shadow-xl p-8 text-white">


            {{-- 🔍 Form Pencarian & Filter --}}
            <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                <form method="GET" action="{{ route('pembeli.marketplace.index') }}"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    {{-- Search --}}
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari produk..."
                        class="col-span-2 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                               text-gray-800 dark:text-white bg-gray-50 dark:bg-gray-700 
                               focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition">

                    {{-- Filter harga --}}
                    <select name="filter_harga"
                        class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                               text-gray-800 dark:text-white bg-gray-50 dark:bg-gray-700 
                               focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition">
                        <option value="">Filter Harga</option>
                        <option value="murah" {{ request('filter_harga') == 'murah' ? 'selected' : '' }}>Termurah</option>
                        <option value="mahal" {{ request('filter_harga') == 'mahal' ? 'selected' : '' }}>Termahal</option>
                    </select>

                    {{-- Filter stok --}}
                    <select name="filter_stok"
                        class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                               text-gray-800 dark:text-white bg-gray-50 dark:bg-gray-700 
                               focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition">
                        <option value="">Filter Stok</option>
                        <option value="tersedia" {{ request('filter_stok') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="habis" {{ request('filter_stok') == 'habis' ? 'selected' : '' }}>Habis</option>
                    </select>

                    <button type="submit"
                        class="md:col-span-4 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 rounded-lg shadow-md transition">
                        Terapkan Filter
                    </button>
                </form>
            </div>

            <div class="bg-[#2D3250] dark:bg-[#2D3250] rounded-xl shadow-xl p-8 text-white">


                <h1 class="text-3xl font-bold mb-6 text-center">Marketplace</h1>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($produk->isEmpty())

                        <p class="text-center text-gray-600 dark:text-gray-300">
                            Tidak ada produk yang tersedia saat ini.
                        </p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($produk as $item)
                                <div
                                    class="group relative bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl shadow hover:shadow-xl transition overflow-hidden flex flex-col">

                                    {{-- Gambar produk --}}
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $item->foto) }}"
                                            alt="{{ $item->nama_produk }}"
                                            class="w-full h-48 object-cover transform group-hover:scale-105 transition duration-300">

                                        {{-- Tombol keranjang --}}
                                        <form action="{{ route('pembeli.cart.store') }}" method="POST"
                                            class="absolute top-2 right-2">
                                            @csrf
                                            <input type="hidden" name="produk_id" value="{{ $item->id }}">
                                            <input type="hidden" name="qty" value="1">
                                            <button type="submit"
                                                class="bg-white hover:bg-green-600 text-white p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition duration-300">
                                                🛒
                                            </button>
                                        </form>

                                        {{-- Harga di pojok kanan bawah gambar --}}
                                        <span
                                            class="absolute bottom-2 right-2 bg-black bg-opacity-70 text-white text-sm font-semibold px-3 py-1 rounded-lg">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }} / Kg
                                        </span>
                                    </div>

                                    {{-- Detail produk --}}
                                    <div class="p-4 flex flex-col flex-grow">
                                        <h2 class="text-lg font-bold text-gray-800 dark:text-white text-center mb-2">
                                            {{ $item->nama_produk }}
                                        </h2>

                                        <p class="text-center text-sm text-gray-600 dark:text-gray-300 mb-3">
                                            Stok: {{ $item->stok }} Kg
                                        </p>

                                        <a href="{{ route('pembeli.transaksi.checkout', $item->id) }}"
                                            class="mt-auto block w-full text-center bg-[#FAE3AC] hover:bg-yellow-300 text-[#2D3250] font-semibold py-2 rounded-lg">
                                            Beli
                                        </a>
                                    </div>

                    <p class="text-center text-gray-300">Tidak ada produk yang sesuai dengan pencarian/filter.</p>
                    @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($produk as $item)
                        <div class="group relative bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow hover:shadow-xl transition overflow-hidden">

                            {{-- Gambar produk + icon cart --}}
                            <div class="relative">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_produk }}"
                                    class="w-full h-48 object-cover transform group-hover:scale-105 transition duration-300">

                                <form action="{{ route('pembeli.cart.store') }}" method="POST" class="absolute top-2 right-2">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $item->id }}">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition duration-300">
                                        🛒
                                    </button>
                                </form>
                            </div>

                            <div class="p-4">
                                <h2 class="text-lg font-bold text-gray-800 dark:text-white">{{ $item->nama_produk }}</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                    {{ Str::limit($item->deskripsi, 60) }}
                                </p>

                                <div class="flex justify-between">
                                    <p class="font-semibold text-white">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }} / Kg
                                    </p>
                                    <p class="font-semibold text-white">
                                        Stok: {{ $item->stok }} Kg
                                    </p>

                                </div>

                                <div class="mt-4 flex flex-col gap-2">
                                    <a href="{{ route('pembeli.transaksi.checkout', $item->id) }}"
                                        class="mt-2 block w-full text-center bg-[#FAE3AC] hover:bg-yellow-300 text-[#2D3250] font-semibold py-2 rounded">
                                        Beli
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- 📄 Pagination --}}
                    <div class="mt-6">
                        {{ $produk->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-[#FBE3A0] text-black fade-up">
        <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <img src="{{ asset('image/logo-supplify.png') }}" alt="Logo Supplify" class="w-12 mb-4">
                <p class="text-sm mb-4">Supplify mempermudah Anda terhubung dengan pemasok terpercaya.</p>
            </div>

            <div>
                <h3 class="font-bold mb-3">Customer Service</h3>
                <ul class="space-y-2 text-sm">
                    <li>📧 Email:
                        <a href="mailto:ajipamungkasoffice7308@gmail.com"
                            class="hover:underline text-[#223A5E]">ajipamungkasoffice7308@gmail.com</a>
                    </li>
                    <li>💬 WhatsApp:
                        <a href="https://wa.me/6282329453188" target="_blank"
                            class="hover:underline text-[#223A5E]">+62 823-2945-3188</a>
                    </li>
                    <li>📱 Instagram:
                        <a href="https://instagram.com/supplify" target="_blank"
                            class="hover:underline text-[#223A5E]">@supplify</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold mb-3">Jam Layanan</h3>
                <p class="text-sm">Senin - Jumat: 08:00 - 17:00 WIB</p>
                <p class="text-sm">Sabtu: 09:00 - 15:00 WIB</p>
                <p class="text-sm">Minggu & Libur Nasional: Tutup</p>
            </div>
        </div>

        <div class="bg-[#223A5E] text-white text-center py-4">
            <p class="text-sm">© 2025 Supplify. All rights reserved.</p>
        </div>
    </footer>

    {{-- SweetAlert2 --}}
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
                showConfirmButton: true
            });
        </script>
    @endif


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
        timer: 2000
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