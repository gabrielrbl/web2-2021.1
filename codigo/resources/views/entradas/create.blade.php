<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de entradas</title>
</head>

<body>
    <form method="post" action="./store">
        @csrf
        <label for="idfornecedor">ID fornecedor</label>
        <input type="text" id="idfornecedor" name="idfornecedor" />

        <input type="submit" value="Cadastrar" />
    </form>
</body>
</html>