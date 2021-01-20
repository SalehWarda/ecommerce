<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
            'name'  => 'required',
            'photo'  => 'required|mimes:png,jpg,jpeg',
            'slug'  => 'required|unique:categories,slug,'.$this->id,
        ];
    }

    public function messages()
    {
        return[

            'required'  => 'this field is required',
            'unique'    => 'This slug is already used',

        ];
    }
}
