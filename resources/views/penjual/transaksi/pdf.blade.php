<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi Produk</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background: #1F2544; color: white; }
        h2 { text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Riwayat Transaksi Produk Saya</h2>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Pembeli</th>
                <th>Jumlah</th>
                <th>Alamat Pembeli</th>
                <th>Harga Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $transaksi)
            <tr>
                <td>
                    @foreach ($transaksi->transaksisProduk as $item)
                        {{ $item->produk->nama_produk }} (x{{ $item->qty }})<br>
                    @endforeach
                </td>
                <td>{{ $transaksi->pembeli->name ?? '-' }}</td>
                <td>{{ $transaksi->transaksisProduk->sum('qty') }}</td>
                <td>{{ $transaksi->alamat_pengiriman }}</td>
                <td>
                    Rp{{ number_format($transaksi->transaksisProduk->sum(function($item) {
                        return $item->qty * $item->harga;
                    }), 0, ',', '.') }}
                </td>
                <td>{{ $transaksi->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center">Belum ada transaksi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
