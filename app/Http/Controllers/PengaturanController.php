<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Http\Requests\StorePengaturanRequest;
use App\Http\Requests\UpdatePengaturanRequest;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Pengaturan::all();
        return view('pengaturan.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengaturan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengaturanRequest $request)
    {
        Pengaturan::create([
            'nama_mesjid' => $request->nama_mesjid,
            'alamat' => $request->alamat,
            'koordinat' => $request->koordinat,
            'no_telp' => $request->no_telp,
            'nama_pimpinan' => $request->nama_pimpinan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

    return redirect()->route('pengaturan.index')->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaturan $pengaturan)
    {
        $pengaturan = Pengaturan::findOrFail($pengaturan->id);
        return view('pengaturan.show', compact('pengaturan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaturan $pengaturan)
    {
        $pengaturan = Pengaturan::findOrFail($pengaturan->id);
        return view('pengaturan.update', compact('pengaturan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengaturanRequest $request, Pengaturan $pengaturan)
    {
        $pengaturan->update([
            'nama_mesjid' => $request->nama_mesjid,
            'alamat' => $request->alamat,
            'koordinat' => $request->koordinat,
            'no_telp' => $request->no_telp,
            'nama_pimpinan' => $request->nama_pimpinan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);
    
    
        return redirect()->route('pengaturan.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaturan $pengaturan)
    {
        $pengaturan->delete();
        return redirect()->route('pengaturan.index')->with('success', 'Deleted successfully.');
    }
}
