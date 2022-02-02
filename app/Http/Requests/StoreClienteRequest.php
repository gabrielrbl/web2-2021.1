<?php

namespace App\Http\Requests;

use App\Rules\NomeCompleto;
use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => ['required', new NomeCompleto],
            'endereco' => 'required|max:60',
            'debito' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',

            'endereco.required' => 'O campo endereço é obrigatório.',
            'endereco.max' => 'O campo endereço deve ter no máximo :max caracteres.',

            'debito.required' => 'O campo débito é obrigatório.',
            'debito.numeric' => 'O campo débito deve conter somente números.',
        ];
    }
}