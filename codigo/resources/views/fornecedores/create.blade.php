@extends('layouts.main')

@section('title', 'Cadastro de Fornecedores')

@section('content')
   <div>
        <form action="{{ route("fornecedores.store") }}" method="post">
            @csrf

            <div class="input">
                <label for="nome">Nome do Fornecedor</label>
                <input id="nome" type="text" name="nome">
                @error('nome') <strong>{{ $message }}</strong> @enderror
            </div>

            <div class="input">
                <label for="cnpj">CNPJ</label>
                <input id="cnpj" type="number" name="cnpj">
                @error('cnpj') <strong>{{ $message }}</strong> @enderror
            </div>

            <div class="input">
                <label for="telefone">Telefone</label>
                <input id="telefone" type="number" name="telefone">
                @error('telefone') <strong>{{ $message }}</strong> @enderror
            </div>

            <div class="input">
                <label for="endereco">Endereço</label>
                <input id="endereco" type="text" name="endereco">
                @error('endereco') <strong>{{ $message }}</strong> @enderror
            </div>

            <div class="input">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection('content')