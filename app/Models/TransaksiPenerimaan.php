<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenerimaan extends Model
{
    protected $table = 'transaksi_penerimaan';

    protected $fillable = [
        'tgl_transaksi',
        'id_muzakki',
        'jenis_zakat',
        'jumlah',
        'bukti',
        'tgl_penerimaan'
    ];

    public function jenisPenerimaan()
{
    return $this->belongsTo(JenisPenerimaan::class, 'jenis_zakat', 'kode_jenis');
}
public function muzakki()
{
    return $this->belongsTo(Muzakki::class, 'nama_muzakki', 'nama_lengkap');
}
}

