<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            Checkout
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        {{-- Informasi Pembeli --}}
        <div class="bg-white p-6 rounded-lg shadow mb-8">
            <h3 class="text-lg font-semibold mb-4">Informasi Pembeli</h3>
            <div class="space-y-2">
                <p><span class="font-medium">Nama:</span> {{ $user->name }}</p>
                <p><span class="font-medium">No. HP:</span> {{ $user->profile->no_hp ?? '-' }}</p>
                <p><span class="font-medium">Alamat:</span> {{ $user->profile->alamat ?? 'Belum diisi' }}</p>
                <p><span class="font-medium">Email Kontak:</span> {{ $user->profile->email_kontak ?? $user->email }}</p>
            </div>
        </div>

        <form action="{{ route('pembeli.cart.checkout') }}" method="POST" class="grid md:grid-cols-3 gap-6">
            @csrf

            {{-- Kolom Kiri: Metode Pembayaran --}}
            <div class="bg-white p-6 rounded-lg shadow md:col-span-2">
                <h3 class="text-lg font-semibold mb-4">Pilih Metode Pembayaran</h3>
                <div class="space-y-4">
                    <label class="flex items-center border p-4 rounded-lg cursor-pointer hover:border-blue-500">
                        <input type="radio" name="metode_pembayaran" value="BCA Virtual Account" class="mr-3" required>
                        <img src="{{ asset('image/bca.png') }}" alt="BCA" class="h-6 mr-2">
                        <span>BCA Virtual Account</span>
                    </label>
                    <label class="flex items-center border p-4 rounded-lg cursor-pointer hover:border-blue-500">
                        <input type="radio" name="metode_pembayaran" value="Mandiri Virtual Account" class="mr-3">
                        <img src="{{ asset('image/mandiri.png') }}" alt="Mandiri" class="h-6 mr-2">
                        <span>Mandiri Virtual Account</span>
                    </label>
                    <label class="flex items-center border p-4 rounded-lg cursor-pointer hover:border-blue-500">
                        <input type="radio" name="metode_pembayaran" value="QRIS" class="mr-3">
                        <img src="{{ asset('image/qris.png') }}" alt="QRIS" class="h-6 mr-2">
                        <span>QRIS</span>
                    </label>
                </div>
            </div>

            {{-- Kolom Kanan: Ringkasan Pesanan --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h3>

                @php $total = 0; @endphp
                @foreach ($cartItems as $item)
                    @php 
                        $subtotal = $item->produk->harga * $item->qty;
                        $total += $subtotal;
                    @endphp
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('storage/' . $item->produk->foto) }}" alt="{{ $item->produk->nama_produk }}" class="w-20 h-20 rounded mr-4 object-cover">
                        <div>
                            <h4 class="font-semibold">{{ $item->produk->nama_produk }}</h4>
                            <p class="text-gray-600 text-sm">Rp {{ number_format($item->produk->harga, 0, ',', '.') }} x {{ $item->qty }}</p>
                            <p class="font-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach

                {{-- Hidden input supaya server-side tahu ini checkout cart --}}
                <input type="hidden" name="checkout_type" value="cart">

                <div class="border-t pt-4 mt-4 space-y-2">
                    <p class="flex justify-between text-gray-700">
                        <span>Total</span>
                        <span class="font-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </p>
                    <p id="metode-pembayaran-ringkasan" class="flex justify-between text-gray-700">
                        <span>Metode Pembayaran</span>
                        <span class="font-bold text-black" id="metode-pembayaran-text">-</span>
                    </p>
                </div>

                <button type="submit" class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                    Bayar Sekarang
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

{{-- SweetAlert2 --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = "{{ route('pembeli.transaksi.index')}}";
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Biodata Belum Lengkap',
        text: "{{ session('error') }}",
        showCancelButton: true,
        confirmButtonText: 'Lengkapi Biodata',
        cancelButtonText: 'Nanti Saja'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('profile.index') }}"; 
        }
    });
</script>
@endif


<script>
document.addEventListener('DOMContentLoaded', () => {
  const radios = document.querySelectorAll('input[name="metode_pembayaran"]');
  const ringkasanText = document.getElementById('metode-pembayaran-text');

  radios.forEach(radio => {
    radio.addEventListener('change', function() {
      ringkasanText.textContent = this.value;
    });
  });
});
</script>
