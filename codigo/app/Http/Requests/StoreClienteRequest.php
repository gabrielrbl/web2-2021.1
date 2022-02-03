<?php

namespace App\Http\Requests;

use App\Rules\NomeCompleto;
use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => ['required', new NomeCompleto, 'max:50'],
            'telefone' => 'required|max:16',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome deve conter no máximo :max caracteres.',

            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.max' => 'O campo telefone deve conter no máximo :max caracteres.'
        ];
    }
}