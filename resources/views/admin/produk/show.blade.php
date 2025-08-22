<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">
            Detail Produk
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 flex flex-col md:flex-row gap-10 transform hover:scale-[1.01] transition duration-300 ease-in-out">

            <!-- Bagian Kiri (Gambar Produk) -->
            <div class="md:w-1/2 flex justify-center items-center">
                <div class="w-full aspect-[4/3] overflow-hidden rounded-xl bg-gradient-to-tr from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 shadow-inner">
                    <img src="{{ asset('storage/' . $produk->foto) }}" 
                         alt="{{ $produk->nama_produk }}"
                         class="w-full h-full object-contain hover:scale-110 transition duration-500 ease-in-out" />
                </div>
            </div>

            <!-- Bagian Kanan (Detail Produk) -->
            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h3 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100 mb-6 tracking-wide">
                        {{ $produk->nama_produk }}
                    </h3>

                    <div class="space-y-4 text-gray-700 dark:text-gray-300 leading-relaxed">
                        <p><span class="font-semibold text-gray-900 dark:text-gray-200">Deskripsi:</span> {{ $produk->deskripsi }}</p>
                        <p><span class="font-semibold text-gray-900 dark:text-gray-200">Stok:</span> {{ $produk->stok }}</p>
                        <p><span class="font-semibold text-gray-900 dark:text-gray-200">Lokasi:</span> {{ $produk->lokasi }}</p>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-4 mt-10">
                    <!-- Approve -->
                    <form action="{{ route('admin.validasi.approve', $produk->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-2.5 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                             Setujui
                        </button>
                    </form>

                    <!-- Reject -->
                    <form id="form-reject" action="{{ route('admin.validasi.reject', $produk->id) }}" method="POST">
                        @csrf
                        <button type="button" id="btn-reject"
                            class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-2.5 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                             Tolak
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- SweetAlert2 --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = "{{ route('admin.produk.index') }}"
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('error') }}",
        showConfirmButton: true
    });
</script>
@endif

{{-- Konfirmasi Reject --}}
<script>
    document.getElementById('btn-reject').addEventListener('click', function() {
        Swal.fire({
            title: 'Yakin mau menolak produk ini?',
            text: "Tindakan ini tidak bisa dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, tolak!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-reject').submit();
            }
        });
    });
</script>
