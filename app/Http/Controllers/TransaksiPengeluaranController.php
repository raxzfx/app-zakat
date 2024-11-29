<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPenyaluran;
use App\Models\JenisPengeluaran;
use App\Models\TransaksiPengeluaran;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksiPengeluaranExport;
use App\Http\Requests\StoreTransaksiPengeluaranRequest;
use App\Http\Requests\UpdateTransaksiPengeluaranRequest;

class TransaksiPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $per_page = $request->get('per_page', 10);

        if ($query) {
            $transPengeluaran = TransaksiPengeluaran::where('nama_pengeluaran', 'like', '%' . $query . '%')
            ->paginate($per_page);
        } else {    
            $transPengeluaran = TransaksiPengeluaran::paginate($per_page);
        }


        return view('transaksi.pengeluaran.index', compact('transPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisPengeluaran = JenisPengeluaran::all();
        return view('transaksi.pengeluaran.create' , compact('jenisPengeluaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiPengeluaranRequest $request)
    {
        
        TransaksiPengeluaran::create([
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'tgl_transaksi' => $request->tgl_transaksi
        ]);

        return redirect()->route('transaksi-pengeluaran.index')->with('success', 'Transaksi Pengeluaran created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiPengeluaran $transaksiPengeluaran)
{
    // Ambil data transaksi pengeluaran beserta relasi jenisPenyaluran
    $transPengeluaran = TransaksiPengeluaran::with('jenisPengeluaran')->findOrFail($transaksiPengeluaran->id);
    
    // Kembalikan ke view dengan membawa data transaksi pengeluaran
    return view('transaksi-pengeluaran.show', compact('transPengeluaran'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiPengeluaran $transaksiPengeluaran)
    {
        $jenisPengeluaran = JenisPengeluaran::all();
        $transPengeluaran = TransaksiPengeluaran::with('jenisPengeluaran')->findOrFail($transaksiPengeluaran->id);

        return view('transaksi.pengeluaran.update', compact('transPengeluaran' , 'jenisPengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiPengeluaranRequest $request, TransaksiPengeluaran $transaksiPengeluaran)
    {
        $transaksiPengeluaran->update([
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
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

    public function export(){
        return Excel::download(new TransaksiPengeluaranExport, 'Transaksi Pengeluaran.xlsx');
    }
}
