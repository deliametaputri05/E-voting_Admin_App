<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'], // , 'unique:users'
            'password' => $this->passwordRules(),
            'noHp' => ['required', 'string', 'max:13'],
            'address' => ['required', 'string', 'max:100'],
            'roles' => ['required', 'string', 'max:255'], // , 'in:USER, ADMIN'
            // 'education' => ['required', 'string', 'max:255'],
            // 'major' => ['required', 'string', 'max:255'],
            // 'year' => ['required', 'integer'],
            // 'gpa' => ['required', 'numeric'],
            // 'level' => ['required', 'string', 'max:255'],
            // 'skill' => ['required', 'string', 'max:255'],
        ];
    }
}
