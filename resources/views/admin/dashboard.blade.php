<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Flash Message / Welcome --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Selamat datang di halaman admin! Anda telah berhasil login.
                </div>
            </div>

            {{-- Quick Access Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Manajemen Pengguna --}}
                <a href="{{ route('admin.users.index') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition duration-200">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Manajemen Pengguna</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Lihat, detail, dan hapus data pengguna sistem.</p>
                </a>

                {{-- Manajemen Produk --}}
                <a href="{{ route('admin.produk.index') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition duration-200">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Manajemen Produk</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Kelola semua produk yang tersedia di sistem.</p>
                </a>

                {{-- Transaksi --}}
                
            </div>

            {{-- Statistik Singkat (opsional, bisa diisi nanti) --}}
            {{-- 
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <h4 class="text-md font-bold text-gray-700 dark:text-gray-200 mb-2">Total Pengguna</h4>
                    <p class="text-2xl text-blue-500">123</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <h4 class="text-md font-bold text-gray-700 dark:text-gray-200 mb-2">Total Produk</h4>
                    <p class="text-2xl text-green-500">45</p>
                </div>
                
            </div>
            --}}

        </div>
    </div>
</x-app-layout>
