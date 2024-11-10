<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mustahiq extends Model
{
    protected $table = 'mustahiq';

    protected $fillable = [
        'kode_jenis',
        'nik',
        'nama_jenis',
    ];
}
