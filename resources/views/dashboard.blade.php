<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
</head>

<body>
  <center>
    <h1>Halo, {{ auth()->user()->name }}</h1>

    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit">Keluar</button>
    </form>
  </center>
</body>

</html>
