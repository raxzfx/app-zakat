<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInformasiRequest extends FormRequest
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
            'judul' =>'required|string|max:255',
            'content' =>'required|string|max:255',
            'img' =>'required|string|max:255',
            'status' =>'required|numeric|',
            'kategori_id' => 'required|numeric|unique:informasi,kategori_id',
        ];
    }
}
