<?php

namespace App\Http\Controllers;

use App\Models\Mustahiq;
use Illuminate\Http\Request;
use App\Models\JenisPenyaluran;
use App\Models\LaporanPenyaluran;
use App\Models\TransaksiPenyaluran;
use App\Http\Requests\StoreLaporanPenyaluranRequest;
use App\Http\Requests\UpdateLaporanPenyaluranRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenyaluranExport;

class LaporanPenyaluranController extends Controller
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
    $query = TransaksiPenyaluran::with('jenisZakat' , 'mustahiq');

    if ($start_date && $end_date) {
        $query->whereBetween('tgl_transaksi', [$start_date, $end_date]);
    }
    
    if ($jenis_zakat) {
        $query->where('jenis_zakat', $jenis_zakat);
    }
    
    // Pagination
    $transaksiPenyaluran = $query->paginate($per_page);
    
    // Total jumlah pengeluaran
    $total_pengeluaran = $query->sum('jumlah');

    // Data jenis zakat
    $jenisZakat = JenisPenyaluran::all();
    $mustahiq = Mustahiq::all();

    // Kirim data ke view
    return view('laporan.penyaluran.index', compact('transaksiPenyaluran', 'total_pengeluaran', 'jenisZakat' , 'mustahiq'));
    }

    public function export()
    {
        // Menjalankan ekspor menggunakan Laravel Excel
        return Excel::download(new PenyaluranExport, 'Laporan Penyaluran.xlsx');
    }
}
