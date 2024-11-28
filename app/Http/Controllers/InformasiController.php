<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Models\Informasi;
use App\Http\Requests\StoreInformasiRequest;
use App\Http\Requests\UpdateInformasiRequest;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $querry = $request->input('query');
        $perPage = $request->get('per_page', 10); 

        if($querry){
            $informasi = Informasi::where('judul', 'like', '%' . $querry . '%')->paginate($perPage);
        } else {
            $informasi = Informasi::paginate($perPage);
        }

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
        Informasi::create([
            'judul' =>$request->judul,
            'content' =>$request->content,
            'img' =>$request->img,
            'status' =>$request->status,
            'kategori_id' =>$request->kategori_id,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        $informasi = Informasi::findOrFail($informasi->id);
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
            $informasi->update([
            'judul' =>$request->judul,
            'content' =>$request->content,
            'img' =>$request->img,
            'status' =>$request->status,
            'kategori_id' =>$request->kategori_id,
            ]);
    
            return redirect()->route('informasi.index')->with('success', 'Informasi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        
        $informasi->delete();
        return redirect()->route('informasi.index')->with('success', 'Informasi deleted successfully.');
    }
}
