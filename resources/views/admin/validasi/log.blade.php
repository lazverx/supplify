<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Log Validasi Produk
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            @if(session('success'))
                <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="mb-4 text-red-700 bg-red-100 p-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Produk yang Sudah Divalidasi</h3>

            @if($produk->isEmpty())
                <p class="text-gray-500">Belum ada produk yang divalidasi.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Produk</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($produk as $item)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $item->nama_produk }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        @if($item->status === 'approved')
                                            <span class="text-green-700 bg-green-100 px-2 py-1 rounded text-xs">Disetujui</span>
                                        @else
                                            <span class="text-red-700 bg-red-100 px-2 py-1 rounded text-xs">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->lokasi }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->updated_at->format('d M Y - H:i') }}</td>
                                    <td class="px-4 py-2">
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_produk }}"
                                             class="w-20 h-20 object-cover rounded">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
