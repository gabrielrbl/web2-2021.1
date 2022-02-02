@extends('layouts.main')

@section('title', 'Visualizar cliente')

@section('content')
    <div>
        <p id="title">
            <span>Detalhes do cliente {{ $cliente->nome }}</span>
        </p>

        <ul>
            <li>NOME: {{ $cliente->nome }}</li>
            <li>ENDEREÇO: {{ $cliente->endereco }}</li>
            <li>DÉBITO: {{ $cliente->debito }}</li>
        </ul>
    </div>
@endsection('content')