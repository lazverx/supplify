<nav class="bg-[#fdebc3] rounded-t-lg px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('image/logo-supplify.png') }}" alt="Supplify Logo" class="h-[70px] w-[40x]">
        </div>

        <!-- Menu -->
        <div class="flex space-x-6 text-sm font-medium text-black">
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="hover:underline">Users</a>
            <a href="{{ route('admin.produk.index') }}" class="hover:underline">Produk</a>
            <a href="{{ route('admin.validasi.log') }}" class="hover:underline">Log Produk</a>
            <a href="{{ route('admin.transaksi.log') }}" class="hover:underline">Log Transaksi</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </div>
    </div>
</nav>


