<?php

namespace App\Http\Controllers;

use App\Models\Mustahiq;
use App\Http\Requests\StoreMustahiqRequest;
use App\Http\Requests\UpdateMustahiqRequest;

class MustahiqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mustahiq = Mustahiq::all();
        return view('mustahiq.index', compact('mustahiq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mustahiq.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMustahiqRequest $request)
    {
        $request->validate([
            'kode_jenis' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:mustahiq,nik',
            'nama_jenis' =>'required|string|max:255',
        ]);
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
        return view('mustahiq.edit', compact('mustahiq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMustahiqRequest $request, Mustahiq $mustahiq)
    {
        $request->validate([
        'kode_jenis' => 'required|string|max:255',
        'nik' => 'required|numeric|unique:mustahiq,nik,' . $mustahiq->id,
        'nama_jenis' =>'required|string|max:255',
        ]);

        $mustahiq->update([
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
}
