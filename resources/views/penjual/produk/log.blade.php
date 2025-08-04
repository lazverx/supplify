<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Riwayat Pembelian
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <div class="bg-[#2E3A59] text-white p-6 rounded-t-lg">
            <h2 class="text-xl font-bold">Log Produk</h2>
        </div>

        <div class="bg-white shadow-md rounded-b-lg overflow-x-auto">
            <div class="p-4 flex justify-between items-center">
                <form action="{{ route('penjual.produk.log') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="search"
                        class="border border-gray-300 rounded-l-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    <button type="submit"
                        class="bg-yellow-400 px-3 py-1 rounded-r-md hover:bg-yellow-500 transition">
                        🔍
                    </button>
                </form>
            </div>

            <table class="min-w-full table-auto text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Produk</th>
                        <th class="px-4 py-2">Deskripsi</th>
                        <th class="px-4 py-2">Foto Produk</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produks as $index => $produk)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $produk->nama_produk }}</td>
                        <td class="px-4 py-2 max-w-[200px] overflow-hidden truncate">{{ $produk->deskripsi }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}"
                                class="w-16 h-16 object-cover rounded" />
                        </td>
                        <td class="px-4 py-2">
                            @if ($produk->status === 'pending')
                            <span class="text-yellow-600 font-semibold">Pending</span>
                            @elseif ($produk->status === 'approved')
                            <span class="text-green-600 font-semibold">Approved</span>
                            @elseif ($produk->status === 'rejected')
                            <span class="text-red-600 font-semibold">Rejected</span>
                            @else
                            <span class="text-gray-500">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 max-w-xs">
                            @if ($produk->status === 'pending')
                            <p class="text-yellow-700">Produk anda saat ini masih menunggu validasi oleh admin.</p>
                            @elseif ($produk->status === 'approved')
                            <p class="text-green-700">Produk anda sudah disetujui dan akan tampil di halaman utama.</p>
                            @elseif ($produk->status === 'rejected')
                            <p class="text-red-700">Produk anda ditolak, mohon periksa dan revisi data produk anda.</p>
                            @else
                            <p class="text-gray-500">Status tidak diketahui.</p>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center px-4 py-4 text-gray-500">
                            Belum ada produk yang diajukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>