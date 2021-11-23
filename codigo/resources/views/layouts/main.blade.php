<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS local -->
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">

   <title>@yield('title')</title>
</head>
<body>
    <div id="header">
        <h1>SISTEMA DE VENDAS</h1>

        <span>
            <a href="{{ route('clientes.index') }}">Clientes</a>
            <a href="{{ route('fornecedores.index') }}">Fornecedores</a>
            <a href="{{ route('produtos.index') }}">Produtos</a>
            <a href="{{ route('entradas.index') }}">Entradas</a>
            <a href="{{ route('vendas.index') }}">Vendas</a>
        </span>
    </div>

    <div id="content">
        @yield('content')
    </div>
    
    <div id="footer">
        COPYRIGHT © GABRIEL LOBO WEBII
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</body>

@stack('scripts')

</html>