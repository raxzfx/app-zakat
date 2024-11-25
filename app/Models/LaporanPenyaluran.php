<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenyaluran extends Model
{
    protected $table = 'transaksi_pengeluaran'; //diambil dari tabel transaksi_pengeluaran
    
    protected $fillable = [
        'tgl_transaksi',
        'jenis_zakat',
        'nama_penerima',
        'alamat_penerima',
        'jumlah',
        'total'
    ];
}