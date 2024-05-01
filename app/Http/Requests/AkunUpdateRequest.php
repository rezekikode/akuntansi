<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AkunUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'akun_id' => 'nullable',
            'jenis_akun_id' => 'required',
            'nama' => 'required',
            'saldo_normal' => 'required',
            'jenis_laporan' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'id.required' => 'Kode akun harus diisi.',
            'nama.required' => 'Nama akun harus diisi.',
            'saldo_normal.required' => 'Posisi saldo harus diisi.',
            'jenis_laporan.required' => 'Posisi laporan harus diisi.',
        ];
    }
}
