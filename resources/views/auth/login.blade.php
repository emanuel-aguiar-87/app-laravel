<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - PostHub</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #4f46e5, #6366f1);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      background: white;
      padding: 40px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .login-container h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #4f46e5;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 25px;
      background: #4f46e5;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }

    .btn:hover {
      background: #4338ca;
    }

    .extra {
      text-align: center;
      margin-top: 15px;
      font-size: 0.9em;
    }

    .extra a {
      color: #4f46e5;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="login-container">

    @if ($errors)
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <h2>Entrar no PostHub</h2>

    <form action="{{ route('authenticate') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required>
      </div>

      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
      </div>

      <button type="submit" class="btn">Entrar</button>
    </form>

    <div class="extra">
      <p>Não tem conta? <a href="#">Cadastre-se</a></p>
      <p><a href="#">Esqueceu a senha?</a></p>
    </div>
  </div>

</body>
</html>
