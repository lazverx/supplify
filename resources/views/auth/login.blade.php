<x-guest-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">



    @push('style')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    @endpush

    <body class="bg-gray-100 min-h-screen flex items-center justify-center font-poppins">
        <div class="w-full max-w-5xl rounded-3xl overflow-hidden shadow-2xl flex md:flex-row flex-col min-h-[600px]">

            <!-- Left Image Section -->
            <div class="md:w-1/2 w-full relative">
                <img src="{{ asset('image/login-image.jpg') }}" alt="Login Image" class="w-full h-full object-cover" />
                <div class="absolute top-5 left-5">
                    <img src="{{ asset('image/logo-putih.png') }}" alt="Suplify Logo" class="w-24">
                </div>
            </div>

            <!-- Right Form Section -->
            <div class="md:w-1/2 w-full bg-[#1f2544] text-white flex flex-col justify-center p-12">
                <h2 class="text-3xl font-bold mb-8 text-white text-center">
                    Selamat Datang Kembali
                </h2>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Email"
                            class="w-[400px] h-[55px] ml-2 px-4 rounded-md bg-[#2C3159] text-white border-none placeholder-gray-300 focus:outline-none focus:ring-0" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <div class="mb-4 relative w-[400px] ml-2">
                        <x-text-input
                            id="password"
                            class="w-full h-[55px] px-4 py-3 pr-12 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            type="password"
                            name="password"
                            required
                            placeholder="Password" />
                        <button type="button"
                            onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-yellow-400">
                            <i class="fa-solid fa-eye-slash"></i>
                        </button>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                    </div>

                    <div>
                        <button type="submit"
                            class="w-[400px] h-[55px] ml-2 py-2 rounded-md bg-[#F5DEB3] text-black font-semibold hover:bg-[#f0d68a] transition">
                            Login
                        </button>
                    </div>

                    <p class="text-sm text-gray-300 text-center">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-[#F5DEB3] hover:underline">Daftar disini</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
</x-guest-layout>
<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    AOS.init({
        duration: 1000, // durasi animasi (ms)
        once: true, // animasi hanya sekali
        easing: 'ease-in-out', // efek animasi lebih halus
    });
</script>

<script>
    // Toggle Password
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }

        // SweetAlert untuk error login
    </script>
    @if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            text: '{{ $errors->first() }}',
            confirmButtonColor: '#1f2544',
        });
    </script>
    @endif
    
    @if(session('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('status') }}",
            confirmButtonColor: '#1f2544',
        });
    </script>
    @endif
    <script>
</script>