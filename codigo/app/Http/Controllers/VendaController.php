<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendaRequest;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\ItensVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::all();

        return view('vendas.index', ['vendas' => $vendas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendas.create', [
            'produtos' => Produto::all(),
            'clientes' => Cliente::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Venda::findOrFail($request->id)->delete();
        return redirect()->route('vendas.index');
    }
}
