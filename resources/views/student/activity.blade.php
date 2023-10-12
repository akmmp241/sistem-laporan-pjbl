@extends('student.layout.main')

@section('title')
  <title>Aktivitas</title>
@endsection

@section('content')
  <div class="bg-gray-50">
    <!-- Container Mobile -->
    <div class="full-container bg-white mx-auto max-w-sm h-screen relative">
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
          <h1 class="text-xl capitalize font-bold font-jakarta text-primary mt-[42px] mx-6">{{ $type }}</h1>
        </div>

        {{-- Form --}}
        <livewire:form-activity :$type />

      </div>

    </div>
  </div>
@endsection
