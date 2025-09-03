<nav class="bg-[#FAE3AC] text-gray-800 shadow-md border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo dan Navigasi -->
        <div class="flex items-center gap-10">
              <!-- Logo -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('image/logo-supplify.png') }}" alt="Supplify Logo" class="h-[70px] w-[40x]">
        </div>


            <!-- Menu Navigasi -->
            <div class="flex gap-6 font-semibold">
                <a href="{{ route('pembeli.dashboard') }}" class="hover:text-blue-700">Dashboard</a>
                <a href="{{ route('pembeli.profile.index') }}" class="hover:text-blue-700">Biodata</a>
                <a href="{{ route('pembeli.marketplace.index') }}" class="hover:text-blue-700">Marketplace</a>
                <a href="{{ route('pembeli.cart.index') }}" class="hover:text-blue-700 relative">
                    Keranjang
                    @if($totalCart > 0)
                    <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                        {{ $totalCart }}
                    </span>
                    @endif
                </a>
                <a href="{{ route('pembeli.transaksi.index') }}" class="hover:text-blue-700">Riwayat Pembelian</a>
                {{-- <a href="{{ route('pembeli.produk.favorit') }}" class="hover:text-blue-700">Produk Favorit</a> --}}
            </div>
        </div>

        <!-- Tombol Logout -->
         <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <button type="button" id="logout-btn" class="bg-white text-yellow-600 px-4 py-1 rounded-lg font-semibold shadow hover:bg-gray-100 transition">
                Logout
            </button>
        </form>
    </div>
</nav>


{{-- SweetAlert2 --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    document.getElementById('logout-btn').addEventListener('click', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Yakin mau logout?',
            text: "Kamu akan keluar dari akun ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>