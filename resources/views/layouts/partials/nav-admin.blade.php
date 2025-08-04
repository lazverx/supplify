<nav class="bg-white border-b border-gray-200 px-4 py-3 shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-lg font-semibold">Admin Panel</div>
        <div class="space-x-4">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="text-gray-700 hover:text-blue-600">Users</a>
            <a href="{{ route('admin.produk.index') }}" class="text-gray-700 hover:text-blue-600">Produk</a>
            <a href="{{ route('admin.validasi.log') }}" class="text-gray-700 hover:text-blue-600">Log Produk</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
            </form>
        </div>
    </div>
</nav>
