<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJenisPengeluaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_pengeluaran' => 'required|string|max:255',
            'alamat_penerima' =>  'required|string',
            'jumlah' => 'required|integer',
            'jenis_zakat' => 'required|string|exists:jenis_pengeluaran,kode_jenis',
            'tgl_transaksi' => 'required|date',
        ];
    }
}
