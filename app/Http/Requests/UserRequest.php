<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        //update
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $this->route('id'),  // Validasi email dan pengecualian untuk user yang sedang diupdate
            'username' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'password' => 'nullable|string|min:8',  // Password boleh kosong, jika ada di-input, baru divalidasi
        ];
    }
}
