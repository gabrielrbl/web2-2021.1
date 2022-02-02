<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntradaRequest;
use App\Models\Entrada;
use App\Models\ItensEntrada;
use App\Models\Produto;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::all();

        return view('dashboard.entrada.index', ['entradas' => $entradas]);
    }

    public function itensEntrada()
    {
        return view('dashboard.entrada.itensEntrada');
    }

    public function getAutocomplete(Request $request){
        $search = $request->search;
  
        if($search == ''){
           $autocomplete = Fornecedor::orderby('nome', 'asc')->select('idfornecedor', 'nome')->limit(5)->get();
        } else {
           $autocomplete = Fornecedor::orderby('nome', 'asc')->select('idfornecedor', 'nome')->where('nome', 'like', '%' . $search . '%')->limit(5)->get();
        }
  
        $response = array();

        foreach($autocomplete as $autocomplete){
           $response[] = array(
               "value" => $autocomplete->idfornecedor,
               "label" => strtoupper($autocomplete->nome)
            );
        }
  
        echo json_encode($response);
        exit;
    }

    public function create()
    {
        return view('entradas.create', [
            'produtos' => Produto::all(),
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function store(StoreEntradaRequest $request)
    {
        $valorTotal = 0;
        $quantidades = $request->quantidade;
        $produtos = $request->idproduto;
        $valores = $request->precocompra;

        for($i = 0; $i < count($produtos); $i++) { 
            $valorTotal += $quantidades[$i] * $valores[$i];
        }

        $entrada = new Entrada();
        $entrada->idfornecedor = $request->idfornecedor;
        $entrada->valortotal = $valorTotal;
        $entrada->save();

        for ($i = 0; $i < count($produtos); $i++) { 
            $itensEntrada = new ItensEntrada();
            $itensEntrada->idproduto = $produtos[$i];
            $itensEntrada->identrada = $entrada->id;
            $itensEntrada->precocompra = $valores[$i];
            $itensEntrada->quantidade = $quantidades[$i];
            $itensEntrada->save();

            $produto = Produto::findOrFail($produtos[$i]);
            $produto->precocompra = $valores[$i];
            $produto->precovenda = $valores[$i] * ($produto->lucro / 100) + $valores[$i];
            $produto->quantidade += $quantidades[$i];
            $produto->save();
        }

        return redirect()->route('entradas.index');
    }

    public function show($id)
    {
        $entrada = Entrada::select(
            'fornecedores.nome as nome_fornecedor',
            'produtos.nome as nome_produto',
            'itens_entradas.quantidade as quantidade',
            'itens_entradas.precocompra as valor_unitario',
            'entradas.valortotal as valor_total_entrada'
        )
        ->join('fornecedores', 'fornecedores.id', '=', 'entradas.idfornecedor')
        ->join('itens_entradas', 'itens_entradas.identrada', '=', 'entradas.id')
        ->join('produtos', 'produtos.id', '=', 'itens_entradas.idproduto')
        ->where('entradas.id', '=', $id) 
        ->get();

        return view('entradas.show', ['entrada' => $entrada]);
    }

    public function edit($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->fornecedor = $entrada->fornecedor()->get();
        $entrada->itensEntrada = $entrada->itens_entrada()->get();

        return view('entradas.edit', [
            'entrada' => $entrada,
            'produtos' => Produto::all(),
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function update(StoreEntradaRequest $request)
    {
        $valorTotal = 0;
        $quantidades = $request->quantidade;
        $produtos = $request->idproduto;
        $valores = $request->precocompra;

        for($i = 0; $i < count($produtos); $i++) { 
            $valorTotal += $quantidades[$i] * $valores[$i];
        }

        $entrada = Entrada::findOrFail($request->id);
        $entrada->idfornecedor = $request->idfornecedor;
        $entrada->valortotal = $valorTotal;
        $entrada->save();

        ItensEntrada::where('identrada', $request->id)->delete();

        for ($i = 0; $i < count($produtos); $i++) { 
            $itensEntrada = new ItensEntrada();
            $itensEntrada->idproduto = $produtos[$i];
            $itensEntrada->identrada = $entrada->id;
            $itensEntrada->precocompra = $valores[$i];
            $itensEntrada->quantidade = $quantidades[$i];
            $itensEntrada->save();

            $produto = Produto::findOrFail($produtos[$i]);
            $produto->precocompra = $valores[$i];
            $produto->precovenda = $valores[$i] * ($produto->lucro / 100) + $valores[$i];
            $produto->quantidade += $quantidades[$i];
            $produto->save();
        }

        return redirect()->route('entradas.index');
    }

    public function destroy(Request $request)
    {
        Entrada::findOrFail($request->id)->delete();
        return redirect()->route('entrada.index');
    }
}
