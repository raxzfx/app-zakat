<?php

namespace App\Http\Controllers;

use App\Models\LaporanPenerimaan;
use App\Http\Requests\StoreLaporanPenerimaanRequest;
use App\Http\Requests\UpdateLaporanPenerimaanRequest;
use App\Models\JenisPenerimaan;
use App\Models\Muzakki;
use App\Models\TransaksiPenerimaan;
use Illuminate\Http\Request;

class LaporanPenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request  $request)
    {
        $perPage = $request->get('per_page', 10);
        $jenisZakat = JenisPenerimaan::all();
        $namaMuzakki = Muzakki::all();
        $transaksi = TransaksiPenerimaan::all();
        $total = $transaksi->sum('jumlah');
        return view('laporan.penerimaan.index', compact('laporan', 'jenisZakat', 'namaMuzakki', 'transaksi'));
    }
}
