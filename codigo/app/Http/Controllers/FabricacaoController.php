<?php

namespace App\Http\Controllers;

use App\Models\Fabricacao;
use Illuminate\Http\Request;

class FabricacaoController extends Controller
{
    public function index()
    {
        $fabricacoes = Fabricacao::all();

        return view('dashboard.consulta.fabricacao', ['fabricacoes' => $fabricacoes]);
    }
}
