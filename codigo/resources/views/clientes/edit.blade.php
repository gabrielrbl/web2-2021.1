<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edição de cliente {{ $cliente->nome }}</title>
</head>

<body>
    <form method="post" action="./../update">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $cliente->id }}" />

        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="{{ $cliente->nome }}" />
        
        <label for="endereco">Endereço</label>
        <input type="text" id="endereco" name="endereco" value="{{ $cliente->endereco }}" />

        <label for="debito">Débito</label>
        <input type="text" id="debito" name="debito" value="{{ $cliente->debito }}" />

        <input type="submit" value="Atualizar" />
    </form>
</body>
</html>