<?php

namespace App\Http\Controllers;

use App\Models\Mustahiq;
use Illuminate\Http\Request;
use App\Models\JenisPenyaluran;
use App\Models\TransaksiPenyaluran;
use App\Http\Requests\StoreTransaksiPenyaluranRequest;
use App\Http\Requests\UpdateTransaksiPenyaluranRequest;

class TransaksiPenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = (int) $request->get('per_page', 10);
        $per_page = $per_page > 0 ? $per_page : 10;
        $trasnPenyaluran = TransaksiPenyaluran::with('mustahiq' , 'jenisZakat')->paginate($per_page);
        return view('transaksi.penyaluran.index', compact('trasnPenyaluran' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mustahiq = Mustahiq::all();
        $jenis_zakat = JenisPenyaluran::all();
        return view('transaksi.penyaluran.create', compact('mustahiq', 'jenis_zakat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiPenyaluranRequest $request)
    {
        TransaksiPenyaluran::create([
            'jenis_zakat' => $request->jenis_zakat,
            'nama_penerima' => $request->nama_penerima,
            'alamat_penerima' => $request->alamat_penerima,
            'jumlah' => $request->jumlah,
            'tgl_transaksi' => $request->tgl_transaksi
        ]);

        return redirect()->route('transaksi-penyaluran.index')->with('success', 'Transaksi Penyaluran created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiPenyaluran $transaksiPenyaluran)
    {
        $transaksiPenyaluran = TransaksiPenyaluran::with('mustahiq' , 'jenisZakat')->findOrFail($transaksiPenyaluran->id);

        return view('transaksi-penyaluran.show', compact('transaksiPenyaluran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiPenyaluran $transaksiPenyaluran)
    {
        $mustahiq = Mustahiq::all();
        $jenis_zakat = JenisPenyaluran::all();
        return view('transaksi.penyaluran.update', compact('transaksiPenyaluran' , 'mustahiq' , 'jenis_zakat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiPenyaluranRequest $request, TransaksiPenyaluran $transaksiPenyaluran)
    {

        $transaksiPenyaluran->update([
            'jenis_zakat' => $request->jenis_zakat,
            'nama_penerima' => $request->nama_penerima,
            'alamat_penerima' => $request->alamat_penerima,
            'jumlah' => $request->jumlah,
            'tgl_transaksi' => $request->tgl_transaksi
        ]);

        return redirect()->route('transaksi-penyaluran.index')->with('success', 'Transaksi Penyaluran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiPenyaluran $transaksiPenyaluran)
    {
        $transaksiPenyaluran->delete();
        return redirect()->route('transaksi-penyaluran.index')->with('success', 'Transaksi Penyaluran deleted successfully.');
    }
}
