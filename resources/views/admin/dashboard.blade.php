<x-app-layout>
    <div class="p-6 space-y-6 bg-gray-50 dark:bg-gray-900 min-h-screen">
        {{-- Title --}}
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard Admin</h1>

        {{-- 📊 Statistik Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
                <h2 class="text-gray-500 dark:text-gray-400 text-sm">Total Produk</h2>
                <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $totalProduk }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
                <h2 class="text-gray-500 dark:text-gray-400 text-sm">Total Pengguna</h2>
                <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $totalPengguna }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
                <h2 class="text-gray-500 dark:text-gray-400 text-sm">Total Transaksi</h2>
                <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $totalTransaksi }}</p>
            </div>
        </div>

        {{-- 📈 Chart Section --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Grafik Penjualan Bulanan</h2>
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</x-app-layout>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($bulan), // array bulan dari controller
            datasets: [{
                label: 'Total Penjualan',
                data: @json($penjualan), // data penjualan per bulan
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: { color: '#fff' }
                }
            },
            scales: {
                x: { ticks: { color: '#fff' } },
                y: { ticks: { color: '#fff' } }
            }
        }
    });
</script>
