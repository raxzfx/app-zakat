<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPenyaluran extends Model
{
    protected $table = 'jenis_penyaluran';

    protected $fillable = [
        'kode_jenis',
        'jenis_pengeluaran',
        'deskripsi',
    ];
    
    public function transaksiPenyaluran(){
        return $this->hasMany(TransaksiPenyaluran::class, 'jenis_zakat', 'kode_jenis');
    }
}
