<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function show()
    {
        $fornecedores = Fornecedor::all();

        echo $fornecedores;
    }

    public function index()
    {
        $fornecedores = Fornecedor::all();

        return view('fornecedores.index', ['fornecedores' => $fornecedores]);
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(StoreFornecedorRequest $request)
    {
        Fornecedor::create($request->all());

        return redirect()->route('fornecedores.index');
    }

    public function update(StoreFornecedorRequest $request)
    {
        Fornecedor::findOrFail($request->id)->update($request->all());

        return redirect()->route('fornecedores.index');
    }

    public function destroy(Request $request)
    {
        Fornecedor::findOrFail($request->id)->delete();

        return redirect()->route('fornecedores.index')->with('msg', 'Excluído com sucesso!');
    }
}
