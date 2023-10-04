<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log Absensi</title>
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<h1>Log Absensi</h1>

@foreach($logs as $log)
    <div id="modalToggle" style="cursor: pointer;"
         data-modal-target="small-modal"
         data-modal-toggle="small-modal"
         data-modal-type="{{ $log->type }}"
         data-modal-time="{{ date_create($log->date)->format('H:i:s') }}"
         data-modal-detail="{{ $log->task->detail }}"
         data-modal-image="{{ $log->task->image }}">
        <h3>{{ date_create($log->date)->format('d M Y') }} - {{ $log->type }}</h3>
        <p>{{ date_create($log->date)->format('H:i:s')}}</p>
    </div>
@endforeach

<livewire:log-modal />


<script>
    const modalToggle = document.querySelector('#modalToggle');
    const title = document.querySelector('#title');
    const time = document.querySelector('#time');
    const detail = document.querySelector('#detail');
    const image = document.querySelector('#image');

    title.innerHTML = modalToggle.getAttribute('data-modal-type');
    time.innerHTML = modalToggle.getAttribute('data-modal-time');
    detail.innerHTML = modalToggle.getAttribute('data-modal-detail');
    image.src = modalToggle.getAttribute('data-modal-image');
</script>

@livewireScripts
</body>
</html>
