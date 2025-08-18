<x-guest-layout>
    @push('styles')
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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
                    <img src="{{ asset('images/suplify-logo.png') }}" alt="Suplify Logo" class="w-24">
                </div>
            </div>

            <!-- Right Form Section -->
            <div class="md:w-1/2 w-full bg-[#1f2544] text-white flex flex-col justify-center p-12">
                <h2 class="text-3xl font-bold mb-8 text-white text-center">Hello, Welcome Back</h2>

                <x-auth-session-status class="mb-4 text-yellow-400" :status="session('status')" />

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
                            class="w-[400px] h-[55px] ml-2 px-4 rounded-md bg-[#2C3159] text-white border-none placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <div>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Password"
                            class="w-[400px] h-[55px] ml-2 px-4 rounded-md bg-[#2C3159] text-white border-none placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                    </div>

                    <div class="ml-2 flex items-center">
                        <input id="remember_me" type="checkbox" class="mr-2 rounded border-gray-300 text-yellow-400 bg-[#2C3159] focus:ring-yellow-400" name="remember">
                        <label for="remember_me" class="text-sm text-white">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-[400px] h-[55px] ml-2 py-2 rounded-md bg-[#F5DEB3] text-black font-semibold hover:bg-[#f0d68a] transition">
                            Login
                        </button>
                    </div>

                    <p class="text-sm text-gray-300 text-center">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-[#F5DEB3] hover:underline">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
</x-guest-layout>
