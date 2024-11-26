<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = 'pengaturan';

    protected $fillable = [
        'nama_mesjid',
        'alamat',
        'koordinat',
        'no_telp',
        'nama_pimpinan',
        'no_hp',
        'email',
    ];
}
