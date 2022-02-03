<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItensVendaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idvenda' => 'required',
            'idproduto' => 'required',
            'valorvenda' => 'required',
            'quantidade' => 'required',
            'desconto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'idvenda.required' => 'O campo venda é obrigatório.',

            'idproduto.required' => 'O campo produto é obrigatório.',

            'valorvenda.required' => 'O campo valor de venda é obrigatório.',

            'quantidade.required' => 'O campo quantidade é obrigatório.',

            'desconto.required' => 'O campo desconto é obrigatório.',
        ];
    }
}