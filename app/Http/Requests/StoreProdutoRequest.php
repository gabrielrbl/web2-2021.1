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
            'idmotor' => 'required',
            'idcarro' => 'required',
            'idvalvulas' => 'required',
            'idfabricacao' => 'required',
            'idcategoria' => 'required',
            'idmarca' => 'required',
            'idlocalizacao' => 'required',
            'idunidade' => 'required',
            'referencia' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'idmotor.required' => 'O motor do produto é obrigatório.',

            'idcarro.required' => 'O carro do produto é obrigatório.',

            'idvalvulas.required' => 'A quantidade de válvulas do produto é obrigatória.',

            'idfabricacao.required' => 'O ano de fabricação do produto é obrigatório.',

            'idcategoria.required' => 'A categoria do produto é obrigatória.',

            'idmarca.required' => 'A marca do produto é obrigatório.',

            'idlocalizacao.required' => 'A localização do produto é obrigatória.',

            'idunidade.required' => 'A unidade do produto é obrigatória.',

            'referencia.required' => 'A referência do produto é obrigatória.',
            'referencia.max' => 'A referência do produto deve conter no máximo :max caracteres.',
        ];
    }
}
