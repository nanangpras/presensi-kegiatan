<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WargaRequest extends FormRequest
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
            'nik'           => 'required|unique:d_warga,nik',
            'nama'          => 'required',
            'id_cabang'     => 'required',
            'email'         => 'required|unique:users,email',
            'alamat'        => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'jenis_kelamin' => 'required',
            'gol_darah'     => 'required',
            'telp'          => 'required',
            'agama'         => 'required',
            'perkawinan'    => 'required',
            'status_warga'  => 'required',
            'pendidikan'    => 'required',
            'pekerjaan'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nik.required'           => 'NIK wajib di isi !',
            'nik.unique'             => 'NIK Sudah Terdaftar',
            'email.required'         => 'Email wajib di isi !',
            'email.unique'           => 'Email Sudah Terdaftar',
            'nama.required'          => 'Nama Warga wajib di isi !',
            'id_cabang.required'     => 'Cabang wajib di isi !',
            'alamat.required'        => 'Alamat wajib di isi !',
            'tempat_lahir.required'  => 'Tempat lahir wajib di isi !',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib di isi !',
            'gol_darah.required'     => 'Golongan Darah wajib di isi !',
            'telp.required'          => 'Telpon / Whatsapp wajib di isi !',
            'agama.required'         => 'Agama wajib di isi !',
            'perkawinan.required'    => 'Status Kawin wajib di isi !',
            'status_warga.required'  => 'Status Warga wajib di isi !',
            'pendidikan.required'    => 'Pendidikan wajib di isi !',
            'pekerjaan.required'     => 'Pekerjaan wajib di isi !',
        ];
    }
}
