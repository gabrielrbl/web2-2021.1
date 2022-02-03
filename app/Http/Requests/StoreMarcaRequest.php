<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarcaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'marca' => 'required|max:30',
        ];
    }

    public function messages()
    {
        return [
            'marca.required' => 'A marca do carro é obrigatória.',
            'marca.max' => 'A marca do carro deve conter no máximo :max caracteres.'
        ];
    }
}
