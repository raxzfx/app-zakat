<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenerimaan extends Model
{
    protected $table = 'transaksi_penerimaan'; //diambil dari tabel transaksi_penerimaan
    
    protected $fillable = [
        'tanggal_transaksi',
        'jenis_zakat',
        'alamat_penerima',
        'jumlah',
        'total'
    ];
}