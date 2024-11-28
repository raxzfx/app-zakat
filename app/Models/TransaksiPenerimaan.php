<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TransaksiPenerimaan extends Model
{
    protected $table = 'transaksi_penerimaan';

    protected $dates = ['tgl_transaksi', 'tgl_penerimaan'];
    protected $fillable = [
        'tgl_transaksi',
        'id_muzaki',
        'jenis_zakat',
        'jumlah',
        'bukti',
        'tgl_penerimaan'
    ];

    public function getFormattedTglPenerimaanAttribute()
    {
        return Carbon::parse($this->tgl_penerimaan)->format('Y-m-d');
    }

    public function getFormattedTglTransaksiAttribute()
    {
        return Carbon::parse($this->tgl_transaksi)->format('Y-m-d');
    }

    public function jenisZakat()
    {
        return $this->belongsTo(JenisPenerimaan::class, 'jenis_zakat', 'kode_jenis');
    }
    
    public function muzakki()
    {
        return $this->belongsTo(Muzakki::class, 'id_muzaki', 'id');
    }
    public function laporanPenerimaan()
    {
        return $this->hasMany(LaporanPenerimaan::class, 'transaksi_penerimaan', 'id');
    }
}

