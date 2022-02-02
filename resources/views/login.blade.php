<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <title>Socape</title>
</head>

<body><div class="login">
  <div class="row">
      <div class="col">
          <div class="card">
              <img src="{{ asset('images/socape.png') }}">

              <form method="GET" action="{{ route('dashboard.index') }}">
                  <div class="card-body text-center">
                      <h5 class="card-title">Login</h5>
                  </div>
                  <div class="card-body">
                      <div class="mb-3">
                          <label for="usuario" class="form-label">Usuário</label>
                          <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" required autofocus>
                      </div>

                      <div class="mb-3">
                          <label for="senha" class="form-label">Senha</label>
                          <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                      </div>
                  </div>

                  <div class="card-body text-center">
                      <div class="mb-4">
                          <button type="submit" class="btn">Entrar</button>
                      </div>

                      <div class="mb-0">
                          <a href="">Cadastre-se</a>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>