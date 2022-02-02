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
                <input id="nome" type="text" name="nome" value="{{ $cliente->nome }}">
                @error('nome') <strong>{{ $message }}</strong> @enderror
            </div>

            <div class="input">
                <label for="endereco">Endereço</label>
                <input id="endereco" type="text" name="endereco" value="{{ $cliente->endereco }}">
                @error('endereco') <strong>{{ $message }}</strong> @enderror
            </div>
            
            <div class="input">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
@endsection('content')