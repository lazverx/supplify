<x-app-layout>
    <!-- Navbar -->


    <!-- Hero Section -->
       {{-- Hero Section --}}
       <section class="bg-[#1F2544] px-6 md:px-12 py-16 rounded-[10px] mx-8">
<div class="bg-[#1E1E3F] text-white py-16 px-6 rounded-lg mx-8 mb-8 mt-8 fade-up">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-8">
        
        <!-- Teks -->
        <div class="md:w-1/2 fade-right delay-200">
            <h1 class="text-3xl md:text-4xl font-bold leading-snug mb-4">
                Simplify Your Supply, <br> Amplify Your Growth.
            </h1>
            <p class="text-base md:text-lg opacity-90 mb-6">
                Suplify mempertemukan penjual dan pembeli dalam satu platform 
                untuk memudahkan jual beli bahan baku dan produk berkualitas 
                secara cepat, transparan, dan tepat waktu.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('penjual.produk.create') }}" 
                   class="bg-[#FAE3AC] text-black font-semibold px-6 py-3 rounded-lg hover:bg-[#e2cd90] transition">
                    Tambah Produk
                </a>
                <a href="#tentang" 
                   class="bg-white text-[#1E1E3F] font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition">
                    Tentang Kami
                </a>
            </div>
        </div>

        <!-- Gambar -->
        <div class="md:w-1/2 fade-left delay-400">
            <img src="{{ asset('image/hero-seller.jpg') }}" 
                 alt="Ilustrasi Hero" 
                 class="rounded-xl shadow-lg">
        </div>
    </div>
