<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Http\Requests\StoreInformasiRequest;
use App\Http\Requests\UpdateInformasiRequest;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasi = Informasi::paginate();
        return view('informasi.informasi.index', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('informasi.informasi.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInformasiRequest $request)
    {
        $request->validate([
            'judul' =>'required|string|max:255',
            'content' =>'required|string|max:255',
            'img' =>'required|string|max:255',
            'status' =>'required|numeric|',
            'kategori_id' => 'required|numeric|unique:informasi,kategori_id',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        $informasi = Informasi::findOrFail($informasi->kode_jenis);
        return view('$informasi.show', compact('$informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        return view('informasi.informasi.edit', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInformasiRequest $request, Informasi $informasi)
    {
        $request->validate([
            'judul' =>'required|string|max:255',
            'content' =>'required|string|max:255',
            'img' =>'required|string|max:255',
            'status' =>'required|numeric|',
            'kategori_id' => 'required|numeric|unique:informasi,kategori_id',
            ]);
    
            $informasi->update([
            'judul' =>'required|string|max:255',
            'content' =>'required|string|max:255',
            'img' =>'required|string|max:255',
            'status' =>'required|numeric|',
            'kategori_id' => 'required|numeric|unique:informasi,kategori_id',
            ]);
    
            return redirect()->route('informasi.index')->with('success', 'Informasi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        
        $informasi->delete();
        return redirect()->route('Informasi.index')->with('success', 'Informasi deleted successfully.');
    }
}
