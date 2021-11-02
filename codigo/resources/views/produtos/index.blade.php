<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lista de Produtos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid"> <button class="navbar-toggler navbar-toggler-right border-0 p-0" type="button" data-toggle="collapse" data-target="#navbar20">
                <p class="navbar-brand text-white mb-0"> <i class="fa d-inline fa-lg fa-stop-circle"></i> BBBOOTSTRAP </p>
            </button>
            <div class="collapse navbar-collapse" id="navbar20">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('clientes.index') }}">CLIENTES</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('fornecedores.index') }}">FORNECEDOR</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('produtos.index') }}">PRODUTOS</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('entradas.index') }}">ENTRADAS</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('vendas.index') }}">VENDAS</a> </li>
                </ul>
                <p class="d-none d-md-block lead mb-0 text-white"> <i class="fa d-inline fa-lg fa-stop-circle"></i>
                    <b>BBBOOTSTRAP</b>
                </p>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-1"> <a class="nav-link" href="#"> <i class="fa fa-github fa-fw fa-lg"></i> </a> </li>
                    <li class="nav-item mx-1"> <a class="nav-link" href="#"> <i class="fa fa-dropbox fa-fw fa-lg"></i> </a> </li>
                    <li class="nav-item mx-1"> <a class="nav-link" href="#"> <i class="fa fa-bitbucket fa-fw fa-lg"></i> </a> </li>
                </ul>
            </div>
        </div>
    </nav>

    @if (Session::has('msg'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('msg') }}
        </div>
    @endif
    <div class="container pt-5">
        <h1>Lista de Produtos</h1>
        <a href="./produtos/create" class="btn btn-success mt-2">Adicionar</a>
        <table class="table table-striped table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">ICMS</th>
                    <th scope="col">IPI</th>
                    <th scope="col">FRETE</th>
                    <th scope="col">PREÇO NA FÁBRICA</th>
                    <th scope="col">PREÇO DE COMPRA</th>
                    <th scope="col">PREÇO DE VENDA</th>
                    <th scope="col">LUCRO</th>
                    <th scope="col">DESCONTO</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }} </td>
                        <td>{{ $produto->icms }}</td>
                        <td>{{ $produto->ipi }}</td>
                        <td>{{ $produto->frete }}</li>
                        <td>{{ $produto->precofabrica }}</td>
                        <td>{{ $produto->precocompra }}</td>
                        <td>{{ $produto->precovenda }}</td>
                        <td>{{ $produto->lucro }}</td>
                        <td>{{ $produto->desconto }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ $produto->created_at }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="mr-2">
                                    <a href="{{ route("produtos.edit", ['id' => $produto->id]) }}" class="btn btn-sm btn-warning">EDITAR</a>
                                </div>
                                <form method="post" action="{{ route("produtos.destroy") }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $produto->id }}" />

                                    <input type="submit" class="btn btn-sm btn-danger" value="DELETAR" />
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
