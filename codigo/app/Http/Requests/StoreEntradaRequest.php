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
        ];
    }

    public function messages()
    {
        return [
            'idfornecedor.required' => 'O campo fornecedor é obrigatório.',
        ];
    }
}