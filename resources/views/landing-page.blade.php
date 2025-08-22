{{-- resources/views/landing.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplify</title>
    @vite('resources/css/app.css')

    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .btn {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #FAE3AC 0%, #1F2544 50%);
        }
    </style>
</head>

<body class="bg-white font-sans">

    {{-- Navbar --}}
    <nav class="bg-[#FAE3AC] px-8 py-4 shadow flex justify-between items-center mb-8" data-aos="fade-down" data-aos-duration="800">
        <div class="flex items-center gap-3">
            <img src="{{ asset('image/logo-supplify.png') }}" alt="Supplify Logo" class="h-[70px] w-auto">
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="gradient-bg px-6 md:px-12 py-16 rounded-[10px] mx-8" data-aos="fade-up" data-aos-duration="1000">
        <div class="grid md:grid-cols-2 gap-10 items-center max-w-7xl mx-auto">
            <div class="flex flex-col gap-6 text-white">
                <h1 class="font-extrabold text-3xl md:text-5xl leading-tight" data-aos="fade-right" data-aos-duration="1000">
                    Simplify Your <br> Supply, Amplify <br> Your Growth.
                </h1>
                <p class="text-gray-200 text-base leading-relaxed max-w-md font-poppins" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
                    Suplify mempertemukan penjual dan pembeli dalam satu platform untuk memudahkan jual beli bahan baku dan produk berkualitas secara cepat, transparan, dan tepat waktu.
                </p>
                <div class="flex flex-wrap gap-4 mt-2" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="900">
                    <a href="{{ route('register') }}" class="btn bg-[#FAE3AC] text-[#1F2544] px-6 py-3 rounded-md font-bold shadow">
                        mulai sekarang
                    </a>
                    <a href="#products" class="btn border-2 border-white px-6 py-3 rounded-md font-bold text-white hover:bg-white hover:text-[#1F2544] transition">
                        jelajahi produk
                    </a>
                </div>
            </div>
            <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                <img src="{{ asset('image/hero-seller.jpg') }}" alt="Hero Image" class="rounded-lg shadow-lg w-full object-cover h-[350px] md:h-[450px]">
            </div>
        </div>
    </section>

    {{-- Produk Terlaris Section --}}
    <section id="products" class="bg-[#1F2544] px-6 md:px-10 py-12 mt-8 rounded-[10px] mb-8 mx-8" data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-8 items-center">
            <div class="text-white" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="text-2xl md:text-4xl font-extrabold mb-4">produk terlaris kami</h2>
                <p class="text-gray-200 text-base leading-relaxed">
                    Favorit nomor satu, kualitas terjamin, terbukti paling dicari.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-6">
                @foreach ([['kayu.png', 'Kayu Papan', 'Rp. 30.000'],
                ['leather.png', 'Kulit Sintetis', 'Rp. 30.000'],
                ['benang.png', 'Benang Wol', 'Rp. 30.000'],
                ['kancing.png', 'Kancing', 'Rp. 30.000']] as $produk)
                <div class="card bg-white rounded-lg p-4 flex flex-col items-center shadow" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 200 }}" data-aos-duration="900">
                    <img src="{{ asset('image/' . $produk[0]) }}" alt="{{ $produk[1] }}" class="w-28 h-28 object-contain rounded-md mb-3">
                    <h3 class="text-gray-800 font-semibold text-sm">{{ $produk[1] }}</h3>
                    <p class="text-red-500 text-xs">{{ $produk[2] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contoh Kreasi Produk --}}
    <section class="bg-[#1F2544] rounded-[10px] p-6 md:p-8 mb-8 mx-8" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-white font-bold text-2xl md:text-3xl mb-10 text-center" data-aos="fade-down" data-aos-duration="900">
            contoh kreasi produk
        </h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-[#FAE3AC] rounded-lg p-6 flex flex-col items-center text-center" data-aos="flip-left" data-aos-duration="1000">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">kulit sintetis</h3>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('image/leather.jpg') }}" class="w-32 h-32 object-cover rounded-md">
                    <span class="text-2xl font-bold">→</span>
                    <img src="{{ asset('image/belts.jpg') }}" class="w-32 h-32 object-cover rounded-md">
                </div>
            </div>
            <div class="bg-[#FAE3AC] rounded-lg p-6 flex flex-col items-center text-center" data-aos="flip-right" data-aos-duration="1000">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">benang wol</h3>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('image/benang.png') }}" class="w-32 h-32 object-cover rounded-md">
                    <span class="text-2xl font-bold">→</span>
                    <img src="{{ asset('image/bebek.png') }}" class="w-32 h-32 object-cover rounded-md">
                </div>
            </div>
        </div>
    </section>

    {{-- About Us --}}
    <div class="bg-[#1F2544] p-6 md:p-8 mt-8 mb-8 mx-8 rounded-[10px]" data-aos="fade-up" data-aos-duration="1000">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="w-full md:w-1/2" data-aos="fade-right" data-aos-duration="1000">
                <img src="{{ asset('image/about-us.jpg') }}" class="rounded-lg shadow-lg w-[400px] h-auto object-cover">
            </div>
            <div class="w-full ml-5 md:text-4xl text-white" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <h2 class="text-3xl font-bold mb-3">About Us</h2>
                <p class="text-gray-300 text-base leading-relaxed mb-4">
                    Suplify adalah platform inovatif yang hadir untuk mempermudah proses pemenuhan kebutuhan Anda dengan cepat, aman, dan efisien. Kami menghubungkan pengguna dengan berbagai produk berkualitas dari pemasok terpercaya.
                </p>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="bg-[#FAE3AC] text-black py-16 text-center rounded-[10px] mb-8 mx-8" data-aos="zoom-in" data-aos-duration="900">
        <h2 class="text-2xl font-bold mb-4">Belanja? Jualan? Semua bisa di Supplify.</h2>
        <p class="mb-6">Login atau daftar sekarang, mulai perjalananmu bersama Supplify</p>
        <div class="flex flex-row justify-center gap-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            <a href="{{ route('login') }}" class="btn bg-white text-[#223A5E] font-bold px-8 py-3 rounded-[10px] shadow">Login</a>
            <a href="{{ route('register') }}" class="btn bg-white text-[#223A5E] font-bold px-8 py-3 rounded-[10px] shadow">Daftar</a>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-[#FAE3AC] text-black" data-aos="fade-up" data-aos-duration="1000">
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
                        <a href="mailto:ajipamungkasoffice7308@gmail.com" class="hover:underline text-[#223A5E]">ajipamungkasoffice7308@gmail.com</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('image/icons/whatsapp.svg') }}" class="w-5 h-5">
                        <a href="https://wa.me/6282329453188" target="_blank" class="hover:underline text-[#223A5E]">+62 823-2945-3188</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('image/icons/instagram.svg') }}" class="w-5 h-5">
                        <a href="https://instagram.com/supplify" target="_blank" class="hover:underline text-[#223A5E]">@supplify</a>
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
        <div class="bg-[#1F2544] text-white text-center py-4" data-aos="fade-in" data-aos-duration="1000">
            <p class="text-sm">© 2025 Supplify. All rights reserved.</p>
        </div>
    </footer>

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 120
        });
    </script>
</body>

</html>