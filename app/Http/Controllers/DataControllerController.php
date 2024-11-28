<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;


class DataControllerController extends Controller
{
    public function export()
    {
        // Menjalankan ekspor menggunakan Laravel Excel
        return Excel::download(new DataExport, 'Laporan Penyaluran.xlsx');
    }
}
