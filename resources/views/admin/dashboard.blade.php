<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2D3250] dark:text-[#FAE3AC] leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Flash Message / Welcome --}}
            <div class="bg-[#FAE3AC] dark:bg-[#2D3250] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#2D3250] dark:text-[#FAE3AC] font-medium">
                    Selamat datang di halaman admin! Anda telah berhasil login.
                </div>
            </div>

            {{-- Quick Access Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Manajemen Pengguna --}}
                <a href="{{ route('admin.users.index') }}" class="block p-6 bg-[#FAE3AC] dark:bg-[#2D3250] rounded-lg shadow hover:shadow-lg hover:scale-[1.02] transition duration-300">
                    <h3 class="text-lg font-semibold text-[#2D3250] dark:text-[#FAE3AC] mb-2">Manajemen Pengguna</h3>
                    <p class="text-sm text-[#2D3250] dark:text-[#FAE3AC]/80">Lihat, detail, dan hapus data pengguna sistem.</p>
                </a>

                {{-- Manajemen Produk --}}
                <a href="{{ route('admin.produk.index') }}" class="block p-6 bg-[#FAE3AC] dark:bg-[#2D3250] rounded-lg shadow hover:shadow-lg hover:scale-[1.02] transition duration-300">
                    <h3 class="text-lg font-semibold text-[#2D3250] dark:text-[#FAE3AC] mb-2">Manajemen Produk</h3>
                    <p class="text-sm text-[#2D3250] dark:text-[#FAE3AC]/80">Kelola semua produk yang tersedia di sistem.</p>
                </a>

                {{-- Transaksi --}}
                <a href="{{ route('admin.transaksi.log') }}" class="block p-6 bg-[#FAE3AC] dark:bg-[#2D3250] rounded-lg shadow hover:shadow-lg hover:scale-[1.02] transition duration-300">
                    <h3 class="text-lg font-semibold text-[#2D3250] dark:text-[#FAE3AC] mb-2">Transaksi</h3>
                    <p class="text-sm text-[#2D3250] dark:text-[#FAE3AC]/80">Kelola semua transaksi di sistem.</p>
                </a>
            </div>

            {{-- Statistik Singkat (opsional) --}}
            {{--
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-[#FAE3AC] dark:bg-[#2D3250] p-6 rounded-lg shadow">
                    <h4 class="text-md font-bold text-[#2D3250] dark:text-[#FAE3AC] mb-2">Total Pengguna</h4>
                    <p class="text-2xl text-[#2D3250] dark:text-[#FAE3AC]">123</p>
                </div>
                <div class="bg-[#FAE3AC] dark:bg-[#2D3250] p-6 rounded-lg shadow">
                    <h4 class="text-md font-bold text-[#2D3250] dark:text-[#FAE3AC] mb-2">Total Produk</h4>
                    <p class="text-2xl text-[#2D3250] dark:text-[#FAE3AC]">45</p>
                </div>
            </div>
            --}}
        </div>
    </div>
</x-app-layout>