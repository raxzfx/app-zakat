<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use App\Http\Requests\StoreJenisPengeluaranRequest;
use App\Http\Requests\UpdateJenisPengeluaranRequest;
use Illuminate\Http\Request;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $query = $request->input('query');
        $per_page = $request->get('per_page', 10);

        if ($query) {
            $jenisPengeluaran = JenisPengeluaran::where('jenis_pengeluaran', 'like', '%' . $query . '%')
                ->paginate($per_page);
        } else {
            $jenisPengeluaran = JenisPengeluaran::paginate($per_page);
        }

        return view('DataMaster.jenis-pengeluaran.index', compact('jenisPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.jenis-pengeluaran.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisPengeluaranRequest $request)
    {

        JenisPengeluaran::create([
            'kode_jenis' => $request->kode_jenis,
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('jenis-pengeluaran.index')->with('success', 'Jenis Pengeluaran created successfully.');
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
        return view('DataMaster.jenis-pengeluaran.update', compact('jenisPengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisPengeluaranRequest $request, JenisPengeluaran $jenisPengeluaran)
    {
    
            $jenisPengeluaran->update([
                'jenis_pengeluaran' => $request->jenis_pengeluaran,
                'deskripsi' => $request->deskripsi,
            ]);
    
            return redirect()->route('jenis-pengeluaran.index')->with('success', 'Jenis Pengeluaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPengeluaran $jenisPengeluaran)
    {
        $jenisPengeluaran->delete();
        return redirect()->route('jenis-pengeluaran.index')->with('success', 'Jenis Pengeluaran deleted successfully.');
    }
}
