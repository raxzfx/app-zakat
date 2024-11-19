<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPenerimaan extends Model
{
    protected $table = 'jenis_penerimaan';

    protected $fillable = [
        'kode_jenis',
        'deskripsi',
    ];

    public function transaksiPenerimaan()
    {
        return $this->hasMany(TransaksiPenerimaan::class, 'jenis_zakat', 'kode_jenis');
    }
}
