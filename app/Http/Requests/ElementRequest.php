<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|min:3|unique:elements'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Data wajib diisi !',
            'nama.min' => 'Data minimal :min karakter !',
            'nama.unique' => 'Data sudah sama dengan sebelumnya',
        ];
    }
}
