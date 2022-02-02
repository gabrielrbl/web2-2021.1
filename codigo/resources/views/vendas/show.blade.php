@extends('layouts.main')

@section('title', 'Lista de Vendas')

@section('content')
    <div>
        <p id="title">
            <span>Visualizar venda</span>

            <small>
                <a href="{{ route("vendas.create") }}">Adicionar</a>
            </small>
        </p>

        <p style="font-size: 20px;">
            <span>Cliente: </span>
            <strong>{{ $venda[0]->nome_cliente }}</strong>
        </p>

        <p style="font-size: 20px;">
            <span>Lista de Produtos</span>
        </p>

        <table id="table">
            <thead>
                <tr>
                    <th>NÚMERO</th>
                    <th>PRODUTO</th>
                    <th>QTD</th>
                    <th>UNIT.</th>
                </tr>
            </thead>
            <tbody align="left">
                @for($i = 0; $i < count($venda); $i++)
                    <tr>
                        <th>{{ $i+1 }}</th>
                        <td>{{ $venda[$i]->nome_produto }}</td>
                        <td>{{ $venda[$i]->quantidade }}</td>
                        <td>R$ {{ $venda[$i]->valor_unitario }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <span class="valor mb-5 d-flex justify-content-between">
            <span class="ml-3">VALOR TOTAL DA VENDA:</span>
            <strong class="mr-5">R$ {{ $venda[0]->valor_total_venda }}</strong>
        </span>
    </div>
@endsection('content')