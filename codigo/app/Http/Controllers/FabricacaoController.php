<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFabricacaoRequest;
use App\Models\Fabricacao;
use Illuminate\Http\Request;

class FabricacaoController extends Controller
{
    public function index()
    {
        $fabricacoes = Fabricacao::orderby('idfabricacao', 'desc')->get();

        return view('dashboard.consulta.fabricacao', ['fabricacoes' => $fabricacoes]);
    }

    public function create()
    {
        return view('dashboard.cadastro.fabricacao');
    }

    public function store(StoreFabricacaoRequest $request)
    {
        Fabricacao::create($request->all());

        return redirect()->route('consulta.fabricacao');
    }
}
