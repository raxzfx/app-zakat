<?php

namespace App\Http\Controllers;

use App\Models\LaporanPengeluaran;

class LaporanPengeluaranController extends Controller
{
    public function index($request)
    {
       $perPage = $request->get('per_page', 10); // Default ke 10 jika tidak ada parameter

       $penerimaan = LaporanPengeluaran::paginate($perPage); //->withQueryString()

       $data = LaporanPengeluaran::all();

       $totalPengeluaran = $data->sum('jumlah');

       return view('laporan.pengeluaran.index', compact('data', 'totalPengeluaran'));
    }
    
}