<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules =  [
            'name' => 'required|min:3' ,
            'email' => 'required|email|unique:users' ,
            'password' => 'required|min:8|max:32' ,
            'user_type' => 'required'
        ];
        if ($this->method() =='PUT'){
            $rules['email'] = 'required|email|unique:users,email,'.$this->route()->user ;
        }
        return $rules;
    }
}
