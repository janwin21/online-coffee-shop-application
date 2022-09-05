<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostumerRequest extends FormRequest
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
            'surname' => ['required', 'max:25'],
            'table_number' => ['required', 'min:1']
        ];
    }
}
