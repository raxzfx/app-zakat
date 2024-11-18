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

    public function transaksiPenerimaan(){
        return $this->hasMany(TransaksiPenerimaan::class , 'id_muzaki', 'id');
    }
}
