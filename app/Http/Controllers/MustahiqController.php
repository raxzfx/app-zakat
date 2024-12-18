<?php

namespace App\Http\Controllers;

use App\Models\Mustahiq;
use Illuminate\Http\Request;
use App\Exports\MustahiqExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreMustahiqRequest;
use App\Http\Requests\UpdateMustahiqRequest;

class MustahiqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $perPage = $request->get('per_page', 10); // Default ke 10 jika tidak ada parameter
        if($query){
            $mustahiq = Mustahiq::where('nama_jenis', 'like', '%' . $query . '%')
            -> orWhere('nik', 'like', '%' . $query . '%')
            -> orWhere('nama_lengkap', 'like', '%' . $query . '%')
            ->paginate($perPage);
        } else {
               $mustahiq = Mustahiq::paginate($perPage);
        }
      //->withQueryString()
        return view('DataMaster.mustahiq.index', compact('mustahiq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.mustahiq.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMustahiqRequest $request)
    {
        Mustahiq::create([
            'nama_lengkap'=>$request->nama_lengkap,
            'kode_jenis' => $request->kode_jenis,
            'nik' => $request->nik,
            'nama_jenis' =>$request->nama_jenis,
        ]); 

        return redirect()->route('mustahiq.index')->with('success', 'Mustahiq created successfully.');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Mustahiq $mustahiq)
    {
        $mustahiq = Mustahiq::findOrFail($mustahiq->id);
        return view('mustahiq.show', compact('mustahiq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mustahiq $mustahiq)
    {
        return view('DataMaster.mustahiq.update', compact('mustahiq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMustahiqRequest $request, Mustahiq $mustahiq)
    {
        $mustahiq->update([
            'nama_lengkap'=>$request->nama_lengkap,
            'kode_jenis' => $request->kode_jenis,
            'nik' => $request->nik,
            'nama_jenis' =>$request->nama_jenis,
        ]);

        return redirect()->route('mustahiq.index')->with('success', 'Mustahiq updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mustahiq $mustahiq)
    {
        $mustahiq->delete();
        return redirect()->route('mustahiq.index')->with('success', 'Mustahiq deleted successfully.');
    }


    public function export(){
        return Excel::download(new MustahiqExport, 'mustahiq.xlsx');
    }
}
