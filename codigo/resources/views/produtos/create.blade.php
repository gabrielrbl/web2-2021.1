<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de produtos</title>
</head>

<body>
    <form method="post" action="./store">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" />

        <label for="icms">ICMS</label>
        <input type="text" id="icms" name="icms" />
        
        <label for="ipi">IPI</label>
        <input type="text" id="ipi" name="ipi" />
        
        <label for="frete">Frete</label>
        <input type="text" id="frete" name="frete" />
        
        <label for="precofabrica">Preço na fábrica</label>
        <input type="text" id="precofabrica" name="precofabrica" />
        
        <label for="precocompra">Preço de compra</label>
        <input type="text" id="precocompra" name="precocompra" />
        
        <label for="precovenda">Preço de venda</label>
        <input type="text" id="precovenda" name="precovenda" />
        
        <label for="lucro">Lucro</label>
        <input type="text" id="lucro" name="lucro" />
        
        <label for="desconto">Desconto</label>
        <input type="text" id="desconto" name="desconto" />
        
        <label for="quantidade">Quantidade</label>
        <input type="text" id="quantidade" name="quantidade" />

        <input type="submit" value="Cadastrar" />
    </form>
</body>
</html>