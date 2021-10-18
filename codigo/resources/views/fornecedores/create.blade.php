<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de fornecedores</title>
</head>

<body>
    <form method="post" action="./store">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" />
        
        <label for="cnpj">CNPJ</label>
        <input type="text" id="cnpj" name="cnpj" />

        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" />

        <label for="endereco">Endereço</label>
        <input type="text" id="endereco" name="endereco" />

        <input type="submit" value="Cadastrar" />
    </form>
</body>
</html>