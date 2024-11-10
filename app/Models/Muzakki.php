<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    protected $table = 'muzakki';

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'alamat',
        'no_telp',
    ];
}
