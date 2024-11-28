<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    protected $table = 'jenis_pengeluaran';

    protected $primaryKey = 'kode_jenis';
    public $timestamps = true; // Default: aktif
    protected $fillable = [
        'kode_jenis',
        'jenis_pengeluaran',
        'deskripsi',
    ];

    public function transaksiPenyaluran()
    {
        return $this->hasMany(TransaksiPengeluaran::class, 'jenis_zakat', 'kode_jenis');
    }

    public function laporanPengeluaran(){
        return $this->hasMany(LaporanPengeluaran::class, 'jenis_pengeluaran', 'kode_jenis');
    }
    
}
