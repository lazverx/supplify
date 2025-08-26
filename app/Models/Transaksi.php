<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'user_id',
        'jumlah',
        'total_harga',
        'alamat_pengiriman',
        'status',
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaksis()
    {
        return $this->hasMany(TransaksiItem::class, 'transaksi_id');
    }

    // public function items()
    // {
    //     return $this->hasMany(TransaksiItem::class, 'transaksi_id');
    // }

    public function transaksisProduk()
    {
        return $this->hasMany(TransaksiItem::class, 'transaksi_id')
            ->whereHas('produk', function ($q) {
                $q->where('user_id', auth()->id());
            });
    }


    public function itemsByPenjual($penjualId)
    {
        return $this->hasMany(TransaksiItem::class, 'transaksi_id')
            ->whereHas('produk', function ($q) use ($penjualId) {
                $q->where('user_id', $penjualId);
            });
    }
}
