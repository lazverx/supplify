<x-app-layout>
    <!-- Navbar -->


    <!-- Hero Section -->
    <div class="bg-[#1E1E3F] text-white py-16 px-6 rounded-b-3xl">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-8">
            <!-- Teks -->
            <div class="md:w-1/2">
                <h1 class="text-4xl font-bold mb-4">Lorem ipsum dolor sit amet</h1>
                <p class="text-lg opacity-90 mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel voluptatem accusamus earum voluptates...
                </p>
                <div class="flex gap-4">
                    <a href="{{ route('penjual.produk.create') }}" class="bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-300 transition">
                        Tambah Produk
                    </a>
                    <a href="#tentang" class="bg-white text-blue-800 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition">
                        Tentang Kami
                    </a>
                </div>
            </div>
            <!-- Gambar -->
            <div class="md:w-1/2">
                <img src="{{ asset('image/hero-seller.jpg') }}" alt="Ilustrasi" class="rounded-xl shadow-lg">
            </div>
        </div>
    </div>

    <!-- Tentang Kami -->
    <div id="tentang" class="bg-[#2F2F5F] text-white py-16 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
                <p class="text-gray-300 leading-relaxed">
                    Supplify hadir untuk membantu pelaku UMKM dan penjual industri memanfaatkan produk sisa atau limbah industri menjadi peluang bisnis yang berkelanjutan.
                </p>
            </div>
            <div class="bg-gray-300 w-full h-48 rounded-lg"></div>
        </div>
    </div>

    <!-- Cara Mengajukan Produk -->
    <div class="bg-[#2F2F5F] py-16 px-6 text-white text-center">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-bold mb-10">Cara Mengajukan Produk</h2>

            <div class="flex flex-col md:flex-row items-center justify-center gap-6 relative">
                <!-- Step 1 -->
                <div class="bg-white text-gray-800 p-6 rounded-xl shadow-md w-full md:w-1/3">
                    <div class="flex flex-col items-center">
                        <!-- Icon -->
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13v6M9 13V9a3 3 0 013-3h3a3 3 0 013 3v4m-6 4h.01" />
                            </svg>
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2h-4.586a1 1 0 00-.707.293L3 17l1.414 1.414 10.293-10.293A1 1 0 0115 8h3a1 1 0 011 1v4h1z" />
                            </svg>
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11l-1.35 4.032A2 2 0 0014.537 17H19a2 2 0 002-2v-5a2 2 0 00-2-2h-2" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">3. Mulai Jualan</h3>
                        <p class="text-sm text-center">Produk tampil di etalase Supplify dan siap dijual!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Statistik -->
    <div class="bg-[#1E1E3F] text-white py-12 px-6 text-center">
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
    <div class="bg-[#2F2F5F] py-16 px-6 text-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-8">Layanan Terbaik untuk Mendukung Bisnismu</h2>
            <div class="grid md:grid-cols-3 gap-8 text-left">
                <div class="bg-gray-200 text-gray-800 p-6 rounded-xl">
                    <h3 class="font-bold text-xl mb-2">Pengajuan Produk</h3>
                    <p>Ajukan produk sisa industri atau limbah yang masih bernilai tinggi.</p>
                </div>
                <div class="bg-gray-200 text-gray-800 p-6 rounded-xl">
                    <h3 class="font-bold text-xl mb-2">Logistik</h3>
                    <p>Solusi pengiriman produk yang efisien ke seluruh Indonesia.</p>
                </div>
                <div class="bg-gray-200 text-gray-800 p-6 rounded-xl">
                    <h3 class="font-bold text-xl mb-2">Promosi Produk</h3>
                    <p>Tampilkan produkmu di halaman utama Supplify.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call To Action -->
    <div class="bg-yellow-400 text-black py-16 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Punya produk sisa industri yang masih bisa dimanfaatkan?</h2>
            <p class="mb-6">Ajukan sekarang dan bantu UMKM berkembang bersama Supplify.</p>
            <a href="{{ route('penjual.produk.create') }}" class="bg-white text-yellow-600 font-bold px-8 py-3 rounded-full shadow hover:bg-gray-100">
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