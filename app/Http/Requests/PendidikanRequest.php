<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendidikanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'jenjang' => 'nullable|string|max:100',
            'instansi' => 'nullable|string|max:255',
            'tahun_lulus' => 'nullable|integer|digits:4',
            'keterangan' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Field nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'tahun_lulus.integer' => 'Tahun lulus harus berupa angka.',
            'tahun_lulus.digits' => 'Tahun lulus harus 4 digit.',
        ];
    }
}