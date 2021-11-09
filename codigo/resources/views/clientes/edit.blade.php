@extends('layouts.main')

@section('title', 'Editar cliente')

@section('content')
   <div>
        <form action="{{ route("clientes.update") }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $cliente->id }}" />

            <div class="input">
                <label for="nome">Nome do Cliente</label>
                <input id="nome" type="text" name="nome" required="required" value="{{ $cliente->nome }}">
            </div>
            <div class="input">
                <label for="endereco">Endereço</label>
                <input id="endereco" type="text" name="endereco" required="required" value="{{ $cliente->endereco }}">
            </div>
            <div class="input">
                <label for="debito">Débito</label>
                <input id="debito" type="text" name="debito" required="required" value="{{ $cliente->debito }}">
            </div>
            <div class="input">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
@endsection('content')