<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPenerimaan;
use App\Http\Requests\StoreJenisPenerimaanRequest;
use App\Http\Requests\UpdateJenisPenerimaanRequest;

class JenisPenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $per_page = $request->get('per_page', 10);

        if ($query) {
            $jenisPenerimaan = JenisPenerimaan::where('deskripsi', 'like', '%' . $query . '%')
                ->paginate($per_page);
        } else {
            $jenisPenerimaan = JenisPenerimaan::paginate($per_page);
        }

        return view('DataMaster.jenis-penerimaan.index', compact('jenisPenerimaan'));

        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.jenis-penerimaan.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisPenerimaanRequest $request)
    {
        JenisPenerimaan::create([
            'kode_jenis' => $request->kode_jenis,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('jenis-penerimaan.index')->with('success', 'Jenis Penerimaan created successfully.');
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
        return view('DataMaster.jenis-penerimaan.update', compact('jenisPenerimaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisPenerimaanRequest $request, JenisPenerimaan $jenisPenerimaan)
    {
    
            $jenisPenerimaan->update([
                'kode_jenis' => $request->kode_jenis,
                'deskripsi' => $request->deskripsi,
            ]);
    
            return redirect()->route('jenis-penerimaan.index')->with('success', 'Jenis Penerimaan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPenerimaan $jenisPenerimaan)
    {
        $jenisPenerimaan->delete();
        return redirect()->route('jenis-penerimaan.index')->with('success', 'Jenis Penerimaan deleted successfully.');
    }
}
