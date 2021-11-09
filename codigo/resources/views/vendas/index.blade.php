@extends('layouts.main')

@section('title', 'Lista de Vendas')

@section('content')
    @if (Session::has('msg'))
        <div>
            {{ Session::get('msg') }}
        </div>
    @endif

    <div>
        <p id="title">
            <span>Lista de Vendas</span>

            <small>
                <a href="{{ route("vendas.create") }}">Adicionar</a>
            </small>
        </p>

        <table id="table">
            <thead>
                <tr>
                    <th>CLIENTE</th>
                    <th>VALOR TOTAL</th>
                    <th>DATA DA VENDA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($vendas as $venda)
                    <tr>
                        <td>{{ $venda->idcliente }}</td>
                        <td>R$ {{ $venda->valortotal }}</td>
                        <td>{{ $venda->datavenda }}</td>
                        <td>
                            <div>
                                <a
                                {{-- href="{{ route("vendas.show", ['id' => $venda->id]) }}" --}}
                                >
                                    <button type="button">VISUALIZAR</button>
                                </a>
                            </div>

                            <div>
                                <a
                                {{-- href="{{ route("vendas.edit", ['id' => $venda->id]) }}" --}}
                                >
                                    <button type="button">EDITAR</button>
                                </a>
                            </div>

                            <div>
                                <form method="post"
                                {{-- action="{{ route("vendas.destroy") }}" --}}
                                >
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $venda->id }}" />
                
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