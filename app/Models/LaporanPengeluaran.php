<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPengeluaran extends Model
{
    protected $table = 'transaksi_pengeluaran'; //diambil dari tabel transaksi_pengeluaran
    
    protected $fillable = [
        'tanggal_pengeluaran',
        'jenis_zakat',
        'id_muzakki',
        'jumlah',
        'total'
    ];
}