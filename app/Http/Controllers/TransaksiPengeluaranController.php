<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPengeluaran;
use App\Http\Requests\StoreTransaksiPengeluaranRequest;
use App\Http\Requests\UpdateTransaksiPengeluaranRequest;

class TransaksiPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transPengeluaran = TransaksiPengeluaran::with( 'jenisPenyaluran')->get();
        return view('transaksi-pengeluaran.index', compact('transPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi-pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiPengeluaranRequest $request)
    {
        
        TransaksiPengeluaran::create([
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'alamat_penerima' => $request->alamat_penerima,
            'jumlah' => $request->jumlah,
            'jenis_zakat' => $request->jenis_zakat,
            'tgl_transaksi' => $request->tgl_transaksi
        ]);

        redirect()->route('transaksi-pengeluaran.index')->with('success', 'Transaksi Pengeluaran created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiPengeluaran $transaksiPengeluaran)
{
    // Ambil data transaksi pengeluaran beserta relasi jenisPenyaluran
    $transPengeluaran = TransaksiPengeluaran::with('jenisPenyaluran')->findOrFail($transaksiPengeluaran->id);
    
    // Kembalikan ke view dengan membawa data transaksi pengeluaran
    return view('transaksi-pengeluaran.show', compact('transPengeluaran'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiPengeluaran $transaksiPengeluaran)
    {
            $transPengeluaran = TransaksiPengeluaran::with('jenisPenyaluran')->findOrFail($transaksiPengeluaran->id);

        return view('transaksi-pengeluaran.edit', compact('transPengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiPengeluaranRequest $request, TransaksiPengeluaran $transaksiPengeluaran)
    {
        $transaksiPengeluaran->update([
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'alamat_penerima' => $request->alamat_penerima,
            'jumlah' => $request->jumlah,
            'jenis_zakat' => $request->jenis_zakat,
            'tgl_transaksi' => $request->tgl_transaksi
        ]);

        return redirect()->route('transaksi-pengeluaran.index')->with('success', 'Transaksi Pengeluaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiPengeluaran $transaksiPengeluaran)
    {
        $transaksiPengeluaran->delete();
        return redirect()->route('transaksi-pengeluaran.index')->with('success', 'Transaksi Pengeluaran deleted successfully.');
    }
}
