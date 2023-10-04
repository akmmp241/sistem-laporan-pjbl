<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity</title>
    @livewireStyles
</head>
<body>
    <h1>{{ $type }}</h1>

    @if(session()->has('errors'))
        <p>{{ $errors }}</p>
    @endif

    <livewire:form-activity :type="$type" />

    @livewireScripts
</body>
</html>
