<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Produk Saya</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- CARD WRAPPER -->
        <div class="bg-[#1E1E3F] text-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <!-- Search Bar -->
                <form action="{{ route('penjual.produk.index') }}" method="GET" class="flex items-center gap-2">
                    <input type="text" name="search" placeholder="Search" class="px-3 py-2 rounded bg-white text-black focus:outline-none" />
                    <button type="submit" class="bg-yellow-400 text-black px-3 py-2 rounded">
                        🔍
                    </button>
                </form>

                <!-- Tambah Produk -->
                <a href="{{ route('penjual.produk.create') }}" class="bg-yellow-400 text-black px-4 py-2 rounded">
                    Tambah Produk
                </a>
            </div>

            @if($produks->isEmpty())
                <div class="text-center py-10 text-white">Kamu belum menambahkan produk.</div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm bg-white text-black rounded-lg overflow-hidden">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nama Produk</th>
                                <th class="px-4 py-2">Deskripsi</th>
                                <th class="px-4 py-2">Foto Produk</th>
                                <th class="px-4 py-2">Stok</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $index => $produk)
                                <tr class="text-center border-t">
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $produk->nama_produk }}</td>
                                    <td class="px-4 py-2 max-w-xs truncate">{{ $produk->deskripsi }}</td>
                                    <td class="px-4 py-2">
                                        @if($produk->foto)
                                            <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk" class="h-16 mx-auto rounded" />
                                        @else
                                            <span class="text-gray-500 italic">Belum ada</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $produk->stok }}</td>
                                    <td class="px-4 py-2 space-y-1">
                                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Detail</a>
                                        @if(in_array($produk->status, ['rejected', 'pending']))
                                            <a href="{{ route('penjual.produk.edit', $produk->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded">Edit</a>
                                            <form action="{{ route('penjual.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 italic text-sm">Tidak tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-[#1E1E3F] text-white py-12 mt-10">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-bold mb-2">Suplify</h3>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Information</h3>
                <ul class="text-sm space-y-1">
                    <li><a href="#" class="hover:underline">Produk & Layanan</a></li>
                    <li><a href="#" class="hover:underline">Cara Kerja</a></li>
                    <li><a href="#" class="hover:underline">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Company</h3>
                <ul class="text-sm space-y-1">
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Kontak</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center text-sm mt-6 border-t border-white pt-4">&copy; 2025 Suplify. All rights reserved.</div>
    </footer>
</x-app-layout>
 