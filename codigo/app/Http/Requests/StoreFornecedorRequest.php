<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFornecedorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:50',
            'cnpj' => 'required|max:18',
            'telefone' => 'required|max:16',
            'endereco' => 'required|max:80'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome deve conter no máximo :max caracteres.',

            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.max' => 'O campo CNPJ deve conter no máximo :max caracteres.',

            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.max' => 'O campo telefone deve conter no máximo :max caracteres.',

            'endereco.required' => 'O campo endereço é obrigatório.',
            'endereco.max' => 'O campo endereço deve conter no máximo :max caracteres.'
        ];
    }
}