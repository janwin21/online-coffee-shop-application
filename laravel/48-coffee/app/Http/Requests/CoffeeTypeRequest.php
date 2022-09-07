<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoffeeTypeRequest extends FormRequest
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
        return [
            'coffee_type' => ['required', 'string', 'max:60', 'unique:coffee_types'],
            'bg_color' => ['required', 'string'],
            'font_color' => ['required', 'string']
        ];
    }
}
