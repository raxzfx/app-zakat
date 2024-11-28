<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenerimaan extends Model
{
    protected $table = 'laporan_penerimaan'; 
    
     public function muzakki()
    {
        return $this->belongsTo(Muzakki::class);
    }

    public function jenisZakat()
    {
        return $this->belongsTo(JenisPenerimaan::class);
    }

    public function transaksiPenerimaan()
    {
        return $this->belongsTo(TransaksiPenerimaan::class);
    }
}
