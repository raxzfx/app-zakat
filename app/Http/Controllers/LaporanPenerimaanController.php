<?php

namespace App\Http\Controllers;

use App\Models\LaporanPenerimaan;

class LaporanPenerimaanController extends Controller
{
    public function index($request)
    {
       $perPage = $request->get('per_page', 10); // Default ke 10 jika tidak ada parameter

       $penerimaan = LaporanPenerimaan::paginate($perPage); //->withQueryString()

       $data = LaporanPenerimaan::all();

       $totalPenerimaan = $data->sum('jumlah');

       return view('laporan.penerimaan.index', compact('data', 'totalPenerimaan', 'penerimaan'));
    }
}