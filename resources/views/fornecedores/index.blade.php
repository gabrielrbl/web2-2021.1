@extends('layouts.main')

@section('title', 'Lista de Fornecedores')

@section('content')
    @if (Session::has('msg'))
        <div>
            {{ Session::get('msg') }}
        </div>
    @endif

    <div>
        <p id="title">
            <span>Lista de Fornecedores</span>

            <small>
                <a href="{{ route("fornecedores.create") }}">Adicionar</a>
            </small>
        </p>

        <table id="table">
            <thead>
                <tr>
                    <th>FORNECEDOR</th>
                    <th>CNPJ</th>
                    <th>TELEFONE</th>
                    <th>ENDEREÇO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->nome }}</td>
                        <td>{{ $fornecedor->cnpj }}</td>
                        <td>{{ $fornecedor->telefone }}</td>
                        <td>{{ $fornecedor->endereco }}</td>
                        <td>
                            <div>
                                <a
                                {{-- href="{{ route("fornecedores.show", ['id' => $fornecedor->id]) }}" --}}
                                >
                                    <button type="button">VISUALIZAR</button>
                                </a>
                            </div>

                            <div>
                                <a
                                {{-- href="{{ route("fornecedores.edit", ['id' => $fornecedor->id]) }}" --}}
                                >
                                    <button type="button">EDITAR</button>
                                </a>
                            </div>

                            <div>
                                <form method="post" action="{{ route("fornecedores.destroy") }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $fornecedor->id }}" />
                
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