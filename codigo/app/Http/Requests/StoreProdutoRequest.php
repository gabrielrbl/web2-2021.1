<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:100',
            'icms' => 'required|numeric',
            'ipi' => 'required|numeric',
            'frete' => 'required|numeric',
            'precofabrica' => 'required|numeric',
            'precocompra' => 'required|numeric',
            'precovenda' => 'required|numeric',
            'lucro' => 'required|numeric',
            'desconto' => 'required|numeric',
            'quantidade' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.max' => 'O nome do produto deve ter no máximo :max caracteres.',
            
            'icms.required' => 'O ICMS do produto é obrigatório.',
            'icms.numeric' => 'O ICMS do produto deve conter somente números.',
            
            'ipi.required' => 'O IPI do produto é obrigatório.',
            'ipi.numeric' => 'O IPI do produto deve conter somente números.',
            
            'frete.required' => 'O frete do produto é obrigatório.',
            'frete.numeric' => 'O frete do produto deve conter somente números.',
            
            'precofabrica.required' => 'O preço de fábrica do produto é obrigatório.',
            'precofabrica.numeric' => 'O preço de fábrica do produto deve conter somente números.',
            
            'precocompra.required' => 'O preço de compra do produto é obrigatório.',
            'precocompra.numeric' => 'O preço de compra do produto deve conter somente números.',
            
            'precovenda.required' => 'O preço de venda do produto é obrigatório.',
            'precovenda.numeric' => 'O preço de venda do produto deve conter somente números.',
            
            'lucro.required' => 'O lucro do produto é obrigatório.',
            'lucro.numeric' => 'O lucro do produto deve conter somente números.',

            'desconto.required' => 'O desconto do produto é obrigatório.',
            'desconto.numeric' => 'O desconto do produto deve conter somente números.',
            
            'quantidade.required' => 'A quantidade do produto é obrigatório.',
            'quantidade.numeric' => 'A quantidade do produto deve conter somente números.'
        ];
    }
}