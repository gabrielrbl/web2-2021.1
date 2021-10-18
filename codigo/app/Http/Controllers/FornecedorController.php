<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    //
    public function show()
    {
        $fornecedores = Fornecedor::all();

        echo $fornecedores;
    }
}
