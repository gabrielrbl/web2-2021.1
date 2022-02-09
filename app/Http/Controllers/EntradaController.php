<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntradaRequest;
use App\Models\Entrada;
use App\Models\Produto;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::orderby('datacompra', 'desc')->get();

        return view('dashboard.entrada.index', ['entradas' => $entradas]);
    }

    public function itensEntrada($identrada, $idproduto = null)
    {
        if ($idproduto) {
            $produto = Produto::find($idproduto);
        } else {
            $produto = null;
        }

        return view('dashboard.entrada.itensEntrada', [
            'entrada' => Entrada::find($identrada),
            'produto' => $produto,
        ]);
    }

    public function inserirItem($identrada)
    {
        $produtos = Produto::all();

        return view('dashboard.entrada.inserirItem', [
            'entrada' => Entrada::find($identrada),
            'produtos' => $produtos
        ]);
    }

    public function finalizarEntrada($identrada, Request $request)
    {
        $entrada = Entrada::find($identrada);
        $entrada->status = 1;
        $entrada->save();

        return redirect()->route('dashboard.entrada.index')->with('success', 'Entrada finalizada com sucesso!');
    }

    public function getAutocomplete(Request $request)
    {
        $nome = $request->nome;

        if ($nome == '') {
            $autocomplete = Fornecedor::orderby('nome', 'asc')->select('idfornecedor', 'nome')->limit(5)->get();
        } else {
            $autocomplete = Fornecedor::orderby('nome', 'asc')->select('idfornecedor', 'nome')->where('nome', 'ilike', '%' . $nome . '%')->limit(5)->get();
        }

        $response = array();

        foreach ($autocomplete as $autocomplete) {
            $response[] = array(
                "value" => $autocomplete->idfornecedor,
                "label" => strtoupper($autocomplete->nome)
            );
        }

        echo json_encode($response);
        exit;
    }

    public function store(StoreEntradaRequest $request)
    {
        $entrada = Entrada::create($request->all());

        return redirect()->route('entrada.itensentrada', ['identrada' => $entrada->identrada]);
    }
}
