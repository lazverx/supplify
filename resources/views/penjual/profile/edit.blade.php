<x-app-layout>
    <div class="py-8">
        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 border-b pb-3">
                 Edit Biodata
            </h1>

            <form method="POST" action="{{ route('penjual.profile.update') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Alamat</label>
                    <input type="text" name="alamat"
                        value="{{ old('alamat', $profile->alamat ?? '') }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 p-3">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">No HP</label>
                    <input type="text" name="no_hp"
                        value="{{ old('no_hp', $profile->no_hp ?? '') }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 p-3">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Email Kontak (opsional, untuk perusahaan)
                    </label>
                    <input type="email" name="email_kontak"
                        value="{{ old('email_kontak', $profile->email_kontak ?? '') }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 p-3">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Nama Perusahaan (opsional)
                    </label>
                    <input type="text" name="nama_perusahaan"
                        value="{{ old('nama_perusahaan', $profile->nama_perusahaan ?? '') }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 p-3">
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition duration-200">
                         Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

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
                window.location.href = "{{ route('penjual.profile.index')}}";
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
</x-app-layout>
