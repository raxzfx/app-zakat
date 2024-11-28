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

    public function jenisPengeluaran()
{
    return $this->belongsTo(JenisPengeluaran::class, 'jenis_zakat', 'kode_jenis');
}

    public function laporanPengeluaran(){
        return $this->hasMany(LaporanPengeluaran::class, 'transaksi_pengeluaran', 'id');
    }
}
