<nav class="bg-[#FAE3AC] text-gray-800 shadow-md border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo dan Navigasi -->
        <div class="flex items-center gap-10">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="{{ asset('image/logo-supplify.png') }}" alt="Supplify Logo" class="h-[50px] w-[50px] rounded-full">
                <!-- <span class="font-bold text-lg">Supplify</span> -->
            </div>

            <!-- Menu Navigasi -->
            <div class="flex gap-6 font-semibold">
                <a href="{{ route('penjual.dashboard') }}" class="hover:text-blue-700">Dashboard</a>
                <a href="{{ route('penjual.profile.index') }}" class="hover:text-blue-700">Biodata</a>
                <a href="{{ route('penjual.produk.index') }}" class="hover:text-blue-700">Produk Saya</a>
                <a href="{{ route('penjual.produk.log') }}" class="hover:text-blue-700">Log Produk</a>
                <a href="{{ route('penjual.transaksi.index') }}" class="hover:text-blue-700">Transaksi</a>
            </div>
        </div>

        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-white text-yellow-600 px-4 py-1 rounded-full font-semibold shadow hover:bg-gray-100 transition">
                Logout
            </button>
        </form>
    </div>
</nav>
