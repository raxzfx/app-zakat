<?php

namespace App\Http\Controllers;

use App\Models\JenisPenyaluran;
use App\Http\Requests\StoreJenisPenyaluranRequest;
use App\Http\Requests\UpdateJenisPenyaluranRequest;
use Illuminate\Http\Request;

class JenisPenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->get('per_page', 10);
        $jenisPenyaluran = JenisPenyaluran::paginate($per_page);
        return view('DataMaster.jenis-penyaluran.index', compact('jenisPenyaluran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.jenis-penyaluran.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisPenyaluranRequest $request)
    {
         // Gunakan data yang sudah divalidasi
        $validatedData = $request->validated();

        // Simpan data ke database
        JenisPenyaluran::create($validatedData);

        return redirect()->route('jenis-penyaluran.index')->with('success', 'Jenis Penyaluran created successfully.');	
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
        return view('DataMaster.jenis-penyaluran.update', compact('jenisPenyaluran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisPenyaluranRequest $request, JenisPenyaluran $jenisPenyaluran)
    {
        
    
            $jenisPenyaluran->update([
                'jenis_pengeluaran' => $request->jenis_pengeluaran,
                'deskripsi' => $request->deskripsi,
            ]);
    
            return redirect()->route('jenis-penyaluran.index')->with('success', 'Jenis Penyaluran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPenyaluran $jenisPenyaluran)
    {
        $jenisPenyaluran->delete();
        return redirect()->route('jenis-penyaluran.index')->with('success', 'Jenis Penyaluran deleted successfully.');
    }
}
