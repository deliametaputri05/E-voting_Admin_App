<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VotingRequest extends FormRequest
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

            'id_pemira' => 'required|exists:pemira,id',
            'id_kandidat' => 'required|exists:kandidat,id',
            'jumlah_suara' => 'required|integer',
            'status' => 'required|string',


        ];
    }
}
