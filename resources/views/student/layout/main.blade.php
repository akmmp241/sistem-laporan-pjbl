<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  @yield('title')
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet"/>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<div class="bg-gray-50">
  <!-- Container Mobile -->
  <div
    class="full-container mx-auto max-w-sm h-screen overflow-y-scroll relative pt-8 @if(url()->current() === route('student.home'))
     bg-gradient-to-r from-primary to-[#CD7BFF] @else bg-white @endif">

    @yield('content')

    <!-- Nav -->

    <div
      class="fixed z-50 w-4/5 max-w-sm h-16 -translate-x-1/2 bg-indigo-100 border border-gray-200 rounded-full bottom-4 left-1/2">
      <div class="flex justify-evenly h-full mx-auto">
        <a href="{{ route('student.home') }}"
                class="@if(url()->current() === route('student.home')) text-primary @else text-gray-500 @endif inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 group">
          <svg
            class="w-5 h-5 mb-1 @if(url()->current() === route('student.home')) text-primary @else text-gray-500 @endif  group-hover:text-blue-600"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
          </svg>
          <span class="text-sm">Beranda</span>
        </a>
        <a href="{{ route('student.reports') }}"
                class="@if(url()->current() === route('student.reports')) text-primary @else text-gray-500 @endif inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 group">
          <svg
            class="w-5 h-5 mb-1 @if(url()->current() === route('student.reports')) text-primary @else text-gray-500 @endif"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z"/>
            <path
              d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z"/>
          </svg>
          <span class="text-sm">Log Absensi</span>
        </a>
        <a href="{{ route('student.profile') }}"
                class="@if(url()->current() === route('student.profile')) text-primary @else text-gray-500 @endif inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 group">
          <svg
            class="w-5 h-5 mb-1 @if(url()->current() === route('student.profile')) text-primary @else text-gray-500 @endif "
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
          </svg>
          <span class="text-sm">Profil</span>
        </a>
      </div>
    </div>

</body>
</html>
