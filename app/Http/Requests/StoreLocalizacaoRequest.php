<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocalizacaoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'departamento' => 'required|max:30',
        ];
    }

    public function messages()
    {
        return [
            'departamento.required' => 'O departamento é obrigatório.',
            'departamento.max' => 'O departamento deve conter no máximo :max caracteres.'
        ];
    }
}
