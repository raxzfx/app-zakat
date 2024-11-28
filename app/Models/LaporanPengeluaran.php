<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPengeluaran extends Model
{
    protected $table = 'laporan_pengeluaran';

    protected $fillable = [
        'jenis_zakat',
        'jumlah_pengeluaran',
        'transaksi_pengeluaran'
    ];

    public function jenisZakat(){
        return $this->belongsTo(JenisPengeluaran::class, 'jenis_pengeluaran' , 'kode_jenis');  
    }
    public function transaksiPengeluaran(){
        return $this->belongsTo(TransaksiPengeluaran::class, 'transaksi_pengeluaran' , 'id');  
    }
}
