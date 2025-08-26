<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Log Transaksi</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Log Transaksi {{ $penjualId ? ' - Penjual ID: '.$penjualId : '' }}</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pembeli</th>
                <th>Produk</th>
                <th>Penjual</th>
                <th>Qty</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->created_at->format('d-m-Y') }}</td>
                    <td>{{ $log->transaksi->pembeli->name ?? '-' }}</td>
                    <td>{{ $log->produk->nama_produk ?? '-' }}</td>
                    <td>{{ $log->produk->penjual->name ?? '-' }}</td>
                    <td>{{ $log->qty }}</td>
                    <td>Rp {{ number_format($log->qty * $log->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
