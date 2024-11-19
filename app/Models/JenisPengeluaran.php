<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    protected $table = 'jenis_pengeluaran';

    protected $fillable = [

    ];

    public function transaksiPenyaluran()
{
    return $this->hasMany(TransaksiPenyaluran::class, 'jenis_zakat', 'kode_jenis');
}

}
