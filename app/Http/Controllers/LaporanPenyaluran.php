<?php

namespace App\Http\Controllers;

use App\Models\LaporanPenyaluran;

class LaporanPenyaluranController extends Controller
{
    public function index($request)
    {
       $perPage = $request->get('per_page', 10); // Default ke 10 jika tidak ada parameter

       $penerimaan = LaporanPenyaluran::paginate($perPage); //->withQueryString()

       $data = LaporanPenyaluran::all();

       $totalPenyaluran = $data->sum('jumlah');

       return view('laporan.penyaluran.index', compact('data', 'totalPenyaluran'));
    }
}