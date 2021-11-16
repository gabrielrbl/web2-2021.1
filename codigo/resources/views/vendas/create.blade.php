@extends('layouts.main')

@section('title', 'Cadastro de Vendas')

@section('content')
   <div>
        <form action="{{ route("vendas.store") }}" method="post">
            @csrf

            <div class="input">
                <label for="idcliente">ID Cliente</label>
                <input id="idcliente" type="number" name="idcliente">
                @error('idcliente') <strong>{{ $message }}</strong> @enderror
            </div>

            <div class="input">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection('content')