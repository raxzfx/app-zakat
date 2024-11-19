<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPengeluaran extends Model
{
    protected $table = 'transaksi_pengeluaran';

    protected $fillable = [
        'nama_pengeluaran',
        'alamat_penerima',
        'jumlah',
        'tgl_transaksi',
        'jenis_zakat',
    ];

    public function jenisPenyaluran()
{
    return $this->belongsTo(JenisPenyaluran::class, 'jenis_zakat', 'kode_jenis');
}
}
