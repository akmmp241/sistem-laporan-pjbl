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

@foreach($logs as $key => $log)
    <div>
        <h3>{{ date_create($log->date)->format('d M Y') }} - {{ $log->report->type }}</h3>
        <p>{{ date_create($log->date)->format('H:i:s')}}</p>
        <div id="modalToggle-{{ $key }}" class="cursor-pointer"
             data-modal-target="small-modal"
             data-modal-toggle="small-modal"
             data-modal-type="{{ $log->report->type }}"
             data-modal-time="{{ date_create($log->date)->format('H:i:s') }}"
             data-modal-detail="{{ $log->detail }}"
             data-modal-image="{{ asset($log->image) }}">
          lihat detail
        </div>
    </div>
@endforeach

<livewire:log-modal />

<script>
    const title = document.querySelector('#title');
    const time = document.querySelector('#time');
    const detail = document.querySelector('#detail');
    const image = document.querySelector('#image');

    window.onclick = e => {
      try {
        const toggleModal = document.querySelector('#' + e.target.id);

        title.innerHTML = toggleModal.getAttribute('data-modal-type');
        time.innerHTML = toggleModal.getAttribute('data-modal-time');
        detail.innerHTML = toggleModal.getAttribute('data-modal-detail');
        image.src = toggleModal.getAttribute('data-modal-image');
      } catch (exception) {

      }
    }
</script>

@livewireScripts
</body>
</html>
