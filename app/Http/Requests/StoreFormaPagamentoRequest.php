<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormaPagamentoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'condicao' => 'required|max:8',
            'forma' => 'required|max:8',
        ];
    }

    public function messages()
    {
        return [
            'condicao.required' => 'A condição de pagamento é obrigatória.',
            'condicao.max' => 'A condição de pagamento deve conter no máximo :max caracteres.',
            
            'forma.required' => 'A forma de pagamento é obrigatória.',
            'forma.max' => 'A forma de pagamento deve conter no máximo :max caracteres.'
        ];
    }
}
