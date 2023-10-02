<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h3>selamat datang,</h3>
    <h1>{{ $user->name }}</h1>

    <a href="{{ route('checkin') }}">Masuk</a>
    <br>
    <a href="{{ route('checkout') }}">Keluar</a>

    <h2>Aktivitas terkini</h2>
    <a href="">log absensi</a>

    @foreach($activities as $activity)
        <p>{{ $activity->date }}</p>
    @endforeach
</body>
</html>
