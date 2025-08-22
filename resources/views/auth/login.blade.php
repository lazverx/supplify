<x-guest-layout>
    <!-- Tambahkan AOS CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <div class="min-h-screen flex items-center justify-center font-poppins px-4 py-8">
        <div class="w-full max-w-5xl rounded-3xl overflow-hidden shadow-2xl flex md:flex-row flex-col min-h-[600px]"
             data-aos="zoom-in" data-aos-duration="1000">
            
            <!-- Left Image Section -->
            <div class="md:w-1/2 w-full relative" data-aos="fade-right" data-aos-duration="1200">
                <img src="{{ asset('image/login-image.jpg') }}" alt="Login Image" class="w-full h-full object-cover" />
                <div class="absolute top-5 left-5" data-aos="fade-down" data-aos-delay="200">
                    <img src="{{ asset('image/logo-putih.png') }}" alt="Suplify Logo" class="w-24">
                </div>
            </div>

            <!-- Right Form Section -->
            <div class="md:w-1/2 w-full bg-[#1f2544] text-white flex flex-col justify-center p-12"
                 data-aos="fade-left" data-aos-duration="1200">
                <h2 class="text-3xl font-bold mb-8 text-white text-center" data-aos="fade-down" data-aos-delay="300">
                    Hello, Welcome Back
                </h2>

                <x-auth-session-status class="mb-4 text-yellow-400" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div data-aos="fade-up" data-aos-delay="400">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Email"
                            class="w-[400px] h-[55px] ml-2 px-4 rounded-md bg-[#2C3159] text-white border-none placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Password -->
                    <div data-aos="fade-up" data-aos-delay="500">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Password"
                            class="w-[400px] h-[55px] ml-2 px-4 rounded-md bg-[#2C3159] text-white border-none placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Remember Me -->
                    <div class="ml-2 flex items-center" data-aos="fade-up" data-aos-delay="600">
                        <input id="remember_me" type="checkbox" class="mr-2 rounded border-gray-300 text-yellow-400 bg-[#2C3159] focus:ring-yellow-400" name="remember">
                        <label for="remember_me" class="text-sm text-white">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Button -->
                    <div data-aos="fade-up" data-aos-delay="700">
                        <button type="submit"
                                class="w-[400px] h-[55px] ml-2 py-2 rounded-md bg-[#F5DEB3] text-black font-semibold hover:bg-[#f0d68a] transition">
                            Login
                        </button>
                    </div>

                    <!-- Link -->
                    <p class="text-sm text-gray-300 text-center" data-aos="fade-up" data-aos-delay="800">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-[#F5DEB3] hover:underline">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Tambahkan AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // animasi hanya sekali
            offset: 100, // jarak sebelum animasi mulai
        });
    </script>
</x-guest-layout>
