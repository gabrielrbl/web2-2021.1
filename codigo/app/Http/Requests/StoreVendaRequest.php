<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idcliente' => 'required',
            'idproduto' => 'required',
            'quantidade' => 'required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'idcliente.required' => 'O campo cliente é obrigatório.',

            'idproduto.required' => 'O campo produto é obrigatório.',

            'quantidade.required' => 'O campo quantidade é obrigatório.',
            'quantidade.min' => 'O campo quantidade deve ser maior que zero.',
        ];
    }
}