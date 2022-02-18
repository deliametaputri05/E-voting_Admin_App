<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalonWakilRequest extends FormRequest
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

            'id_jurusan' => 'required|exists:jurusan,id',
            'id_ormawa' => 'required|exists:ormawa,id',
            'nim' => 'required|integer',
            'nama' => 'required|string',
            'angkatan' => 'required|integer',
            'kelas' => 'required|string',
            'foto' => 'image',
            'alamat' => 'required|text',
            'waktu_memilih' => 'required|date',
            'sudah_vote' => 'required|integer',
            'moto' => 'required|text',


        ];
    }
}
