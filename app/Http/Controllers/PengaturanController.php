<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Http\Requests\StorePengaturanRequest;
use App\Http\Requests\UpdatePengaturanRequest;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengaturan.index');
    }

    public function store(Request $request)
    {
        Pengaturan::create([
            'nama_mesjid',
            'alamat',
            'koordinat',
            'no_telp',
            'nama_pimpinan',
            'no_hp',
            'email',
        ]);

        return redirect()->route('pengaturan.index')->with('success', 'Created successfully.');
    }

}
