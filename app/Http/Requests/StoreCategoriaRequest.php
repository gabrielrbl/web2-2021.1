<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'categoria' => 'required|max:30',
        ];
    }

    public function messages()
    {
        return [
            'categoria.required' => 'A categoria é obrigatória.',
            'categoria.max' => 'A categoria deve conter no máximo :max caracteres.'
        ];
    }
}
