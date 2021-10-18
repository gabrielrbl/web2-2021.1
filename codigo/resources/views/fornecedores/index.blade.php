<h1>Página de fornecedores</h1>

@foreach ($fornecedores as $fornecedor)
<ul>
    <li>NOME: {{ $fornecedor->nome }}</li>
    <li>CNPJ: {{ $fornecedor->cnpj }}</li>
    <li>TELEFONE: {{ $fornecedor->telefone }}</li>
    <li>ENDEREÇO: {{ $fornecedor->endereco }}</li>
</ul>
@endforeach