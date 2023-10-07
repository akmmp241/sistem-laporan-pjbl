<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>

<h1>Login bang</h1>

<form method="post" action="{{ route('login') }}">
  @method('POST')
  @csrf

  @error('error')
  <p>{{ $message }}</p>
  @enderror

  <input type="text" autocomplete="off" name="username" id="username" placeholder="username">
  @error('username')
  <p>{{ $message }}</p>
  @enderror
  <br>
  <input type="password" autocomplete="off" name="password" id="password" placeholder="password">
  @error('password')
  <p>{{ $message }}</p>
  @enderror
  <button type="submit">Login bang</button>
</form>

</body>
</html>
