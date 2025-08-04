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
        'status'
    ];

    public function produk() 
    {
        return $this->belongsTo(Produk::class);
    }

    public function pembeli() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
