<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>

<body>
    <h1>Login</h1>
    @if (session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="username">Username:</label><br>
        <input type="text" name="username"><br>
        @error('username')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="password">Password:</label><br>
        <input type="password" name="password"><br>
        @error('password')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <button type="submit">Login</button>
    </form>
</body>

</html>
