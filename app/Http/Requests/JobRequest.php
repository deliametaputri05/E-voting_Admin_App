<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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

            'company_id' => 'required|exists:companies,id',
            'desc' => 'required',
            'facilities' => 'required',
            'requirement' => 'required',
            'position' => 'required|max:255',
            'age' => 'required',
            'gender' => 'required',
            'last_edu' => 'required',
            'work_exp' => 'required',
            'salary' => 'required|integer',
            'rate' => 'required|numeric',
            'qouta' => 'required|integer',
            'last_date' => 'required',
            'category' => '',
            'types' => 'required',
        ];
    }
}
