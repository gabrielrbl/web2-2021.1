@extends('layouts.main')

@section('title', 'Cadastro de Produtos')

@section('content')
   <div>
        <form action="{{ route("produtos.store") }}" method="post">
            @csrf

            <div class="input">
                <label for="nome">Nome do Produto</label>
                <input id="nome" type="text" name="nome" required="required">
            </div>

            <div class="input">
                <label for="icms">ICMS</label>
                <input id="icms" type="number" name="icms" required="required">
            </div>

            <div class="input">
                <label for="ipi">IPI</label>
                <input id="ipi" type="number" name="ipi" required="required">
            </div>

            <div class="input">
                <label for="frete">Frete</label>
                <input id="frete" type="number" name="frete" required="required">
            </div>

            <div class="input">
                <label for="precofabrica">Preço na fábrica</label>
                <input id="precofabrica" type="number" name="precofabrica" required="required">
            </div>

            <div class="input">
                <label for="precocompra">Preço de compra</label>
                <input id="precocompra" type="number" name="precocompra" required="required">
            </div>

            <div class="input">
                <label for="precovenda">Preço de venda</label>
                <input id="precovenda" type="number" name="precovenda" required="required">
            </div>

            <div class="input">
                <label for="lucro">Lucro</label>
                <input id="lucro" type="number" name="lucro" required="required">
            </div>

            <div class="input">
                <label for="desconto">Desconto</label>
                <input id="desconto" type="number" name="desconto" required="required">
            </div>

            <div class="input">
                <label for="quantidade">Quantidade</label>
                <input id="quantidade" type="number" name="quantidade" required="required">
            </div>
            
            <div class="input">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection('content')