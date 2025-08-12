{{-- resources/views/landing.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplify</title>
    @vite('resources/css/app.css')

    <style>
        /* Animasi Fade */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeInUp 0.8s ease forwards;
        }

        .fade-delay-1 {
            animation-delay: 0.3s;
        }

        .fade-delay-2 {
            animation-delay: 0.6s;
        }
    </style>
</head>

<body class="bg-[#223A5E] font-sans">

    {{-- Navbar --}}
    <nav class="bg-[#FAE3AC] px-8 py-4 shadow flex justify-between items-center rounded-b-2xl fade-up">
        <div class="flex items-center gap-3">
            <img src="{{ asset('image/logo-supplify.png') }}" alt="Supplify Logo" class="h-[70px] w-auto">
            <span class="font-bold text-xl text-[#223A5E]">Supplify</span>
        </div>

    </nav>

    {{-- Hero Section --}}
    <section class="bg-[#223A5E] px-6 md:px-10 py-10 mt-8">
        <div class="grid md:grid-cols-2 gap-10 items-center">
            <div class="flex flex-col gap-6 fade-up fade-delay-1">
                <h1 class="text-white font-extrabold text-3xl md:text-4xl leading-tight">
                    Simplify Your Supply, Amplify Your Growth.
                </h1>
                <div class="bg-[#FAE3AC] p-5 rounded-lg shadow-lg">
                    <p class="text-[#000] text-base leading-relaxed">
                        Suplify adalah platform yang menghubungkan Anda dengan pemasok terpercaya, membantu bisnis mendapatkan bahan baku dan produk berkualitas tepat waktu.
                    </p>
                </div>
                <div class="flex gap-4 mt-2">
                    <a href="{{ route('login')}}" class="bg-[#EACD79] px-6 py-2 rounded font-bold text-[#223A5E] hover:bg-[#dcb95f] transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="border-2 border-white px-6 py-2 rounded font-bold text-white hover:bg-white hover:text-[#223A5E] transition">
                        Daftar
                    </a>
                </div>
            </div>
            <div class="fade-up fade-delay-2">
                <img src="{{ asset('image/hero-seller.jpg') }}" alt="Hero" class="rounded-lg shadow-lg w-full object-cover">
            </div>
        </div>
    </section>

    {{-- Produk Section --}}
    <section class="bg-[#223A5E] px-6 md:px-10 py-10 mt-8 fade-up">
        <div class="bg-[#FAE3AC] py-10 px-4 rounded-lg">
            <h2 class="text-center text-2xl font-semibold text-gray-800 mb-6">Our Best Sellers</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ([
                ['kayu.png', 'Kayu Papan', '$4.20'],
                ['leather.png', 'Kulit Sintetis', '$4.00'],
                ['benang.png', 'Benang Wol', '$4.00'],
                ['kancing.png', 'Kancing', '$4.00'],
                ['kaleng.png', 'Kaleng', '$4.00'],
                ['pipa.png', 'Pipa Paralon', '$4.00']
                ] as $produk)
                <div class="bg-white rounded-lg p-4 flex flex-col items-center shadow hover:shadow-lg transition fade-up">
                    <img src="{{ asset('image/' . $produk[0]) }}" alt="{{ $produk[1] }}" class="w-40 h-40 object-contain rounded-[10px] mb-4">
                    <h3 class="text-gray-800 font-medium">{{ $produk[1] }}</h3>
                    <p class="text-red-500 text-sm">{{ $produk[2] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- About Us --}}
    <div class="bg-[#223A5E] p-6 md:p-8 mt-8 mb-8 fade-up">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="w-full md:w-1/2 fade-up fade-delay-1">
                <img src="{{ asset('image/about-us.jpg') }}" alt="Tentang Kami" class="rounded-lg shadow-lg w-[400px] h-auto object-cover">
            </div>
            <div class="w-full ml-5 md:text-4xl text-white fade-up fade-delay-2">
                <h2 class="text-3xl font-bold mb-3">About Us</h2>
                <p class="text-gray-300 text-base leading-relaxed mb-4">
                    Suplify adalah platform inovatif yang mempermudah proses pemenuhan kebutuhan Anda dengan cepat, aman, dan efisien.
                </p>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="bg-[#FAE3AC] text-black py-16 text-center rounded-[10px] mb-8 fade-up">
        <h2 class="text-2xl font-bold mb-4">Belanja? Jualan? Semua bisa di Supplify.</h2>
        <p class="mb-6">Login atau daftar sekarang, mulai perjalananmu bersama Supplify</p>

        <div class="flex flex-row justify-center gap-4">
            <a href="{{ route('login') }}" class="bg-white text-[#223A5E] font-bold px-8 py-3 rounded-full shadow hover:bg-gray-100">
                Login
            </a>
            <a href="{{ route('register') }}" class="bg-white text-[#223A5E] font-bold px-8 py-3 rounded-full shadow hover:bg-gray-100">
                Daftar
            </a>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-[#FBE3A0] text-black fade-up">
        <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <img src="{{ asset('image/logo-supplify.png') }}" alt="Logo Supplify" class="w-12 mb-4">
                <p class="text-sm mb-4">Supplify mempermudah Anda terhubung dengan pemasok terpercaya.</p>
            </div>

            <div>
                <h3 class="font-bold mb-3">Customer Service</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        📧 Email:
                        <a href="mailto:ajipamungkasoffice7308@gmail.com" class="hover:underline text-[#223A5E]">
                            ajipamungkasoffice7308@gmail.com
                        </a>
                    </li>
                    <li>
                        💬 WhatsApp:
                        <a href="https://wa.me/6282329453188" target="_blank" class="hover:underline text-[#223A5E]">
                            +62 823-2945-3188
                        </a>
                    </li>
                    <li>
                        📱 Instagram:
                        <a href="https://instagram.com/supplify" target="_blank" class="hover:underline text-[#223A5E]">
                            @supplify
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold mb-3">Jam Layanan</h3>
                <p class="text-sm">Senin - Jumat: 08:00 - 17:00 WIB</p>
                <p class="text-sm">Sabtu: 09:00 - 15:00 WIB</p>
                <p class="text-sm">Minggu & Libur Nasional: Tutup</p>
            </div>
        </div>

        <div class="bg-[#223A5E] text-white text-center py-4">
            <p class="text-sm">© 2025 Supplify. All rights reserved.</p>
        </div>
    </footer>


</body>

</html>