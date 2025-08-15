{{-- resources/views/admin/produk/index.blade.php --}}

<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Produk (Pending)</h1>

        @if ($produks->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($produks as $produk)
                    <div class="bg-white rounded-xl shadow-md p-4 border border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-700">{{ $produk->nama_produk }}</h2>
                        <p class="text-sm text-gray-600 mb-2">Status: 
                            <span class="inline-block bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">
                                {{ ucfirst($produk->status) }}
                            </span>
                        </p>
                        <p class="text-sm text-gray-500 truncate">Deskripsi: {{ Str::limit($produk->deskripsi, 50) }}</p>
                        <p class="text-sm text-gray-500">Stok: {{ $produk->stok }}</p>
                        <p class="text-sm text-gray-500">Lokasi: {{ $produk->lokasi }}</p>
                        
                        <div class="mt-4">
                            <a href="{{ route('admin.produk.show', $produk->id) }}" 
                               class="inline-block text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md text-sm">
                                Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-gray-500">Tidak ada produk dengan status <strong>pending</strong>.</div>
        @endif
    </div>
</x-app-layout>