<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-900 px-4 py-8">
        <div class="flex flex-col md:flex-row bg-white rounded-2xl shadow-2xl overflow-hidden w-full max-w-5xl transform animate-fade-in-up min-h-[600px]">
            <!-- Gambar -->
            <div class="md:w-1/2">
                <img
                    src="{{ asset('image/login-image.jpg') }}"
                    alt="Login Image"
                    class="object-cover h-full w-full"
                />
            </div>

            <!-- Form -->
            <div class="md:w-1/2 w-full p-12 bg-[#1f2544] text-white flex flex-col justify-center">
                <h2 class="text-3xl font-bold mb-8">Hello, Welcome Back</h2>

                <x-auth-session-status class="mb-4 text-yellow-400" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-6">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Email"
                            class="w-full px-4 py-2 rounded bg-[#2f365e] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <div class="mb-6">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Password"
                            class="w-full px-4 py-2 rounded bg-[#2f365e] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                    </div>

                    <div class="flex items-center mb-6">
                        <input id="remember_me" type="checkbox" class="mr-2 rounded border-gray-300 text-yellow-400 shadow-sm focus:ring-yellow-500 bg-gray-800" name="remember">
                        <label for="remember_me" class="text-sm text-white">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <div class="mb-8">
                        <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded transition duration-300">
                            Login
                        </button>
                    </div>

                    <div class="flex justify-between text-sm text-gray-300">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="hover:underline">
                                Forgot your password?
                            </a>
                        @endif
                        <a href="{{ route('register') }}" class="hover:underline">
                            Don’t have an account? <span class="text-yellow-400">Sign up</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>