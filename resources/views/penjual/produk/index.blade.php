<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            Produk Saya
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 animate-fadeIn">
        <div class="bg-[#FAE3AC] shadow-lg rounded-xl p-6 border border-[#2D3250]">

            {{-- Search & Tambah Produk --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <form action="{{ route('penjual.produk.index') }}" method="GET" class="flex items-center gap-2">
                    <input type="text" name="search" placeholder="Cari produk..."
                        class="px-4 py-2 rounded-lg bg-white text-[#2D3250] border border-[#2D3250]/40 focus:outline-none focus:ring-2 focus:ring-[#2D3250]" />
                    <button type="submit"
                        class="bg-[#2D3250] hover:bg-[#1f233a] text-[#FAE3AC] px-4 py-2 rounded-lg font-semibold transition">
                        🔍
                    </button>
                </form>
                <a href="{{ route('penjual.produk.create') }}"
                    class="bg-[#2D3250] hover:bg-[#1f233a] text-[#FAE3AC] px-5 py-2 rounded-lg font-semibold transition">
                    + Tambah Produk
                </a>
            </div>

            {{-- Tabel Produk --}}
            @if($produks->isEmpty())
            <p class="text-[#2D3250]/70 italic text-center py-8">Kamu belum menambahkan produk.</p>
            @else
            <div class="overflow-x-auto rounded-lg border border-[#2D3250]/30">
                <table class="min-w-full text-sm text-left border-collapse">
                    <thead class="bg-[#2D3250] text-[#FAE3AC] uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama Produk</th>
                            <th class="px-4 py-3">Deskripsi</th>
                            <th class="px-4 py-3">Foto Produk</th>
                            <th class="px-4 py-3">Stok</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($produks as $index => $produk)
                        <tr class="hover:bg-[#FAE3AC]/40 transition-colors">
                            <td class="px-4 py-3 text-[#2D3250]">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-[#2D3250]">{{ $produk->nama_produk }}</td>
                            <td class="px-4 py-3 text-[#2D3250]/80 max-w-xs truncate">
                                {{ $produk->deskripsi }}
                            </td>
                            <td class="px-4 py-3">
                                @if($produk->foto)
                                <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk"
                                    class="w-20 h-20 object-cover rounded-lg border border-[#2D3250] shadow-sm mx-auto">
                                @else
                                <span class="text-gray-400 italic">Belum ada</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-[#2D3250]">{{ $produk->stok }}</td>
                            <td class="px-4 py-3 space-y-1">
                                @if(in_array($produk->status, ['rejected', 'pending']))
                                <a href="{{ route('penjual.produk.edit', $produk->id) }}"
                                    class="bg-[#2D3250] hover:bg-[#1f233a] text-[#FAE3AC] px-3 mr-2 py-1 rounded-lg font-semibold transition">
                                    Edit
                                </a>
                                <form action="{{ route('penjual.produk.destroy', $produk) }}" method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg font-semibold transition delete-btn">
                                        Hapus
                                    </button>
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

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.4s ease-in-out;
        }
    </style>
</x-app-layout>


<form action="{{ route('penjual.produk.destroy', $produk) }}" method="POST" class="inline delete-form">
    @csrf
    @method('DELETE')
    <button type="button"
        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg font-semibold transition delete-btn">
        Hapus
    </button>
</form>

{{-- SweetAlert2 --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    // Konfirmasi sebelum hapus
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let form = this.closest('form');

            Swal.fire({
                title: 'Yakin ingin menghapus produk ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Notifikasi sukses setelah hapus
</script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
