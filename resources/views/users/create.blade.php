<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Criar user</h1>

    <form action="{{ route('users.store') }}" method="post">
        @csrf()
        <label for="">Nome</label>
        <input type="text" name="name" id="name">
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
