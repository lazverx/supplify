<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-900 px-4 py-8">
        <div class="flex flex-col md:flex-row bg-white rounded-2xl shadow-2xl overflow-hidden w-full max-w-5xl transform animate-fade-in-up min-h-[600px]">
            <!-- Gambar -->
            <div class="md:w-1/2">
                <img
                    src="{{ asset('image/login-image.jpg') }}"
                    alt="Register Image"
                    class="object-cover h-full w-full"
                />
            </div>

            <!-- Form -->
            <div class="md:w-1/2 w-full p-10 bg-[#1f2544] text-white flex flex-col justify-center">
                <h2 class="text-3xl font-bold mb-6">Create an Account</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="w-full px-4 py-2 rounded bg-[#2f365e] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="w-full px-4 py-2 rounded bg-[#2f365e] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="w-full px-4 py-2 rounded bg-[#2f365e] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="w-full px-4 py-2 rounded bg-[#2f365e] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Role Selection -->
                    <div class="mb-4">
                        <x-input-label for="role" :value="__('Role')" />
                        <select id="role" name="role" required class="w-full px-4 py-2 rounded bg-[#2f365e] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="">-- Pilih Role --</option>
                            <option value="pembeli" {{ old('role') == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
                            <option value="penjual" {{ old('role') == 'penjual' ? 'selected' : '' }}>Penjual</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-6">
                        <x-primary-button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded transition duration-300">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

                    <!-- Already Registered Link -->
                    <div class="text-sm">
                        <a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-300 underline">
                            {{ __('Already registered? Login') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>