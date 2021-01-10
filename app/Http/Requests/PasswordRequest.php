<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'current_password'      => 'required',
            'new_password'          => 'required|min:8',
            'password_confirmation' =>  'required|same:new_password'

        ];
    }

    public function messages()
    {
        return[

            'required'   =>  'This field is required',
            'same'  =>  'The password confirmation and new password must match.',
            'min'   =>   'The new password must be at least 8 characters.'
        ];
    }
}
