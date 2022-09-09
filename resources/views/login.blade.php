<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Masuk</title>
</head>

<body>
  <center>
    <h1>Silahkan Masuk</h1>

    @error('auth_failed')
      <p style="color: red">{{ $message }}</p>
    @enderror

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <label for="username">Username</label>
      <input type="text" name="username" id="username" value="{{ old('username') }}">
      @error('username')
        <br>
        <span style="color: red">{{ $message }}</span>
      @enderror

      <br>

      <label for="password">Password</label>
      <input type="password" name="password" id="password">
      @error('password')
        <br>
        <span style="color: red">{{ $message }}</span>
      @enderror

      <br>

      <button type="submit">Masuk</button>
    </form>
  </center>
</body>

</html>
