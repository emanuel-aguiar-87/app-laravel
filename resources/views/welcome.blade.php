<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PostHub - Compartilhe suas ideias</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f5f7fa;
      color: #333;
    }

    header {
      background: #4f46e5;
      color: white;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      margin: 0;
    }

    nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: bold;
    }

    .hero {
      text-align: center;
      padding: 80px 20px;
      background: linear-gradient(135deg, #4f46e5, #6366f1);
      color: white;
    }

    .hero h2 {
      font-size: 2.5em;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 1.2em;
      margin-bottom: 30px;
    }

    .btn {
      background: white;
      color: #4f46e5;
      padding: 12px 25px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
    }

    .features {
      padding: 60px 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .card h3 {
      margin-top: 0;
      color: #4f46e5;
    }

    .preview {
      padding: 60px 20px;
      background: #eef2ff;
    }

    .post {
      background: white;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .comment {
      margin-top: 10px;
      padding-left: 15px;
      border-left: 3px solid #4f46e5;
      font-size: 0.9em;
    }

    footer {
      text-align: center;
      padding: 20px;
      background: #4f46e5;
      color: white;
    }
  </style>
</head>
<body>

  <header>
    <h1>PostHub</h1>
    <nav>
      <a href="#">Início</a>
      <a href="#features">Recursos</a>
      <a href="#preview">Preview</a>
      <a href="{{ route('login') }}">Login</a>
    </nav>
  </header>

  <section class="hero">
    <h2>Compartilhe ideias. Conecte pessoas.</h2>
    <p>Crie posts, comente e interaja com uma comunidade ativa.</p>
    <a href="#" class="btn">Começar agora</a>
  </section>

  <section id="features" class="features">
    <div class="card">
      <h3>📝 Criar Posts</h3>
      <p>Publique conteúdos de forma simples e rápida.</p>
    </div>
    <div class="card">
      <h3>💬 Comentários</h3>
      <p>Interaja com outros usuários através de comentários.</p>
    </div>
    <div class="card">
      <h3>❤️ Curtidas</h3>
      <p>Mostre o que você gostou com um clique.</p>
    </div>
    <div class="card">
      <h3>🔔 Notificações</h3>
      <p>Receba atualizações em tempo real.</p>
    </div>
  </section>

  <section id="preview" class="preview">
    <h2 style="text-align:center;">Veja como funciona</h2>

    <div class="post">
      <h3>João Silva</h3>
      <p>Acabei de publicar meu primeiro post aqui! 🚀</p>

      <div class="comment">
        Maria: Parabéns! Ficou ótimo 👏
      </div>
      <div class="comment">
        Carlos: Bem-vindo à comunidade!
      </div>
    </div>

    <div class="post">
      <h3>Ana Souza</h3>
      <p>Alguém recomenda livros sobre programação?</p>

      <div class="comment">
        Pedro: Recomendo "Clean Code"!
      </div>
    </div>
  </section>

  <footer>
    <p>© 2026 PostHub - Todos os direitos reservados</p>
  </footer>

</body>
</html>
