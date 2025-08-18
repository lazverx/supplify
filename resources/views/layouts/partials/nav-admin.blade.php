<nav class="bg-[#fdebc3] rounded-t-lg px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('image/logo-supplify.png') }}" alt="Supplify Logo" class="h-[70px] w-[40x]">
        </div>

        <!-- Menu -->
        <div class="flex space-x-6 text-sm font-medium text-black">
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="hover:underline">Users</a>
            <a href="{{ route('admin.produk.index') }}" class="hover:underline">Produk</a>
            <a href="{{ route('admin.validasi.log') }}" class="hover:underline">Log Produk</a>
            <a href="{{ route('admin.transaksi.log') }}" class="hover:underline">Log Transaksi</a>
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <button type="button" id="logout-btn" class="bg-white text-yellow-600 px-4 py-1 rounded-lg font-semibold shadow hover:bg-gray-100 transition">
                Logout
            </button>
        </form>
        </div>
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