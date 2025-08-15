<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Biodata Perusahaan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="mb-4 p-4 text-green-800 bg-green-200 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-4 p-4 text-red-800 bg-red-200 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="w-full text-sm">
                        <tr>
                            <td class="font-semibold w-1/4">Nama</td>
                            <td>{{ $penjual->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Email</td>
                            <td>{{ $penjual->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Alamat</td>
                            <td>{{ $penjual->profile->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">No HP</td>
                            <td>{{ $penjual->profile->no_hp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Nama Perusahaan</td>
                            <td>{{ $penjual->profile->nama_perusahaan ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('penjual.profile.edit') }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Edit Biodata
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
