@extends('layouts.main')

@section('title', 'Cadastro de Entradas')

@section('content')
   <div>
        <form action="{{ route('entradas.store') }}" method="post">
            @csrf

            <div class="input">
                <label for="idfornecedor">ID Fornecedor</label>
                <input id="idfornecedor" type="number" name="idfornecedor" required="required"> 
            </div>

            <div class="input">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection('content')