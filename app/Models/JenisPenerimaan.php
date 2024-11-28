<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPenerimaan extends Model
{
    protected $table = 'jenis_penerimaan';


    // Nama primary key (jika bukan 'id')
    protected $primaryKey = 'kode_jenis';

    public $timestamps = true;

    // Jika primary key bukan auto-increment
    // public $incrementing = false;

    // Jika primary key bukan integer
    // protected $keyType = 'string';


    protected $fillable = [
        'kode_jenis',
        'deskripsi',
    ];

    public function transaksiPenerimaan()
    {
        return $this->hasMany(TransaksiPenerimaan::class, 'jenis_zakat', 'kode_jenis');
    }

    public function laporanPenerimaan()
    {
        return $this->hasMany(LaporanPenerimaan::class, 'jenis_zakat', 'kode_jenis');
    }
}
