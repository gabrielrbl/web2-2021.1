<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::orderby('idfornecedor', 'desc')->get();

        return view('dashboard.consulta.fornecedor', ['fornecedores' => $fornecedores]);
    }

    public function create()
    {
        return view('dashboard.cadastro.fornecedor');
    }

    public function store(StoreFornecedorRequest $request)
    {
        Fornecedor::create($request->all());

        return redirect()->route('consulta.fornecedor');
    }

    public function destroy(Request $request)
    {
        Fornecedor::findOrFail($request->id)->delete();

        return redirect()->route('fornecedores.index')->with('msg', 'Excluído com sucesso!');
    }
}
