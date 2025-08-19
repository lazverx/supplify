<x-app-layout>
    <!-- Hero Section -->
    <section class="px-6 md:px-10 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center w-full">

            <!-- Kotak Navy -->
            <div class="bg-[#1F2544] text-white w-full h-full p-8 md:p-12 rounded-lg shadow-lg"
                data-aos="fade-right">
                <h1 class="font-bold text-3xl md:text-5xl leading-tight">
                    Simplify Your <br> Supply, Amplify <br> Your Growth.
                </h1>
                <p class="mb-8 mt-2 text-base md:text-lg lg:text-xl font-medium leading-relaxed text-gray-200 max-w-xl" data-aos="fade-up" data-aos-delay="200">
                    Suplify mempertemukan penjual dan pembeli dalam satu platform
                    untuk memudahkan jual beli bahan baku dan produk berkualitas
                    secara cepat, transparan, dan tepat waktu.
                </p>
                <div class="flex space-x-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('penjual.produk.create') }}"
                        class="bg-[#FAE3AC] text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-200 transition">
                        Tambah Produk
                    </a>
                    <a href="#about"
                        class="border border-[#FAE3AC] px-6 py-3 rounded-lg font-semibold hover:bg-[#FAE3AC] hover:text-gray-900 transition">
                        Tentang Kami
                    </a>
                </div>
            </div>

            <!-- Gambar -->
            <div class="flex justify-center" data-aos="fade-left" data-aos-delay="200">
                <img src="{{ asset('image/hero-seller.jpg') }}"
                    alt="Product Image"
                    class="rounded-lg shadow-lg w-full h-[500px] object-cover">
            </div>
        </div>
    </section>


    {{-- About Us --}}
    <div id="about" class="bg-[#1F2544] p-6 md:p-8 mb-8 mx-8 rounded-[10px]" data-aos="fade-up">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="w-full md:w-1/2" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('image/about-us.jpg') }}" alt="Tentang Kami" class="rounded-lg shadow-lg w-[400px] h-auto object-cover">
            </div>
            <div class="w-full ml-5 md:text-4xl text-white" data-aos="fade-left" data-aos-delay="200">
                <h2 class="text-3xl font-bold mb-3">Tentang Kami</h2>
                <p class="text-gray-300 text-base leading-relaxed mb-4">
                    Suplify adalah platform inovatif yang hadir untuk mempermudah proses pemenuhan kebutuhan Anda dengan cepat, aman, dan efisien.
                </p>
            </div>
        </div>
    </div>


    <!-- Cara Mengajukan Produk -->
    <div class="bg-[#1F2544] py-16 px-6 mx-8 mb-8 rounded-lg text-white text-center" data-aos="fade-up">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-bold mb-10" data-aos="fade-down">Cara Mengajukan Produk</h2>

            <div class="flex flex-col md:flex-row items-center justify-center gap-6 relative">
                <!-- Step 1 -->
                <div class="bg-white text-gray-800 p-6 rounded-xl shadow-md w-full md:w-1/3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="flex flex-col items-center">
                        <div class="mb-4">
                            <img src="{{ asset('image/icons/shopping.svg') }}" class="h-10 w-10">
                        </div>
                        <h3 class="text-lg font-bold mb-2">1. Ajukan Produk</h3>
                        <p class="text-sm text-center">Unggah produk sisa industri atau limbah yang masih bernilai.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-white text-gray-800 p-6 rounded-xl shadow-md w-full md:w-1/3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="flex flex-col items-center">
                        <div class="mb-4">
                            <img src="{{ asset('image/icons/verif.svg') }}" class="h-10 w-10">
                        </div>
                        <h3 class="text-lg font-bold mb-2">2. Proses Verifikasi</h3>
                        <p class="text-sm text-center">Tim kami akan meninjau dan menyetujui produkmu.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-white text-gray-800 p-6 rounded-xl shadow-md w-full md:w-1/3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="flex flex-col items-center">
                        <div class="mb-4">
                            <img src="{{ asset('image/icons/basket.svg') }}" class="h-10 w-10">
                        </div>
                        <h3 class="text-lg font-bold mb-2">3. Mulai Jualan</h3>
                        <p class="text-sm text-center">Produk tampil di etalase Supplify dan siap dijual!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="bg-[#1F2544] text-white py-12 px-6 mx-8 mb-8 rounded-lg text-center" data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-10">Statistik Kami</h2>
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white text-gray-900 rounded-xl shadow-md p-6 flex flex-col items-center" data-aos="flip-left" data-aos-delay="100">
                <p class="text-2xl font-bold mb-2">100+</p>
                <p class="text-lg font-semibold">Perusahaan</p>
            </div>
            <div class="bg-white text-gray-900 rounded-xl shadow-md p-6 flex flex-col items-center" data-aos="flip-left" data-aos-delay="200">
                <p class="text-2xl font-bold mb-2">100+</p>
                <p class="text-lg font-semibold">Produk</p>
            </div>
            <div class="bg-white text-gray-900 rounded-xl shadow-md p-6 flex flex-col items-center" data-aos="flip-left" data-aos-delay="300">
                <p class="text-2xl font-bold mb-2">100+</p>
                <p class="text-lg font-semibold">UMKM</p>
            </div>
        </div>
    </div>


    <!-- Layanan -->
    <div class="bg-[#1F2544] py-16 px-6 mx-8 mb-8 rounded-lg text-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-8">Layanan Terbaik untuk Mendukung Bisnismu</h2>
            <div class="grid md:grid-cols-3 gap-8 text-left">
                <div class="bg-[#FAE3AC] text-black p-6 rounded-xl" data-aos="zoom-in" data-aos-delay="100">
                    <h3 class="font-bold text-xl mb-2">Pengajuan Produk</h3>
                    <p>Ajukan produk sisa industri atau limbah yang masih bernilai tinggi.</p>
                </div>
                <div class="bg-[#FAE3AC] text-black p-6 rounded-xl" data-aos="zoom-in" data-aos-delay="200">
                    <h3 class="font-bold text-xl mb-2">Logistik</h3>
                    <p>Solusi pengiriman produk yang efisien ke seluruh Indonesia.</p>
                </div>
                <div class="bg-[#FAE3AC] text-black p-6 rounded-xl" data-aos="zoom-in" data-aos-delay="300">
                    <h3 class="font-bold text-xl mb-2">Promosi Produk</h3>
                    <p>Tampilkan produkmu di halaman utama Supplify.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Call To Action -->
    <div class="bg-[#FAE3AC] text-black py-16 mx-8 rounded-lg mb-8 text-center" data-aos="zoom-in">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Punya produk sisa industri yang masih bisa dimanfaatkan?</h2>
            <p class="mb-6">Ajukan sekarang dan bantu UMKM berkembang bersama Supplify.</p>
            <a href="{{ route('penjual.produk.create') }}" class="bg-white text-yellow-600 font-bold px-8 py-3 rounded-lg shadow hover:bg-gray-100">
                Tambahkan Produk
            </a>
        </div>
    </div>

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
</x-app-layout>