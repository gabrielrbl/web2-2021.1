<h1>Página de vendas</h1>

@if (Session::has('msg'))
    <h2>{{ Session::get('msg') }}</h2>
@endif

@foreach ($vendas as $venda)
<ul>
    <li>CLIENTE: {{ $venda->idcliente }}</li>
    <li>VALOR TOTAL: R${{ $venda->valortotal }}</li>
    <li>DATA DA VENDA: {{ $venda->datavenda }}</li>
</ul>
@endforeach