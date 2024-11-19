<?php

namespace App\Http\Controllers;

use App\Models\JenisPenyaluran;
use App\Http\Requests\StoreJenisPenyaluranRequest;
use App\Http\Requests\UpdateJenisPenyaluranRequest;

class JenisPenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisPenyaluran = JenisPenyaluran::all();
        return view('jenisPenyaluran.index', compact('jenisPenyaluran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisPenyaluran.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisPenyaluranRequest $request)
    {
        $request->validate([
            'kode_jenis' => 'required|numeric|unique:jenis_penyaluran,kode_jenis',
            'jenis_Pengeluaran' => 'required|string|max:255',
            'deskripsi' =>'required|string|max:255',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPenyaluran $jenisPenyaluran)
    {
        $jenisPenyaluran = JenisPenyaluran::findOrFail($jenisPenyaluran->kode_jenis);
        return view('jenisPenyaluran.show', compact('jenisPenyaluran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPenyaluran $jenisPenyaluran)
    {
        return view('jenisPenyaluran.edit', compact('jenisPenyaluran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisPenyaluranRequest $request, JenisPenyaluran $jenisPenyaluran)
    {
        $request->validate([
            'kode_jenis' => 'required|numeric|unique:jenis_penyaluran,kode_jenis',
            'jenis_Pengeluaran' =>'required|string|max:255',
            'deskripsi' =>'required|string|max:255',
            ]);
    
            $jenisPenyaluran->update([
                'kode_jenis' => $request->kode_jenis,
                'jenis_Pengeluaran' => $request->jenis_Penyaluran,
                'deskripsi' => $request->deskripsi,
            ]);
    
            return redirect()->route('jenisPenyaluran.index')->with('success', 'Jenis Penyaluran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPenyaluran $jenisPenyaluran)
    {
        $jenisPenyaluran->delete();
        return redirect()->route('jenisPenyaluran.index')->with('success', 'Jenis Penyaluran deleted successfully.');
    }
}
