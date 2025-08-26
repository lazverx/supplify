<x-app-layout>
    {{-- Tambahkan AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Hero Section -->
    <section class="bg-[#1F2544] px-6 md:px-12 py-16 rounded-[10px] mt-8 mb-8 mx-8">
        <div class="grid md:grid-cols-2 gap-10 items-center max-w-7xl mx-auto">

            <!-- Left Content -->
            <div class="flex flex-col gap-6 text-white" data-aos="fade-right" data-aos-duration="1200">
                <h1 class="font-extrabold text-3xl md:text-5xl leading-tight">
                    Simplify Your <br> Supply, Amplify <br> Your Growth.
                </h1>
                <p class="text-gray-200 text-base leading-relaxed max-w-md">
                    Suplify mempertemukan penjual dan pembeli dalam satu platform
                    untuk memudahkan jual beli bahan baku dan produk berkualitas
                    secara cepat, transparan, dan tepat waktu.
                </p>
                <div class="flex gap-4">
                    <a href="#about" class="bg-[#FAE3AC] text-[#1F2544] px-6 py-3 rounded-lg font-semibold hover:bg-[#f7d98a] transition">Pelajari Lebih Lanjut</a>
                    <a href="#produk" class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-[#1F2544] transition">Lihat Produk</a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="relative" data-aos="fade-left" data-aos-duration="1200">
                <img src="{{ asset('image/hero-seller.jpg') }}"
                    alt="Hero Image"
                    class="rounded-lg shadow-lg w-full object-cover h-[350px] md:h-[450px]">
            </div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <div id="about" class="bg-[#1F2544] rounded-[10px] p-6 md:p-8 mx-8 mb-8">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
            <div class="w-full md:w-1/2" data-aos="zoom-in" data-aos-duration="1200">
                <img src="{{ asset('image/about-us.jpg') }}"
                    alt="Tentang Kami"
                    class="rounded-lg shadow-lg w-[400px] h-auto object-cover">
            </div>
            <div class="w-full ml-5 md:text-4xl text-white" data-aos="fade-left" data-aos-duration="1200">
                <h2 class="text-3xl font-bold mb-3">About Us</h2>
                <p class="text-gray-300 text-base leading-relaxed mb-4">
                    Suplify adalah platform inovatif yang hadir untuk mempermudah proses pemenuhan kebutuhan Anda dengan cepat, aman, dan efisien.
                    Kami menghubungkan pengguna dengan berbagai produk berkualitas dari pemasok terpercaya, memastikan setiap transaksi berjalan lancar dan memuaskan.
                </p>
                <p class="text-gray-300 text-base leading-relaxed">
                    Dengan komitmen pada transparansi, kemudahan, dan layanan pelanggan yang responsif, Suplify berupaya menjadi solusi terbaik bagi individu maupun bisnis dalam mendapatkan barang yang mereka butuhkan.
                </p>
            </div>
        </div>
    </div>

    {{-- Contoh Kreasi Produk --}}
    <section class="bg-[#1F2544] rounded-[10px] p-6 md:p-8 mb-8 mx-8" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-white font-bold text-2xl md:text-3xl mb-10 text-center" data-aos="fade-down" data-aos-duration="900">
            contoh kreasi produk
        </h2>
        <div class="grid md:grid-cols-2 gap-6">

            {{-- Kulit sintetis jadi Sabuk --}}
            <div class="bg-[#FAE3AC] rounded-lg p-6 flex flex-col items-center text-center" data-aos="flip-left" data-aos-duration="1000">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Kulit sintetis</h3>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('image/leather.jpg') }}" class="w-32 h-32 object-cover rounded-md">
                    <span class="text-2xl font-bold">→</span>
                    <img src="{{ asset('image/belts.jpg') }}" class="w-32 h-32 object-cover rounded-md">
                </div>
                <p class="mt-4 text-gray-700 leading-relaxed">
                    Dari potongan <span class="font-semibold">kulit sintetis</span>, kita bisa membuat <span class="font-semibold">sabuk handmade</span>.
                    Prosesnya tidak sulit, cukup dengan sedikit keterampilan menjahit dan alat sederhana.
                    Hasil akhirnya kokoh, elegan, dan ramah lingkungan karena memanfaatkan bahan sisa yang biasanya terbuang.
                </p>
            </div>

            {{-- Benang jadi Boneka Rajut --}}
            <div class="bg-[#FAE3AC] rounded-lg p-6 flex flex-col items-center text-center" data-aos="flip-right" data-aos-duration="1000">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Benang wol</h3>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('image/benang.png') }}" class="w-32 h-32 object-cover rounded-md">
                    <span class="text-2xl font-bold">→</span>
                    <img src="{{ asset('image/bebek.png') }}" class="w-32 h-32 object-cover rounded-md">
                </div>
                <p class="mt-4 text-gray-700 leading-relaxed">
                    Dari sisa <span class="font-semibold">benang wol</span>, kita bisa mengolahnya menjadi <span class="font-semibold">boneka rajut (amigurumi)</span>.
                    Membuatnya membutuhkan kesabaran, tapi tidak sulit untuk dipelajari dengan pola sederhana.
                    Produk ini sangat diminati karena unik, lucu, dan bisa jadi hadiah spesial buatan tangan.
                </p>
            </div>

        </div>
    </section>


    {{-- Footer --}}
    <footer class="bg-[#FAE3AC] text-black"
        data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <img src="{{ asset('image/logo-supplify.png') }}" class="h-[50px] w-auto">
                <p class="text-sm mb-4">Supplify mempermudah Anda terhubung dengan pemasok terpercaya.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <h3 class="font-bold mb-3">Customer Service</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('image/icons/gmail.svg') }}" class="w-5 h-5">
                        <a href="mailto:ajipamungkasoffice7308@gmail.com" class="hover:underline text-[#223A5E]">
                            ajipamungkasoffice7308@gmail.com
                        </a>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('image/icons/whatsapp.svg') }}" class="w-5 h-5">
                        <a href="https://wa.me/6282329453188" target="_blank" class="hover:underline text-[#223A5E]">
                            +62 823-2945-3188
                        </a>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('image/icons/instagram.svg') }}" class="w-5 h-5">
                        <a href="https://instagram.com/supplify" target="_blank" class="hover:underline text-[#223A5E]">
                            @supplify
                        </a>
                    </li>
                </ul>
            </div>
            <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <h3 class="font-bold mb-3">Jam Layanan</h3>
                <p class="text-sm">Senin - Jumat: 08:00 - 17:00 WIB</p>
                <p class="text-sm">Sabtu: 09:00 - 15:00 WIB</p>
                <p class="text-sm">Minggu & Libur Nasional: Tutup</p>
            </div>
        </div>
        <div class="bg-[#1F2544] text-white text-center py-4"
            data-aos="fade-in" data-aos-duration="1000">
            <p class="text-sm">© 2025 Supplify. All rights reserved.</p>
        </div>
    </footer>

    {{-- Tambahkan AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</x-app-layout>