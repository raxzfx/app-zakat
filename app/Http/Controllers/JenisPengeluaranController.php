<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use App\Http\Requests\StoreJenisPengeluaranRequest;
use App\Http\Requests\UpdateJenisPengeluaranRequest;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisPengeluaran = JenisPengeluaran::all();
        return view('jenisPengeluaran.index', compact('jenisPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisPengeluaran.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisPengeluaranRequest $request)
    {
        $request->validate([
            'kode_jenis' => 'required|numeric|unique:jenis_pengeluaran,kode_jenis',
            'jenis_pengeluaran' => 'required|string|max:255',
            'deskripsi' =>'required|string|max:255',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPengeluaran $jenisPengeluaran)
    {
        $jenisPengeluaran = JenisPengeluaran::findOrFail($jenisPengeluaran->kode_jenis);
        return view('jenisPengeluaran.show', compact('jenisPengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPengeluaran $jenisPengeluaran)
    {
        return view('jenisPengeluaran.edit', compact('jenisPengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisPengeluaranRequest $request, JenisPengeluaran $jenisPengeluaran)
    {
        $request->validate([
            'kode_jenis' => 'required|numeric|unique:jenis_pengeluaran,kode_jenis',
            'jenis_pengeluaran' =>'required|string|max:255',
            'deskripsi' =>'required|string|max:255',
            ]);
    
            $jenisPengeluaran->update([
                'kode_jenis' => $request->kode_jenis,
                'jenis_pengeluaran' => $request->jenis_pengeluaran,
                'deskripsi' => $request->deskripsi,
            ]);
    
            return redirect()->route('jenisPengeluaran.index')->with('success', 'Jenis Pengeluaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPengeluaran $jenisPengeluaran)
    {
        $jenisPengeluaran->delete();
        return redirect()->route('jenisPengeluaran.index')->with('success', 'Jenis Pengeluaran deleted successfully.');
    }
}
