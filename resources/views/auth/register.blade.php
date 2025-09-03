<x-guest-layout>
    <!-- Tambahkan AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">


    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="flex flex-col md:flex-row bg-[#1F2544] rounded-2xl shadow-2xl overflow-hidden w-full max-w-5xl min-h-[600px]">

            <!-- Bagian Gambar -->
            <div class="md:w-1/2 hidden md:block">
                <img
                    src="{{ asset('image/login-image.jpg') }}"
                    alt="Register Image"
                    class="object-cover h-full w-full" />
            </div>

            <!-- Bagian Form -->
            <div class="md:w-1/2 w-full p-10 text-white flex flex-col justify-center">
                <h2 class="text-2xl md:text-3xl font-bold mx-auto mb-8">Register Akun</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <x-text-input
                            id="name"
                            class="w-[400px] h-[55px] ml-4 px-4 py-3 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            placeholder="Nama" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <x-text-input
                            id="email"
                            type="email"
                            class="w-[400px] h-[55px] ml-4 px-4 py-3 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            name="email"
                            :value="old('email')"
                            required
                            placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4 relative w-[400px] ml-4">
                        <x-text-input
                            id="password"
                            class="w-full h-[55px] px-4 py-3 pr-12 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            type="password"
                            name="password"
                            required
                            placeholder="Password" />
                        <button type="button"
                            onclick="togglePassword('password', this)"
                            class="absolute top-1/2 -translate-y-1/2 right-4 flex items-center text-gray-400 hover:text-yellow-400">
                            <i class="fa-solid fa-eye-slash"></i>
                        </button>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4 relative w-[400px] ml-4">
                        <x-text-input
                            id="password_confirmation"
                            class="w-full h-[55px] px-4 py-3 pr-12 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="Konfirmasi Password" />
                        <button type="button"
                            onclick="togglePassword('password_confirmation', this)"
                            class="absolute top-1/2 -translate-y-1/2 right-4 flex items-center text-gray-400 hover:text-yellow-400">
                            <i class="fa-solid fa-eye-slash"></i>
                        </button>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                    </div>




                    <!-- Role -->
                    <div class="mb-6">
                        <select
                            id="role"
                            name="role"
                            required
                            class="w-[400px] h-[55px] ml-4 px-4 py-3 rounded-lg bg-[#2F365E] text-white border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400">
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
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-300">
                            Login disini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Tambahkan AOS JS -->

</x-guest-layout>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        timer: 1500,
        confirmButtonColor: '#3085d6'
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: `
                <ul style="text-align: left; margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Coba Lagi'
    });
</script>
@endif


<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye"); // mata terbuka
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash"); // mata tertutup
        }
    }
</script>