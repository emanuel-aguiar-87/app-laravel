<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors)
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route(name: 'authenticate') }}" method="post">
        @csrf()
        <label for="">Email</label>
        <input type="email" name="email" id="email">
        <label for="">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>
</body>
</html>
