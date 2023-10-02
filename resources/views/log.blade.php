<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log Absensi</title>
</head>
<body>

    <h1>Log Absensi</h1>

    @foreach($logs as $log)
        <h3>{{ date_create($log->date)->format('d M Y') }} - {{ $log->type }}</h3>
        <p>{{ date_create($log->date)->format('H:i:s')}}</p>
    @endforeach

</body>
</html>
