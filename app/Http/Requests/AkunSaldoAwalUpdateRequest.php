<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AkunSaldoAwalUpdateRequest extends FormRequest
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
            'akun_id' => 'required',
            'tanggal' => 'required',
            'debit' => 'required',
            'kredit' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'akun_id.required' => 'Akun harus diisi.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'debit.required' => 'Debit harus diisi.',
            'kredit.required' => 'Kredit harus diisi.',
        ];
    }
}
