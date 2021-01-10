<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            //
            'name'    =>   'required',
            'email'   => 'required|email|unique:admins,email,'.$this->id,
            'photo'   => 'required|mimes:png,jpg,jpeg',

        ];
    }

    public function messages()
    {
        return[

            'required'  => 'this field is required',
            'email'     => 'this field should be email',
            'unique'    => 'This email is already used',
            'mimes'     => 'this field should be mimes'
        ];
    }
}
