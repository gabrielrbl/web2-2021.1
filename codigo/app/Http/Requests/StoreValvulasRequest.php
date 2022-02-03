<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreValvulasRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quantidade' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'quantidade.required' => 'A quantidade de válvulas é obrigatória.',
            'quantidade.numeric' => 'A quantidade de válvulas deve conter somente números.'
        ];
    }
}
