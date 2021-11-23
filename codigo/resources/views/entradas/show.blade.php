@extends('layouts.main')

@section('title', 'Lista de Entradas')

@section('content')
    <div>
        <p id="title">
            <span>Visualizar entrada</span>

            <small>
                <a href="{{ route("entradas.create") }}">Adicionar</a>
            </small>
        </p>

        <p style="font-size: 20px;">
            <span>Fornecedor: </span>
            <strong>{{ $entrada[0]->nome_fornecedor }}</strong>
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
                @for($i = 0; $i < count($entrada); $i++)
                    <tr>
                        <th>{{ $i+1 }}</th>
                        <td>{{ $entrada[$i]->nome_produto }}</td>
                        <td>{{ $entrada[$i]->quantidade }}</td>
                        <td>R$ {{ $entrada[$i]->valor_unitario }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <span class="valor mb-5 d-flex justify-content-between">
            <span class="ml-3">VALOR TOTAL DA ENTRADA:</span>
            <strong class="mr-5">R$ {{ $entrada[0]->valor_total_entrada }}</strong>
        </span>
    </div>
@endsection('content')