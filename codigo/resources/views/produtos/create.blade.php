<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cadastro de produtos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid"> <button class="navbar-toggler navbar-toggler-right border-0 p-0" type="button"
                data-toggle="collapse" data-target="#navbar20">
                <p class="navbar-brand text-white mb-0"> <i class="fa d-inline fa-lg fa-stop-circle"></i> BBBOOTSTRAP </p>
            </button>
            <div class="collapse navbar-collapse" id="navbar20">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> <a class="nav-link" href="clientes/">CLIENTES</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="fornecedores/">FORNECEDOR</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="produtos/">PRODUTOS</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="entradas/">ENTRADAS</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="vendas/">VENDAS</a> </li>
                </ul>
                <p class="d-none d-md-block lead mb-0 text-white"> <i class="fa d-inline fa-lg fa-stop-circle"></i> <b>
                        BBBOOTSTRAP</b> </p>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-1"> <a class="nav-link" href="#"> <i
                                class="fa fa-github fa-fw fa-lg"></i> </a> </li>
                    <li class="nav-item mx-1"> <a class="nav-link" href="#"> <i
                                class="fa fa-dropbox fa-fw fa-lg"></i> </a> </li>
                    <li class="nav-item mx-1"> <a class="nav-link" href="#"> <i
                                class="fa fa-bitbucket fa-fw fa-lg"></i> </a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class=" text-center mt-5 ">
            <h1>Cadastar Fornecedor</h1>
        </div>
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form id="contact-form" role="form" method="POST" action="./store">
                                @csrf
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_nome">Nome do Produto *</label>
                                                <input id="form_nome" type="text" name="nome" id="nome"class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="icms">ICMS *</label>
                                              <input id="icms" type="number" name="icms" id="icms"class="form-control">
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ipi">IPI *</label>
                                                <input id="ipi" type="number" name="ipi"
                                                    class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="frete">Frete *</label>
                                                <input type="number" name="frete" id="frete" class="form-control"
                                                    required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="precofabrica">Preço na Fábrica *</label>
                                              <input id="precofabrica" type="number" name="precofabrica"
                                                  class="form-control" required="required">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="precocompra">Preço de Compra *</label>
                                              <input type="number" name="precocompra" id="precocompra" class="form-control"
                                                  required="required">
                                          </div>
                                      </div>
                                  </div>


                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precovenda">Preço de Venda *</label>
                                            <input id="precovenda" type="number" name="precovenda"
                                                class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lucro">Lucro *</label>
                                            <input type="number" name="lucro" id="lucro" class="form-control"
                                                required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="desconto">Desconto *</label>
                                          <input id="desconto" type="number" name="desconto"
                                              class="form-control" required="required">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="quantidade">Quantidade *</label>
                                          <input type="number" name="quantidade" id="quantidade" class="form-control"
                                              required="required">
                                      </div>
                                  </div>
                              </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-send pt-2 btn-block "
                                                value="Enviar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

