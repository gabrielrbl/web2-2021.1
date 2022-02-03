<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Models\Carro;
use App\Models\Categoria;
use App\Models\Fabricacao;
use App\Models\Localizacao;
use App\Models\Marca;
use App\Models\Motor;
use App\Models\Produto;
use App\Models\Valvulas;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderby('idproduto', 'desc')->get();

        return view('dashboard.consulta.produto', ['produtos' => $produtos]);
    }

    public function create()
    {
        return view('dashboard.cadastro.produto', [
            'motores' => Motor::all(),
            'carros' => Carro::all(),
            'valvulas' => Valvulas::all(),
            'fabricacoes' => Fabricacao::all(),
            'localizacoes' => Localizacao::all(),
            'categorias' => Categoria::all(),
            'marcas' => Marca::all(),
        ]);
    }

    public function store(StoreProdutoRequest $request)
    {
        Produto::create($request->all());

        return redirect()->route('consulta.produto');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(StoreProdutoRequest $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
