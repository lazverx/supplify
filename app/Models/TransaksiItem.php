<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Transaksi;

class TransaksiItem extends Model
{
    protected $fillable = ['transaksi_id', 'produk_id', 'qty', 'harga', 'subtotal'];

    public function produk() 
    {
        return $this->belongsTo(Produk::class);
    }

    public function transaksi() 
    {
        return $this->belongsTo(Transaksi::class);
    } 
}
