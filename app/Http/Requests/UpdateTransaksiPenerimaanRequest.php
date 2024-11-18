<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransaksiPenerimaanRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna memiliki otorisasi untuk melakukan request ini.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Aturan validasi untuk request ini.
     */
    public function rules()
    {
        return [
            'id_muzakki' => 'required|integer|exists:muzakkis,id',
            'tgl_transaksi' => 'required|date',
            'jenis_zakat' => 'required|string|max:255|exists:jenis_zakat,kode_jenis',
            'jumlah' => 'required|integer|min:1',
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Tambahkan validasi untuk `bukti`
        ];
    }

    /**
     * Pesan kesalahan kustom untuk aturan validasi.
     */
    public function messages()
    {
        return [
            'id_muzakki.required' => 'ID Muzakki wajib diisi.',
            'id_muzakki.integer' => 'ID Muzakki harus berupa angka.',
            'id_muzakki.exists' => 'ID Muzakki tidak ditemukan.',
            'tgl_transaksi.required' => 'Tanggal transaksi wajib diisi.',
            'tgl_transaksi.date' => 'Tanggal transaksi harus dalam format tanggal yang valid.',
            'jenis_zakat.required' => 'Jenis zakat wajib diisi.',
            'jenis_zakat.string' => 'Jenis zakat harus berupa teks.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka.',
            'bukti.image' => 'Bukti harus berupa file gambar.',
            'bukti.mimes' => 'Bukti harus memiliki format jpeg, png, jpg, atau gif.',
            'bukti.max' => 'Ukuran bukti tidak boleh lebih dari 2MB.',
        ];
    }
}
