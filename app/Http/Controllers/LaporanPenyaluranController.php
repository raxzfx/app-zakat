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
  
    }

    public function export()
    {
      
    }
}
