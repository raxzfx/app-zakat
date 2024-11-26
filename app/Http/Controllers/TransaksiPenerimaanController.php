<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenerimaan;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTransaksiPenerimaanRequest;
use App\Http\Requests\UpdateTransaksiPenerimaanRequest;

class TransaksiPenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trans = TransaksiPenerimaan::with('muzakki', 'jenisPenerimaan')->get();
        return view('transaksi.penerimaan.index', compact('trans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi-penerimaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiPenerimaanRequest $request)
    {
        // Inisialisasi path kosong untuk menyimpan path file
        $filePath = null;

        // Cek apakah file `bukti` ada
        if ($request->hasFile('bukti')) {
            // Membuat nama file unik
            $fileName = time() . '_' . $request->file('bukti')->getClientOriginalName();

            // Menyimpan file ke folder 'public/images' dan mengambil path-nya
            $filePath = $request->file('bukti')->storeAs('public/images', $fileName);
        }

        // Simpan data ke dalam database
        TransaksiPenerimaan::create([
            'id_muzakki' => $request->id_muzakki,
            'jenis_zakat' => $request->jenis_zakat,
            'tgl_transaksi' => $request->tgl_transaksi,
            'jumlah' => $request->jumlah,
            'bukti' => $filePath ? Storage::url($filePath) : null, // Simpan URL file jika ada
        ]);

        // Redirect ke halaman sukses dengan pesan
        return redirect()->back()->with('success', 'Data dan file berhasil di-upload!');

        //jika menggunkan json bisa test pake ini 
        // if($request->hasFile('bukti')) {
        //     //membuat file unik
        //     $filename = time() . '_' . $request->file('bukti')->getClientOriginalName();

        //     // Menyimpan file ke dalam storage dengan folder 'public/images'
        //     $path = $request->file('bukti')->storeAs('public/images', $filename);

        //      // Atau jika menggunakan Storage::disk untuk kontrol lebih
        //     // $path = Storage::disk('public')->putFileAs('images', $request->file('image'), $fileName);

        //      // Mengembalikan respon dengan URL gambar
        //      return response()->json([
        //         'message' => 'File uploaded successfully!',
        //         'file_path' => Storage::url($path),
        //     ]);
        // }

        // return response()->json([
        //     'message' => 'File upload failed!',
        // ] , 400);

    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiPenerimaan $transaksiPenerimaan)
    {
        return view('transaksi-penerimaan.show', compact('transaksiPenerimaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiPenerimaan $transaksiPenerimaan)
    {
        $trans = TransaksiPenerimaan::findOrFail($transaksiPenerimaan->id);
        return view('transaksi-penerimaan.edit', compact('trans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiPenerimaanRequest $request, TransaksiPenerimaan $transaksiPenerimaan)
    {

        // Menyimpan data yang sudah divalidasi
        $data = $request->only(['id_muzakki', 'tgl_transaksi', 'jenis_zakat', 'jumlah']);

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
