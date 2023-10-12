@extends('student.layout.main')

@section('title')
  <title>Home</title>
@endsection

@section('content')
  <div class="mx-5">
    <!-- Welcome -->
    <h3 class="text-gray-50 font-jakarta text-lg font-mediu">Selamat Datang,</h3>
    <h1 class="text-2xl font-bold font-jakarta text-gray-50">{{ $user->name }}</h1>
  </div>

  <!-- Button Masuk / Pulang -->
  <div id="content" class="max-h-fit bg-white mt-12 rounded-t-3xl">
    <div class="mx-5">
      <div
        class="relative top-5 bg-gradient-to-r from-primary to-[#CD7BFF] rounded-xl px-6 py-4 flex justify-between">
        <a class="bg-white px-9 py-3 rounded-lg btn-masuk" href="{{ route('student.checkin') }}">
          <span class="text-base font-bold font-jakarta text-primary">Masuk</span>
        </a>
        <a class="bg-white px-9 py-3 rounded-lg btn-keluar" href="{{ route('student.checkout') }}">
          <span class="text-base font-bold font-jakarta text-primary">Pulang</span>
        </a>
      </div>

      @if(session('success'))
        <div id="alert-3"
             class="relative top-10 flex items-center p-4 mb-4 text-indigo-50 rounded-lg bg-primary dark:bg-gray-800 dark:text-green-400"
             role="alert">
          <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
               fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
          <div class="ml-3 text-sm font-medium">{{ session('success') }}</div>
          <button type="button" data-dismiss-target="#alert-3" aria-label="Close"
                  class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
          </button>
        </div>
      @endif

      <!-- Current Activity -->
      <div class="flex justify-between mt-12">
        <h1 class="text-base font-bold font-jakarta text-primary ">Aktivitas terkini</h1>
      </div>
      <div class="dropdown-btn my-2">
        <div id="accordion-collapse" data-accordion="collapse"
             class="flex flex-col gap-4 py-1 px-3 text-primary font-jakarta mt-3">
          @foreach($activities as $key => $activity)
            <div class="flex flex-col">
              <h2 id="accordion-collapse-heading-{{ $key }}">
                <button type="button"
                        class="flex items-center justify-between w-full p-2 font-medium bg-indigo-100 text-left text-gray-500 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-800 dark:border-indigo-700 dark:text-gray-400 hover:bg-indigo-100 dark:hover:bg-gray-800"
                        data-accordion-target="#accordion-collapse-body-{{ $key }}"
                        aria-expanded="true"
                        aria-controls="accordion-collapse-body-{{ $key }}">
                  <span class="text-primary font-bold">{{ date_create($activity->date)->format('d M Y') }}</span>
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
                  <span
                    class="@if($activity->report->type === "masuk") bg-primary @else bg-red-500 @endif text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded">{{ $activity->report->type }}</span>
                  <p class="text-primary dark:text-gray-400">{{ date_create($activity->date)->format('H:i:s') }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
