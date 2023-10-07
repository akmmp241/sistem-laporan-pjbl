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

    @if(session()->has('message'))
        <p>{{ session('message') }}</p>
    @endif

    <a href="{{ route('student.checkin') }}">Masuk</a>
    <br>
    <a href="{{ route('student.checkout') }}">Keluar</a>
    <br>
    <a href="{{ route('student.profile') }}">Profil</a>
    <br>
    <a href="{{ route('logout') }}">Logout</a>

    <h2>Aktivitas terkini</h2>
    <a href="{{ route('student.reports') }}">log absensi</a>

    @foreach($activities as $activity)
        <p>{{ $activity->date }}</p>
    @endforeach
</body>
</html>
