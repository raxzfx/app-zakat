<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $querry = $request->input('query');
        $perPage = $request->get('per_page', 10); // Default ke 15 jika tidak ada parameter

        if($querry){
            $categories = Category::where('nama_kategori', 'like', '%' . $querry . '%')->paginate($perPage);
        }else{
            $categories = Category::paginate($perPage);
        }

        return view('informasi.kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('informasi.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('informasi-kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $informasi_kategori)
    {
        $informasi_kategori = Category::findOrFail($informasi_kategori->id);
        return view('informasi.kategori.show', compact('informasi_kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $informasi_kategori)
    {
        
        return view('informasi.kategori.update', compact('informasi_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $informasi_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $informasi_kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('informasi-kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $informasi_kategori)
    {
        $informasi_kategori->delete();
        return redirect()->route('informasi-kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
