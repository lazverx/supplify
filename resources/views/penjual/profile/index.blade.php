<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Biodata Perusahaan
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                            ✅ {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-4 p-4 text-red-800 bg-red-100 border border-red-300 rounded-lg">
                            ⚠️{{ session('error') }}
                        </div>
                    @endif

                    <table class="w-full text-sm border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="font-semibold w-1/3 px-4 py-3">Nama</td>
                                <td class="px-4 py-3">{{ $penjual->name }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="font-semibold px-4 py-3">Email</td>
                                <td class="px-4 py-3">{{ $penjual->email }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="font-semibold px-4 py-3">Alamat</td>
                                <td class="px-4 py-3">{{ $penjual->profile->alamat ?? '-' }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="font-semibold px-4 py-3">No HP</td>
                                <td class="px-4 py-3">{{ $penjual->profile->no_hp ?? '-' }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="font-semibold px-4 py-3">Nama Perusahaan</td>
                                <td class="px-4 py-3">{{ $penjual->profile->nama_perusahaan ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6 text-right">
                        <a href="{{ route('penjual.profile.edit') }}"
                           class="inline-block px-5 py-2.5 bg-blue-600 text-white font-medium rounded-xl shadow-md hover:bg-blue-700 transition-all duration-200">
                            Edit Biodata
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
