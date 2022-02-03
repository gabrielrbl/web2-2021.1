<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarroRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'modelo' => 'required|max:30',
        ];
    }

    public function messages()
    {
        return [
            'modelo.required' => 'O modelo do carro é obrigatório.',
            'modelo.max' => 'O modelo do carro deve conter no máximo :max caracteres.'
        ];
    }
}
