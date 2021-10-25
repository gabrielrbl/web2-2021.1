<h1>Página de clientes</h1>

@if (Session::has('msg'))
    <h2>{{ Session::get('msg') }}</h2>
@endif

@foreach ($clientes as $cliente)
<ul>
    <li>NOME: {{ $cliente->nome }}</li>
    <li>ENDEREÇO: {{ $cliente->endereco }}</li>
    <li>DÉBITO: {{ $cliente->debito }}</li>
    <li>
        <a href="./clientes/edit/{{ $cliente->id }}">
            <button style="background-color: yellow">EDITAR</button>
        </a>
    </li>

    <li>
        <form method="post" action="./clientes/destroy">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $cliente->id }}" />

            <input type="submit" style="background-color: red" value="DELETAR" />
        </form>
    </li>
</ul>
@endforeach