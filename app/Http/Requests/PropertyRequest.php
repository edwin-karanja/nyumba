<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'location' => 'required',
            'bedrooms' =>  'required|numeric|min:1|max:50',
            'published' => 'required',
            'image' => 'required|file|image|max:1000',
        ];
    }

    public function messages()
    {
        return [];
    }
}
