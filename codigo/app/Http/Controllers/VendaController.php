<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendaRequest;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\ItensVenda;
use App\Models\Marca;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        return view('dashboard.venda.index', ['vendas' => Venda::all()]);
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
            'categorias' => Categoria::all(),
            'marcas' => Marca::all(),
            'produtos' => $produtos
        ]);
    }

    public function inserirItemVenda($idvenda, Request $request)
    {
        $itemVenda = new ItensVenda();
        $itemVenda->idvenda = $idvenda;
        $itemVenda->idproduto = $request->idproduto;
        $itemVenda->quantidade = $request->quantidade;
        $itemVenda->valorvenda = $request->valorvenda;
        $itemVenda->desconto = $request->desconto;
        $itemVenda->lucro = 1;
        $itemVenda->save();

        return redirect()->route('venda.itensvenda', ['idvenda' => $idvenda]);
    }

    public function finalizarVenda($idvenda, Request $request)
    {
        $venda = Venda::find($idvenda);
        $venda->status = 1;
        $venda->idformapagamento = $request->idformapagamento;
        $venda->save();

        return redirect()->route('venda.itensvenda', ['idvenda' => $idvenda]);
    }

    public function getAutocomplete(Request $request){
        $nome = $request->nome;
  
        if ($nome == ''){
           $autocomplete = Cliente::orderby('nome', 'asc')->select('idcliente', 'nome')->limit(5)->get();
        } else {
           $autocomplete = Cliente::orderby('nome', 'asc')->select('idcliente', 'nome')->where('nome', 'like', '%' . $nome . '%')->limit(5)->get();
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

    public function create(Request $request)
    {
        $idcliente = $request->idcliente;

        $venda = new Venda();
        $venda->idcliente = $idcliente;
        $venda->idformapagamento = 1;
        $venda->data = date('Y-m-d');
        $venda->valortotal = 0;
        $venda->status = 0;
        $venda->save();
    
        return redirect()->route('venda.itensvenda', ['idvenda' => $venda->idvenda]);
    }

    public function store(StoreVendaRequest $request)
    {
        $valorTotal = 0;
        $quantidades = $request->quantidade;
        $produtos = $request->idproduto;

        for($i = 0; $i < count($produtos); $i++) { 
            $valorTotal += Produto::find($produtos[$i])->precovenda * $quantidades[$i];
        }

        $venda = new Venda();
        $venda->idcliente = $request->idcliente;
        $venda->valortotal = $valorTotal;
        $venda->save();

        for($i = 0; $i < count($produtos); $i++) { 
            $itensVenda[$i] = new ItensVenda();
            $itensVenda[$i]->idvenda = $venda->id;
            $itensVenda[$i]->idproduto = $produtos[$i];
            $itensVenda[$i]->quantidade = $quantidades[$i];
            $itensVenda[$i]->valorunitario = Produto::find($produtos[$i])->precovenda;
            $itensVenda[$i]->save();

            $produto = Produto::findOrFail($produtos[$i]);
            $produto->quantidade -= $quantidades[$i];
            $produto->save();
        }

        return redirect()->route('vendas.index');
    }

    public function show($id)
    {
        $venda = Venda::select(
            'clientes.nome as nome_cliente',
            'produtos.nome as nome_produto',
            'itens_vendas.quantidade as quantidade',
            'itens_vendas.valorunitario as valor_unitario',
            'vendas.valortotal as valor_total_venda'
        )
        ->join('clientes', 'clientes.id', '=', 'vendas.idcliente')
        ->join('itens_vendas', 'itens_vendas.idvenda', '=', 'vendas.id')
        ->join('produtos', 'produtos.id', '=', 'itens_vendas.idproduto')
        ->where('vendas.id', '=', $id)
        ->get();
        
        return view('vendas.show', ['venda' => $venda]);
    }

    public function edit($id)
    {
        $venda = Venda::find($id);
        $venda->cliente = $venda->cliente()->get();
        $venda->itensVenda = $venda->itens_venda()->get();

        return view('vendas.edit', [
            'venda' => $venda,
            'produtos' => Produto::all(),
            'clientes' => Cliente::all()
        ]);
    }

    public function update(StoreVendaRequest $request)
    {
        $valorTotal = 0;
        $quantidades = $request->quantidade;
        $produtos = $request->idproduto;

        for($i = 0; $i < count($produtos); $i++) { 
            $valorTotal += Produto::find($produtos[$i])->precovenda * $quantidades[$i];
        }

        $venda = Venda::findOrFail($request->id);
        $venda->idcliente = $request->idcliente;
        $venda->valortotal = $valorTotal;
        $venda->save();

        ItensVenda::where('idvenda', '=', $request->id)->delete();

        for($i = 0; $i < count($produtos); $i++) { 
            $itensVenda[$i] = new ItensVenda();
            $itensVenda[$i]->idvenda = $venda->id;
            $itensVenda[$i]->idproduto = $produtos[$i];
            $itensVenda[$i]->quantidade = $quantidades[$i];
            $itensVenda[$i]->valorunitario = Produto::findOrFail($produtos[$i])->precovenda;
            $itensVenda[$i]->save();
        }

        return redirect()->route('vendas.index');
    }

    public function destroy(Request $request)
    {
        Venda::findOrFail($request->id)->delete();
        return redirect()->route('vendas.index');
    }
}
