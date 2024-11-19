<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use App\Http\Requests\StoreMuzakkiRequest;
use App\Http\Requests\UpdateMuzakkiRequest;
use Illuminate\Http\Request;

class MuzakkiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        

          // Menggunakan Eloquent dengan pagination
          $perPage = $request->get('per_page', 10); // Default ke 15 jika tidak ada parameter
        $muzakki = Muzakki::paginate($perPage);
        return view('DataMaster.muzakki.index', compact('muzakki'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('muzakki.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMuzakkiRequest $request)
    {
        Muzakki::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ]);

        return redirect()->route('muzakki.index')->with('success', 'Muzakki created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Muzakki $muzakki)
    {
        $muzakki = Muzakki::findOrFail($muzakki->id);
        return view('muzakki.show', compact('muzakki'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Muzakki $muzakki)
    {
        $muzakki = Muzakki::findOrFail($muzakki->id);
        return view('muzakki.edit', compact('muzakki'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMuzakkiRequest $request, Muzakki $muzakki)
{

    $request->validate([
        'nik' => 'required|numeric|unique:muzakkis,nik,' . $muzakki->id,
        'nama_lengkap' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_telp' => 'required|string|max:255',
    ]);

    $muzakki->update([
        'nik' => $request->nik,
        'nama_lengkap' => $request->nama_lengkap,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp,
    ]);

    return redirect()->route('muzakki.index')->with('success', 'Muzakki updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Muzakki $muzakki)
    {
        $muzakki->delete();
        return redirect()->route('muzakki.index')->with('success', 'Muzakki deleted successfully.');
    }
}
