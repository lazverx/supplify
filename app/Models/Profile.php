<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'alamat',
        'no_hp',
        'email_kontak',
        'nama_perusahaan',
        'npwp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}