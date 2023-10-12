{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Log Absensi</title>--}}
{{--    @livewireStyles--}}
{{--    @vite(['resources/css/app.css','resources/js/app.js'])--}}
{{--</head>--}}
{{--<body>--}}

{{--<h1>Log Absensi</h1>--}}

{{--@foreach($logs as $key => $log)--}}
{{--    <div>--}}
{{--        <h3>{{ date_create($log->date)->format('d M Y') }} - {{ $log->report->type }}</h3>--}}
{{--        <p>{{ date_create($log->date)->format('H:i:s')}}</p>--}}
{{--        <div id="modalToggle-{{ $key }}" class="cursor-pointer"--}}
{{--             data-modal-target="small-modal"--}}
{{--             data-modal-toggle="small-modal"--}}
{{--             data-modal-type="{{ $log->report->type }}"--}}
{{--             data-modal-time="{{ date_create($log->date)->format('H:i:s') }}"--}}
{{--             data-modal-detail="{{ $log->detail }}"--}}
{{--             data-modal-image="{{ asset($log->image) }}">--}}
{{--          lihat detail--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}

{{--<livewire:log-modal />--}}

{{--<script>--}}
{{--    const title = document.querySelector('#title');--}}
{{--    const time = document.querySelector('#time');--}}
{{--    const detail = document.querySelector('#detail');--}}
{{--    const image = document.querySelector('#image');--}}

{{--    window.onclick = e => {--}}
{{--      try {--}}
{{--        const toggleModal = document.querySelector('#' + e.target.id);--}}

{{--        title.innerHTML = toggleModal.getAttribute('data-modal-type');--}}
{{--        time.innerHTML = toggleModal.getAttribute('data-modal-time');--}}
{{--        detail.innerHTML = toggleModal.getAttribute('data-modal-detail');--}}
{{--        image.src = toggleModal.getAttribute('data-modal-image');--}}
{{--      } catch (exception) {--}}

{{--      }--}}
{{--    }--}}
{{--</script>--}}

{{--@livewireScripts--}}
{{--</body>--}}
{{--</html>--}}

@extends('student.layout.main')

@section('title')
  <title>Log Absensi</title>
@endsection

@section('content')
  <div class="mx-5">
    <!-- Button Back -->
    <div class="flex justify-items-start">
      <div class="bg-indigo-50 p-3 mt-8 rounded-md w-12">
        <a href="{{ route('student.home') }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
          </svg>
        </a>
      </div>
      <h1 class="text-xl font-bold font-jakarta text-primary mt-[42px] mx-6">Log Absensi</h1>
    </div>
    <div class="my-4 mb-24">
      <div class="dropdown-btn my-2">
        <div id="accordion-collapse" data-accordion="collapse"
             class="flex flex-col gap-4 py-1 px-3 text-primary font-jakarta mt-3">
          @foreach($logs as $key => $activity)
            <div class="flex flex-col">
              <h2 id="accordion-collapse-heading-{{ $key }}">
                <button type="button"
                        class="flex items-center justify-between w-full p-2 font-medium bg-indigo-100 text-left text-gray-500 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-800 dark:border-indigo-700 dark:text-gray-400 hover:bg-indigo-100 dark:hover:bg-gray-800"
                        data-accordion-target="#accordion-collapse-body-{{ $key }}"
                        aria-expanded="true"
                        aria-controls="accordion-collapse-body-{{ $key }}">
                  <div class="flex gap-4">
                    <span class="text-primary font-bold">{{ date_create($activity->date)->format('d M Y') }}</span>
                    <span
                      class="capitalize @if($activity->report->type === "masuk") bg-primary @else bg-red-500 @endif text-white text-xs font-medium mr-2 px-1.5 py-0.5 rounded">{{ $activity->report->type }}</span>
                  </div>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                       xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5 5 1 1 5"/>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-{{ $key }}" class="hidden bg-indigo-50"
                   aria-labelledby="accordion-collapse-heading-{{ $key }}">
                <div
                  class="flex justify-between p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                  <p class="text-primary dark:text-gray-400">{{ date_create($activity->date)->format('H:i:s') }}</p>
                  <div
                    id="modalToggle-{{ $key }}"
                    data-modal-target="small-modal"
                    data-modal-toggle="small-modal"
                    data-modal-dudi="{{ $activity->dudi->name }}"
                    data-modal-type="{{ $activity->report->type }}"
                    data-modal-time="{{ date_create($activity->date)->format('H:i:s') }}"
                    data-modal-detail="{{ $activity->detail }}"
                    data-modal-image="{{ asset($activity->image) }}"
                    class="btn-masuk bg-primary text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Lihat detail
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <livewire:log-modal />

    <script>
      const title = document.querySelector('#title');
      const time = document.querySelector('#time');
      const detail = document.querySelector('#detail');
      const image = document.querySelector('#image');
      const dudi = document.querySelector('#dudi');

      window.onclick = e => {
        try {
          const toggleModal = document.querySelector('#' + e.target.id);

          title.innerHTML = toggleModal.getAttribute('data-modal-type');
          time.innerHTML = toggleModal.getAttribute('data-modal-time');
          detail.innerHTML = toggleModal.getAttribute('data-modal-detail');
          image.src = toggleModal.getAttribute('data-modal-image');
          dudi.innerHTML = toggleModal.getAttribute('data-modal-dudi');
        } catch (exception) {

        }
      }
    </script>
@endsection
