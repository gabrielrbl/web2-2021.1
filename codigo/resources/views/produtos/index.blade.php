<h1>Página de produtos</h1>

@if (Session::has('msg'))
    <h2>{{ Session::get('msg') }}</h2>
@endif

@foreach ($produtos as $produto)
<ul>
    <li>NOME: {{ $produto->nome }}</li>
    <li>ICMS: {{ $produto->icms }}</li>
    <li>IPI: {{ $produto->ipi }}</li>
    <li>FRETE: {{ $produto->frete }}</li>
    <li>PREÇO NA FÁBRICA: {{ $produto->precofabrica }}</li>
    <li>PREÇO DE COMPRA: {{ $produto->precocompra }}</li>
    <li>PREÇO DE VENDA: {{ $produto->precovenda }}</li>
    <li>LUCRO: {{ $produto->lucro }}</li>
    <li>DESCONTO: {{ $produto->desconto }}</li>
    <li>QUANTIDADE: {{ $produto->quantidade }}</li>
</ul>
@endforeach