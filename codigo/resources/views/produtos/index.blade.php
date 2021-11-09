@extends('layouts.main')

@section('title', 'Lista de Produtos')

@section('content')
    @if (Session::has('msg'))
        <div>
            {{ Session::get('msg') }}
        </div>
    @endif

    <div>
        <p id="title">
            <span>Lista de Produtos</span>

            <small>
                <a href="{{ route("produtos.create") }}">Adicionar</a>
            </small>
        </p>

        <table id="table">
            <thead>
                <tr>
                    <th>PRODUTO</th>
                    <th>ICMS</th>
                    <th>IPI</th>
                    <th>FRETE</th>
                    <th>PREÇO NA FÁBRICA</th>
                    <th>PREÇO DE COMPRA</th>
                    <th>PREÇO DE VENDA</th>
                    <th>LUCRO</th>
                    <th>DESCONTO</th>
                    <th>QUANTIDADE</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }} </td>
                        <td>{{ $produto->icms }}</td>
                        <td>{{ $produto->ipi }}</td>
                        <td>{{ $produto->frete }}</li>
                        <td>{{ $produto->precofabrica }}</td>
                        <td>{{ $produto->precocompra }}</td>
                        <td>{{ $produto->precovenda }}</td>
                        <td>{{ $produto->lucro }}</td>
                        <td>{{ $produto->desconto }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>
                            <div>
                                <a
                                {{-- href="{{ route("produtos.show", ['id' => $produto->id]) }}" --}}
                                >
                                    <button type="button">VISUALIZAR</button>
                                </a>
                            </div>

                            <div>
                                <a
                                {{-- href="{{ route("produtos.edit", ['id' => $produto->id]) }}" --}}
                                >
                                    <button type="button">EDITAR</button>
                                </a>
                            </div>

                            <div>
                                <form method="post"
                                {{-- action="{{ route("produtos.destroy") }}" --}}
                                >
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $produto->id }}" />
                
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