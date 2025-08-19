<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg mt-8 shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Biodata</h1>

        <form method="POST" action="{{ route('pembeli.profile.update') }}" class="space-y-4">
            @csrf

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input type="text" name="alamat"
                       value="{{ old('alamat', $profile->alamat ?? '') }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>

            <!-- No HP -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No HP</label>
                <input type="text" name="no_hp"
                       value="{{ old('no_hp', $profile->no_hp ?? '') }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>

            <!-- Email Kontak -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Kontak (opsional, untuk perusahaan)</label>
                <input type="email" name="email_kontak"
                       value="{{ old('email_kontak', $profile->email_kontak ?? '') }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>

            <!-- Nama Perusahaan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan (opsional)</label>
                <input type="text" name="nama_perusahaan"
                       value="{{ old('nama_perusahaan', $profile->nama_perusahaan ?? '') }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>

            <!-- Tombol -->
            <div class="pt-4">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow transition">
                    Simpan
                </button>
            </div>
        </form>
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
            window.location.href = "{{ route('pembeli.profile.index')}}";
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
