<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFabricacaoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ano' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'ano.required' => 'O ano do carro é obrigatório.',
            'ano.numeric' => 'O ano do carro deve conter somente números.'
        ];
    }
}
