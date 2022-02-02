@extends('layouts.main')

@section('title', 'Lista de Clientes')

@section('content')
    @if (Session::has('msg'))
        <div>
            {{ Session::get('msg') }}
        </div>
    @endif

    <div>
        <p id="title">
            <span>Lista de Clientes</span>

            <small>
                <a href="{{ route("clientes.create") }}">Adicionar</a>
            </small>
        </p>

        <table id="table">
            <thead>
                <tr>
                    <th>CLIENTE</th>
                    <th>ENDEREÇO</th>
                    <th>DÉBITO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->endereco }}</td>
                        <td>{{ $cliente->debito }}</td>
                        <td>
                            <div>
                                <a href="{{ route("clientes.show", ['id' => $cliente->id]) }}">
                                    <button type="button">VISUALIZAR</button>
                                </a>
                            </div>

                            <div>
                                <a href="{{ route("clientes.edit", ['id' => $cliente->id]) }}">
                                    <button type="button">EDITAR</button>
                                </a>
                            </div>

                            <div>
                                <form method="post" action="{{ route("clientes.destroy") }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $cliente->id }}" />
                
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