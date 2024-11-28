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
        'nama_lengkap',
    ];

    public function TransaksiPenyaluran() {
        return $this->hasMany(TransaksiPenyaluran::class, 'nama_penerima' , 'id');
    }
}