</div>
</section>


   {{-- About Us --}}
    <div class="bg-[#1F2544] p-6 md:p-8 mt-8 mb-8 mx-8 rounded-[10px] fade-up">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="w-full md:w-1/2 fade-up fade-delay-1">
                <img src="{{ asset('image/about-us.jpg') }}" alt="Tentang Kami" class="rounded-lg shadow-lg w-[400px] h-auto object-cover">
            </div>
            <div class="w-full ml-5 md:text-4xl text-white fade-up fade-delay-2">
                <h2 class="text-3xl font-bold mb-3">Tentang Kami</h2>
                <p class="text-gray-300 text-base leading-relaxed mb-4">
                    Suplify adalah platform inovatif yang hadir untuk mempermudah proses pemenuhan kebutuhan Anda dengan cepat, aman, dan efisien. Kami menghubungkan pengguna dengan berbagai produk berkualitas dari pemasok terpercaya, memastikan setiap transaksi berjalan lancar dan memuaskan.</p>
            </div>
        </div>
    </div>

    <!-- Cara Mengajukan Produk -->
    <div class="bg-[#1F2544] py-16 px-6 mx-8 mb-8 rounded-lg text-white text-center">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-bold mb-10">Cara Mengajukan Produk</h2>

            <div class="flex flex-col md:flex-row items-center justify-center gap-6 relative">
                <!-- Step 1 -->
                <div class="bg-white text-gray-800 p-6 rounded-xl shadow-md w-full md:w-1/3">
                    <div class="flex flex-col items-center">
                        <!-- Icon -->
                        <div class="mb-4">
                            <img src="{{ asset('image/icons/shopping.svg') }}"class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                
                        </div>
                        <h3 class="text-lg font-bold mb-2">1. Ajukan Produk</h3>
                        <p class="text-sm text-center">Unggah produk sisa industri atau limbah yang masih bernilai.</p>
                    </div>
                </div>

                <!-- Arrow -->
                <div class="hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </div>

                <!-- Step 2 -->
                <div class="bg-white text-gray-800 p-6 rounded-xl shadow-md w-full md:w-1/3">
                    <div class="flex flex-col items-center">
                        <!-- Icon -->
                        <div class="mb-4">
                          <img src="{{ asset('image/icons/verif.svg') }}" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        </div>
                        <h3 class="text-lg font-bold mb-2">2. Proses Verifikasi</h3>
                        <p class="text-sm text-center">Tim kami akan meninjau dan menyetujui produkmu.</p>
                    </div>
                </div>

                <!-- Arrow -->
                <div class="hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </div>

                <!-- Step 3 -->
                <div class="bg-white text-gray-800 p-6 rounded-xl shadow-md w-full md:w-1/3">
                    <div class="flex flex-col items-center">
                        <!-- Icon -->
                        <div class="mb-4">
                             <img src="{{ asset('image/icons/basket.svg') }}" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        </div>
                        <h3 class="text-lg font-bold mb-2">3. Mulai Jualan</h3>
                        <p class="text-sm text-center">Produk tampil di etalase Supplify dan siap dijual!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Statistik -->
    <div class="bg-[#1F2544] text-white py-12 px-6 mx-8 mb-8 rounded-lg text-center">
        <h2 class="text-2xl font-bold mb-10">Statistik Kami</h2>
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white text-gray-900 rounded-xl shadow-md p-6 flex flex-col items-center">
                <!-- Icon -->
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m9-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold mb-2">100+</p>
                <p class="text-lg font-semibold">Perusahaan</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white text-gray-900 rounded-xl shadow-md p-6 flex flex-col items-center">
                <!-- Icon -->
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4" />
                    </svg>
                </div>
                <p class="text-2xl font-bold mb-2">100+</p>
                <p class="text-lg font-semibold">Produk</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white text-gray-900 rounded-xl shadow-md p-6 flex flex-col items-center">
                <!-- Icon -->
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V4H2v16h5m10-6a3 3 0 00-6 0m6 0a3 3 0 11-6 0m6 0H9" />
                    </svg>
                </div>
                <p class="text-2xl font-bold mb-2">100+</p>
                <p class="text-lg font-semibold">UMKM</p>
            </div>
        </div>
    </div>


    <!-- Layanan -->
    <div class="bg-[#1F2544] py-16 px-6 mx-8 mb-8 rounded-lg text-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-8">Layanan Terbaik untuk Mendukung Bisnismu</h2>
            <div class="grid md:grid-cols-3 gap-8 text-left">
                <div class="bg-[#FAE3AC] text-black p-6 rounded-xl">
                    <h3 class="font-bold text-xl mb-2">Pengajuan Produk</h3>
                    <p>Ajukan produk sisa industri atau limbah yang masih bernilai tinggi.</p>
                </div>
                <div class="bg-[#FAE3AC] text-black p-6 rounded-xl">
                    <h3 class="font-bold text-xl mb-2">Logistik</h3>
                    <p>Solusi pengiriman produk yang efisien ke seluruh Indonesia.</p>
                </div>
                <div class="bg-[#FAE3AC] text-black p-6 rounded-xl">
                    <h3 class="font-bold text-xl mb-2">Promosi Produk</h3>
                    <p>Tampilkan produkmu di halaman utama Supplify.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call To Action -->
    <div class="bg-[#FAE3AC] text-black py-16 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Punya produk sisa industri yang masih bisa dimanfaatkan?</h2>
            <p class="mb-6">Ajukan sekarang dan bantu UMKM berkembang bersama Supplify.</p>
            <a href="{{ route('penjual.produk.create') }}" class="bg-white text-yellow-600 font-bold px-8 py-3 rounded-lg shadow hover:bg-gray-100">
                Tambahkan Produk
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-yellow-200 text-gray-800 py-10">
        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-6 px-6">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <img src="{{ asset('image/logo-supplify.png') }}" alt="Logo" class="h-6">
                    <span class="font-bold text-lg">Supplify</span>
                </div>
                <p class="text-sm">
                    Kami hadir untuk membantu pelaku industri dan UMKM saling terhubung melalui teknologi.
                </p>
                <div class="flex gap-4 mt-4">
                    <!-- Sosmed icon -->
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                </div>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Information</h4>
                <ul class="text-sm space-y-1">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Produk</a></li>
                    <li><a href="#">Layanan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Company</h4>
                <ul class="text-sm space-y-1">
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kontak</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center text-xs mt-6">
            © 2025 Supplify. All rights reserved.
        </div>
    </footer>
</x-app-layout>