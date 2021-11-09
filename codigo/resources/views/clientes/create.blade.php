@extends('layouts.main')

@section('title', 'Cadastro de Clientes')

@section('content')
   <div>
        <form action="{{ route("clientes.store") }}" method="post">
            @csrf

            <div class="input">
                <label for="nome">Nome do Cliente</label>
                <input id="nome" type="text" name="nome" required="required">
            </div>

            <div class="input">
                <label for="endereco">Endereço</label>
                <input id="endereco" type="text" name="endereco" required="required">
            </div>

            <div class="input">
                <label for="debito">Débito</label>
                <input id="debito" type="number" name="debito" required="required">
            </div>

            <div class="input">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection('content')