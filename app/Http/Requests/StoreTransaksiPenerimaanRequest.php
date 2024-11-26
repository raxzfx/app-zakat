<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaksiPenerimaanRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna memiliki otorisasi untuk melakukan request ini.
     */
    public function authorize()
    {
        return true;  // Jika Anda ingin memberikan otorisasi untuk semua pengguna
    }

    /**
     * Aturan validasi untuk request ini.
     */
    public function rules()
    {
        return [
        'id_muzaki' => 'required|exists:muzakki,id',
        'tgl_penerimaan' => 'required|date',
        'jenis_zakat' => 'required|exists:jenis_penerimaan,kode_jenis',
        'tgl_transaksi' => 'required|date',
        'jumlah' => 'required|numeric|min:1',
        'bukti' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Validasi untuk file
        ];
    }

    /**
     * Pesan kesalahan kustom untuk aturan validasi.
     */
    public function messages()
    {
        return [
            'id_muzaki.required' => 'ID Muzakki wajib diisi.',
            'id_muzaki.integer' => 'ID Muzakki harus berupa angka.',
            'tgl_transaksi.required' => 'Tanggal transaksi wajib diisi.',
            'tgl_transaksi.date' => 'Tanggal transaksi harus berupa tanggal yang valid.',
            'jenis_zakat.required' => 'Jenis zakat wajib diisi.',
            'jenis_zakat.string' => 'Jenis zakat harus berupa teks.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka.',
            'bukti.required' => 'Bukti wajib diunggah.',
            'bukti.image' => 'Bukti harus berupa file gambar.',
            'bukti.mimes' => 'Bukti harus memiliki format jpeg, png, jpg, atau gif.',
            'bukti.max' => 'Ukuran bukti tidak boleh lebih dari 2MB.',
        ];
    }
}
