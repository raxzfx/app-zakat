<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaksiPenyaluranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis_zakat' => 'required|exists:jenis_penyaluran,kode_jenis',
            'nama_penerima' => 'required|exists:muzakkis,id',
            'alamat_penerima' => 'required|string',
            'jumlah' => 'required|integer',
            'tgl_transaksi' => 'required|date',
        ];
    }
}
