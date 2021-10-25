<h1>Página de entradas</h1>

@if (Session::has('msg'))
    <h2>{{ Session::get('msg') }}</h2>
@endif

@foreach ($entradas as $entrada)
<ul>
    <li>FORNECEDOR: {{ $entrada->idfornecedor }}</li>
    <li>VALOR TOTAL: R${{ $entrada->valortotal }}</li>
    <li>DATA DA COMPRA: {{ $entrada->datacompra }}</li>
</ul>
@endforeach