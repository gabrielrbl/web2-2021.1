<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntradaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idfornecedor' => 'required',
            'idproduto' => 'required',
            'quantidade' => 'required',
            'precocompra' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'idfornecedor.required' => 'O campo fornecedor é obrigatório.',
            'idproduto.required' => 'O campo produto é obrigatório.',
            'quantidade.required' => 'O campo quantidade é obrigatório.',
            'precocompra.required' => 'O campo valor de compra é obrigatório.',
        ];
    }
}