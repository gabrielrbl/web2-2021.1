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
        ];
    }

    public function messages()
    {
        return [
            'idcliente.required' => 'O campo cliente é obrigatório.',
        ];
    }
}