<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Biodata Saya
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full text-sm">
                        <tr>
                            <td class="font-semibold w-1/4">Nama</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Alamat</td>
                            <td>{{ $user->profile->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">No HP</td>
                            <td>{{ $user->profile->no_hp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Nama UMKM (Opsional)</td>
                            <td>{{ $user->profile->nama_perusahaan ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('pembeli.profile.edit') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Edit Biodata
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>