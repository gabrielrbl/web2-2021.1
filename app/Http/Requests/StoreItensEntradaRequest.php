<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItensEntradaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'identrada' => 'required',
            'idproduto' => 'required',
            'precocompra' => 'required',
            'quantidade' => 'required',
            'ipi' => 'required',
            'frete' => 'required',
            'icms' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'identrada.required' => 'O campo entrada é obrigatório.',

            'idproduto.required' => 'O campo produto é obrigatório.',

            'precocompra.required' => 'O campo valor de compra é obrigatório.',

            'quantidade.required' => 'O campo quantidade é obrigatório.',

            'ipi.required' => 'O campo IPI é obrigatório.',

            'frete.required' => 'O campo FRETE é obrigatório.',

            'icms.required' => 'O campo ICMS é obrigatório.',
        ];
    }
}