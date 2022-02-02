<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return view('dashboard.consulta.produto', ['produtos' => $produtos]);
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(StoreProdutoRequest $request)
    {
        Produto::create($request->all());

        return redirect()->route('produtos.index');
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
        Produto::findOrFail($request->id)->update($request->all());

        return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        //
    }
}
