<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>

<h1>Profil</h1>

<ul>
    <li>Nama: {{ $student->name }}</li>
    <li>Kelas: {{ $student->class }}</li>
    <li>NIS (username): {{ $student->nis }}</li>
    <li>DUDI: {{ $student->dudi->name }}</li>
    <li>Pembimbing: {{ $student->supervisor->name }}</li>
</ul>

</body>
</html>
