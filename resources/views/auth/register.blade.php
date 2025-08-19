<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-8">
        <div class="flex flex-col md:flex-row bg-[#1F2544] rounded-2xl shadow-2xl overflow-hidden w-full max-w-5xl min-h-[600px]">
            
            <!-- Bagian Gambar -->
            <div class="md:w-1/2 hidden md:block">
                <img
                    src="{{ asset('image/login-image.jpg') }}"
                    alt="Register Image"
                    class="object-cover h-full w-full"
                />
                
            </div>

            <!-- Bagian Form -->
            <div class="md:w-1/2 w-full p-10 text-white flex flex-col justify-center">
                <h2 class="text-2xl md:text-3xl font-bold mx-auto mb-8">Create an account</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <x-text-input 
                            id="name" 
                            class="w-[400px] h-[55px] ml-4 px-4 py-3 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-0" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            placeholder="Name"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <x-text-input 
                            id="email" 
                            type="email" 
                            class="w-[400px] h-[55px] ml-4 px-4 py-3 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-0" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            placeholder="Email"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-text-input 
                            id="password" 
                            class="w-[400px] h-[55px] ml-4 px-4 py-3 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-0" 
                            type="password" 
                            name="password" 
                            required 
                            placeholder="Password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-text-input 
                            id="password_confirmation" 
                            class="w-[400px] h-[55px] ml-4 px-4 py-3 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-0" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            placeholder="Confirm Password"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Role -->
                    <div class="mb-6">
                        <select 
                            id="role" 
                            name="role" 
                            required 
                            class="w-[400px] h-[55px] ml-4 px-4 py-3 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-0" 
                        >
                            <option value="">Pilih Role</option>
                            <option value="pembeli" {{ old('role') == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
                            <option value="penjual" {{ old('role') == 'penjual' ? 'selected' : '' }}>Penjual</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-6">
                        <button 
                            type="submit" 
                            class="w-[400px] h-[55px] ml-4 bg-[#FAE3AC] hover:bg-[#e2cd90] text-[#1F2544] font-bold py-3 rounded transition duration-300">
                            Register
                        </button>
                    </div>

                    <!-- Login Link -->
                    <p class="text-sm text-center">
                        Already Registered? 
                        <a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-300">
                            Login here
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
