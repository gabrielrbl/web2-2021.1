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
            'nome' => 'required|max:100',
            'cnpj' => 'required|max:20|numeric',
            'telefone' => 'required|max:20|numeric',
            'endereco' => 'required|max:60'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres.',

            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.max' => 'O campo CNPJ deve ter no máximo :max caracteres.',
            'cnpj.numeric' => 'O campo CNPJ deve conter somente números.',

            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.max' => 'O campo telefone deve ter no máximo :max caracteres.',
            'telefone.numeric' => 'O campo telefone deve conter somente números.',

            'endereco.required' => 'O campo endereço é obrigatório.',
            'endereco.max' => 'O campo endereço deve ter no máximo :max caracteres.'
        ];
    }
}