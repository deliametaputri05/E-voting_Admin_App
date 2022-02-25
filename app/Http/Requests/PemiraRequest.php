<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemiraRequest extends FormRequest
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

            'id_ormawa' => 'required|exists:ormawa,id',
            'nama' => 'required|string',
            'foto' => 'image',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',

        ];
    }
}
