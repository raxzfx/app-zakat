<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengaturanRequest extends FormRequest
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
            'nama_mesjid' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'koordinat' => 'required|string|max:255',
            'no_telp' => 'string|max:255',
            'nama_pimpinan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'email' => 'string|max:255',
        ];
    }
}
