<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalonKetuaRequest extends FormRequest
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
            'id_ormawa' => 'exists:ormawa,id',
            'nim' => 'required|integer',
            'nama' => 'required|string',
            'angkatan' => 'required|integer',
            'kelas' => 'required|string',
            'foto' => 'image',
            'alamat' => 'required',
            'moto' => 'required',


        ];
    }
}
