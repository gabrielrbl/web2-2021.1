<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'potencia' => 'required|max:3',
        ];
    }

    public function messages()
    {
        return [
            'potencia.required' => 'A potência do carro é obrigatória.',
            'potencia.max' => 'A potência do carro deve conter no máximo :max caracteres.'
        ];
    }
}
