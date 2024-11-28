<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPengeluaran;
use App\Models\LaporanPengeluaran;
use App\Models\TransaksiPengeluaran;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLaporanPengeluaranRequest;
use App\Http\Requests\UpdateLaporanPengeluaranRequest;

class LaporanPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Ambil parameter filter dari request
    $start_date = $request->get('start_date'); // Tanggal awal
    $end_date = $request->get('end_date');     // Tanggal akhir
    $jenis_zakat = $request->get('jenis_zakat'); // Jenis zakat (opsional)
    $per_page = $request->get('per_page', 10);  // Pagination

    // Query data dengan filter
    $query = TransaksiPengeluaran::with('jenisPengeluaran');

    if ($start_date && $end_date) {
        $query->whereBetween('tgl_transaksi', [$start_date, $end_date]);
    }
    
    if ($jenis_zakat) {
        $query->where('jenis_zakat', $jenis_zakat);
    }
    
    // Pagination
    $transaksiPengeluaran = $query->paginate($per_page);
    
    // Total jumlah pengeluaran
    $total_pengeluaran = $query->sum('jumlah');

    // Data jenis zakat
    $jenisZakat = JenisPengeluaran::all();

    // Kirim data ke view
    return view('laporan.pengeluaran.index', compact('transaksiPengeluaran', 'total_pengeluaran', 'jenisZakat'));
}


    /**
     * Show the form for creating a new resource.
     */
    
}
