<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KandidatRequest extends FormRequest
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

            'id_clnKetua' => 'exists:calon_ketua,id',
            'id_clnWakil' => 'exists:calon_wakil,id',
            'id_pemira' => 'exists:pemira,id',
            'id_ormawa' => 'exists:ormawa,id',
            'no_urut' => 'required|integer',
            'foto' => 'image',
            'visi' => 'required',
            'misi' => 'required',



        ];
    }
}
