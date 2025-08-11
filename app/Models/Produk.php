<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Produk extends Model
{
    protected $table = 'produks';

    protected $fillable = [
        'user_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'foto',
        'status',
        'stok',
        'lokasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penjual()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
