<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendaRequest;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        return view('dashboard.venda.index', ['vendas' => Venda::orderby('data', 'desc')->get()]);
    }

    public function itensVenda($idvenda, $idproduto=null)
    {
        if ($idproduto) {
            $produto = Produto::find($idproduto);
        } else {
            $produto = null;
        }

        return view('dashboard.venda.itensVenda', [
            'venda' => Venda::find($idvenda),
            'formaspagamento' => FormaPagamento::all(),
            'produto' => $produto,
        ]);
    }

    public function inserirItem($idvenda)
    {
        $produtos = Produto::all();

        return view('dashboard.venda.inserirItem', [
            'venda' => Venda::find($idvenda),
            'produtos' => $produtos
        ]);
    }

    public function finalizarVenda($idvenda, Request $request)
    {
        $venda = Venda::find($idvenda);
        $venda->status = 1;
        $venda->idformapagamento = $request->idformapagamento;
        $venda->save();

        return redirect()->route('venda.itensvenda', [
            'idvenda' => $idvenda
        ])->with('success', 'Venda finalizada com sucesso!');
    }

    public function getAutocomplete(Request $request){
        $nome = $request->nome;
  
        if ($nome == ''){
           $autocomplete = Cliente::orderby('nome', 'asc')->select('idcliente', 'nome')->limit(5)->get();
        } else {
           $autocomplete = Cliente::orderby('nome', 'asc')->select('idcliente', 'nome')->where('nome', 'ilike', '%' . $nome . '%')->limit(5)->get();
        }
  
        $response = array();

        foreach($autocomplete as $autocomplete){
           $response[] = array(
               "value" => $autocomplete->idcliente,
               "label" => strtoupper($autocomplete->nome)
            );
        }
  
        echo json_encode($response);
        exit;
    }

    public function store(StoreVendaRequest $request)
    {
        $venda = Venda::create($request->all());
    
        return redirect()->route('venda.itensvenda', ['idvenda' => $venda->idvenda]);
    }
}
