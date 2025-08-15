<x-app-layout>
    <!-- Navbar -->

    <div class="p-8 bg-white min-h-screen">
        <!-- Hero Section -->
        <!-- resources/views/components/hero.blade.php -->
        <div class="grid grid-cols-1 md:grid-cols-2 rounded-[10px] overflow-hidden mb-8">

            <!-- Kiri (Teks) -->
            <div class="bg-[#0A1B2F] py-16 px-6 text-white mr-8">
                <h1 class="text-3xl md:text-4xl font-extrabold leading-snug mb-6">
                    supplify <br> dolor sit amet
                </h1>
                <p class="text-gray-300 text-base leading-relaxed max-w-md">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                </p>
            </div>

            <!-- Kanan (Gambar) -->
            <div>
                <img src="{{ asset('image/about-us.jpg') }}"
                    alt="Hero Image"
                    class="w-full h-full object-cover ">
            </div>
        </div>

        <!-- Tentang Kami -->
        <div class="bg-[#0A1B2F] rounded-[10px] p-6 md:p-8 mb-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">

                <!-- Gambar di kiri -->
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('image/about-us.jpg') }}"
                        alt="Tentang Kami"
                        class="rounded-lg shadow-lg w-[400px] h-auto object-cover">
                </div>

                <!-- Teks di kanan -->
                <div class="w-full ml-5 md:text-4xl text-white">
                    <h2 class="text-3xl font-bold mb-3">about us</h2>
                    <p class="text-gray-300 text-base leading-relaxed mb-4">Suplify adalah platform inovatif yang hadir untuk mempermudah proses pemenuhan kebutuhan Anda dengan cepat, aman, dan efisien.
                        Kami menghubungkan pengguna dengan berbagai produk berkualitas dari pemasok terpercaya, memastikan setiap transaksi berjalan lancar dan memuaskan.
                    </p>
                    <p class="text-gray-300 text-base leading-relaxed">Dengan komitmen pada transparansi, kemudahan, dan layanan pelanggan yang responsif, Suplify berupaya menjadi solusi terbaik bagi individu maupun bisnis dalam mendapatkan barang yang mereka butuhkan.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-[#0B1C2C] rounded-xl p-10 flex flex-col items-center mx-8 mb-8">
        <h2 class="text-white font-bold text-2xl mb-8">lorem ipsum dolor</h2>
        <div class="flex items-center gap-12">
            <!-- Gambar bahan kulit -->
            <img src="{{ asset('image/leather.jpg') }}" alt="Leather" class="w-56 h-56 object-cover rounded-xl shadow-lg">

            <!-- Panah -->
            <span class="text-white text-6xl">→</span>

            <!-- Gambar sabuk kulit -->
            <img src="{{ asset('image/belts.jpg') }}" alt="Belts" class="w-56 h-56 object-cover rounded-xl shadow-lg">
        </div>
    </div>


    <!-- footer -->
    @include('layouts.partials.footer')
</x-app-layout>