<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanRequest extends FormRequest
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
            'nama' => 'required|min:3|unique:d_event',
            'id_cabang' => 'required',
            'element_id' => 'required',
            'lokasi' => 'required',
            'maps' => 'required',
            'tgl_event_mulai' => 'required|date',
            'tgl_event_akhir' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Data wajib diisi !',
            'nama.min' => 'Data minimal :min karakter !',
            'nama.unique' => 'Data sudah sama dengan sebelumnya',
            'tgl_event_mulai.required' => 'Data wajib di isi !',
            'tgl_event_akhir.required' => 'Data wajib di isi !',
            'id_cabang.required' => 'Data cabang wajib di isi !',
            'element_id.required' => 'Data element wajib di isi !',
            'lokasi.required' => 'Nama tempat lokasi wajib di isi !',
            'maps.required' => 'Link maps kegiatan wajib di isi !',
        ];
    }
}
