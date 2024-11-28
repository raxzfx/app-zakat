<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use Illuminate\Http\Request;
use App\Models\JenisPenerimaan;
use App\Models\TransaksiPenerimaan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTransaksiPenerimaanRequest;
use App\Http\Requests\UpdateTransaksiPenerimaanRequest;

class TransaksiPenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = (int) $request->get('per_page', 10);
        $per_page = $per_page > 0 ? $per_page : 10;

        $transaksi = TransaksiPenerimaan::with('muzakki', 'jenisZakat')
            ->selectRaw("*, DATE_FORMAT(tgl_penerimaan, '%Y-%m-%d') as tgl_penerimaan_formatted, DATE_FORMAT(tgl_transaksi, '%Y-%m-%d') as tgl_transaksi_formatted")
            ->paginate($per_page);

        return view('transaksi.penerimaan.index', compact('transaksi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_zakat = JenisPenerimaan::all(); // Ambil data dari tabel jenis penerimaan
        $muzakki = Muzakki::all(); // Ambil data dari tabel muzakki
        return view('transaksi.penerimaan.create', compact('muzakki', 'jenis_zakat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiPenerimaanRequest $request)
{
    Log::info('Request data:', $request->all());

    // Cek apakah ada file yang diunggah
    if ($request->hasFile('bukti')) {
        // Simpan file ke storage di folder public/images
        $path = $request->file('bukti')->store('public/img');

        // Cek apakah file berhasil disimpan
        if ($path) {
            Log::info('File berhasil disimpan di: ' . $path);
        } else {
            Log::error('File gagal disimpan');
        }
    } else {
        $path = null; // Jika tidak ada file, set $path ke null
    }

    // Simpan data transaksi penerimaan ke database
    TransaksiPenerimaan::create([
        'id_muzaki' => $request->id_muzaki,
        'tgl_penerimaan' => $request->tgl_penerimaan,
        'jenis_zakat' => $request->jenis_zakat,
        'tgl_transaksi' => $request->tgl_transaksi,
        'jumlah' => $request->jumlah,
        'bukti' => $path ? Storage::url($path) : null, // Menyimpan URL file di database
    ]);

    Log::info('Data berhasil disimpan.');

    return redirect()->route('transaksi-penerimaan.index')->with('success', 'Data dan file berhasil di-upload!');
}


    /**
     * Display the specified resource.
     */
    public function show(TransaksiPenerimaan $transaksiPenerimaan)
    {
        return view('transaksi.penerimaan.show', compact('transaksiPenerimaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiPenerimaan $transaksiPenerimaan)
    {
        $transaksiPenerimaan->load('jenisZakat', 'muzakki'); // Load relasi
        $jenis_zakat = JenisPenerimaan::all();
        $muzakki = Muzakki::all();
        return view('transaksi.penerimaan.update', compact('transaksiPenerimaan', 'jenis_zakat', 'muzakki'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiPenerimaanRequest $request, TransaksiPenerimaan $transaksiPenerimaan)
    {

        // Menyimpan data yang sudah divalidasi
        $data = $request->only(['id_muzaki', 'tgl_transaksi', 'jenis_zakat', 'jumlah' , 'bukti' , 'tgl_penerimaan' ]);

        // Cek apakah ada file `bukti` yang diunggah
        if ($request->hasFile('bukti')) {
            // Jika ada file baru, hapus file lama
            if ($transaksiPenerimaan->bukti) {
                Storage::delete('public/images/' . basename($transaksiPenerimaan->bukti));
            }

            $fileName = time() . '_' . $request->file('bukti')->getClientOriginalName();
            $filePath = $request->file('bukti')->storeAs('public/images', $fileName);
            $data['bukti'] = Storage::url($filePath);
        }
        // Update data di database
        $transaksiPenerimaan->update($data);

        return redirect()->route('transaksi-penerimaan.index')->with('success', 'Data berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiPenerimaan $transaksiPenerimaan)
    {
        if ($transaksiPenerimaan->bukti) {
            Storage::delete('public/images/' . basename($transaksiPenerimaan->bukti));
        }

        $transaksiPenerimaan->delete();
        return redirect()->route('transaksi-penerimaan.index')->with('success', 'Data berhasil dihapus!');
    }
}
