<?php

namespace App\Http\Controllers;

use App\Models\JenisPenerimaan;
use App\Http\Requests\StoreJenisPenerimaanRequest;
use App\Http\Requests\UpdateJenisPenerimaanRequest;

class JenisPenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisPenerimaan = JenisPenerimaan::all();
        return view('jenisPenerimaan.index', compact('jenisPenerimaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisPeneriamaan.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisPenerimaanRequest $request)
    {
        $request->validate([
            'kode_jenis' => 'required|numeric|unique:jenis_penerimaan,kode_jenis',
            'deskripsi' =>'required|string|max:255',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPenerimaan $jenisPenerimaan)
    {
        $jenisPenerimaan = JenisPenerimaan::findOrFail($jenisPenerimaan->kode_jenis);
        return view('jenisPenerimaan.show', compact('jenisPenerimaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPenerimaan $jenisPenerimaan)
    {
        return view('jenisPenerimaan.edit', compact('jenisPenerimaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisPenerimaanRequest $request, JenisPenerimaan $jenisPenerimaan)
    {
        $request->validate([
            'kode_jenis' => 'required|numeric|unique:jenis_penerimaan,kode_jenis',
            'deskripsi' =>'required|string|max:255',
            ]);
    
            $jenisPenerimaan->update([
                'kode_jenis' => $request->kode_jenis,
                'deskripsi' => $request->deskripsi,
            ]);
    
            return redirect()->route('jenisPenerimaan.index')->with('success', 'Jenis Penerimaan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPenerimaan $jenisPenerimaan)
    {
        $jenisPenerimaan->delete();
        return redirect()->route('jenisPenerimaan.index')->with('success', 'Jenis Penerimaan deleted successfully.');
    }
}
