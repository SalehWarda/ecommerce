<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingsRequest extends FormRequest
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
            'id'               => 'required|exists:settings',
            'value'            => 'required',
            'plain_value'      => 'required|nullable|numeric',
        ];
    }

    public function messages()
    {
        return[

            'required' =>    'This field is required.',
            'id.exists' =>    'This id should be exists.',
            'plain_value' =>    'This field should be number.',

        ];
    }
}
