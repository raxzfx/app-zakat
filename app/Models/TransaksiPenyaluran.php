<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenyaluran extends Model
{
    protected $table = 'transaksi_penyaluran';

    protected $fillable = [
        'id_mustahiq',
        'jenis_zakat',
        'alamat_penerima',
        'jumlah',
        'tgl_transaksi',
        'nama_penerima',
    ];

    public function mustahiq()
    {
        return $this->belongsTo(Mustahiq::class, 'nama_penerima' , 'id');
    }

    public function jenisZakat()
{
    return $this->belongsTo(JenisPenyaluran::class, 'jenis_zakat', 'kode_jenis');
}
}
