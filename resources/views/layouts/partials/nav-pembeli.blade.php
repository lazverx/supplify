<nav class="bg-white border-b border-gray-200 px-4 py-3 shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-lg font-semibold">Marketplace</div>
        <div class="space-x-4">
            <a href="{{ route('pembeli.dashboard') }}" class="text-gray-700 hover:text-blue-600">Beranda</a>
            <a href="{{ route('pembeli.marketplace.index') }}" class="text-gray-700 hover:text-blue-600">Produk</a>
            <a href="{{ route('pembeli.transaksi.index') }}" class="text-gray-700 hover:text-blue-600">Riwayat Pembelian</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
            </form>
        </div>
    </div>
</nav>
