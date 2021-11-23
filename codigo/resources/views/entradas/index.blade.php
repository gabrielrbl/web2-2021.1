@extends('layouts.main')

@section('title', 'Lista de Entradas')

@section('content')
    @if (Session::has('msg'))
        <div>
            {{ Session::get('msg') }}
        </div>
    @endif

    <div>
        <p id="title">
            <span>Lista de Entradas</span>

            <small>
                <a href="{{ route("entradas.create") }}">Adicionar</a>
            </small>
        </p>

        <table id="table">
            <thead>
                <tr>
                    <th>FORNECEDOR</th>
                    <th>VALOR TOTAL</th>
                    <th>DATA COMPRA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($entradas as $entrada)
                    <tr>
                        <td>{{ $entrada->fornecedor->nome }}</td>
                        <td>R$ {{ $entrada->valortotal }}</td>
                        <td>{{ $entrada->datacompra }}</td>
                        <td>
                            <div>
                                <a href="{{ route("entradas.show", ['id' => $entrada->id]) }}">
                                    <button type="button">VISUALIZAR</button>
                                </a>
                            </div>

                            <div>
                                <a href="{{ route("entradas.edit", ['id' => $entrada->id]) }}">
                                    <button type="button">EDITAR</button>
                                </a>
                            </div>

                            <div>
                                <form method="post" action="{{ route("entradas.destroy") }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $entrada->id }}" />
                
                                    <input type="submit" value="DELETAR" />
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection('content')