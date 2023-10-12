@extends('student.layout.main')

@section('title')
  <title>Profil</title>
@endsection

@section('content')
  <div class="mx-5 font-jakarta">
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
      <h1 class="text-xl font-bold font-jakarta text-primary mt-[42px] mx-6">Profil</h1>
    </div>
    <div>
      <img src="{{ asset('/images/user/ava.png') }}" alt="" class="flex justify-center items-center mx-auto mt-6">
      <h1
        class="text-primary text-2xl font-bold flex justify-center items-center mx-auto text-center mt-6">{{ $student->name }}</h1>
    </div>

    <div class="dropdown-btn my-2">
      <div id="accordion-collapse" data-accordion="collapse"
           class="flex flex-col gap-4 py-1 px-3 text-primary font-jakarta mt-3">
        <div class="flex flex-col">
          <h2 id="accordion-collapse-heading-1">
            <button type="button"
                    class="flex items-center justify-between w-full p-2 font-medium bg-indigo-100 text-left text-gray-500 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-800 dark:border-indigo-700 dark:text-gray-400 hover:bg-indigo-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-1"
                    aria-expanded="true"
                    aria-controls="accordion-collapse-body-1">
              <span class="text-primary font-bold">Kelas</span>
              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5 5 1 1 5"/>
              </svg>
            </button>
          </h2>
          <div id="accordion-collapse-body-1" class="hidden bg-indigo-50"
               aria-labelledby="accordion-collapse-heading-1">
            <div
              class="flex justify-between py-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                  <span
                    class="text-primary text-sm font-medium mr-2 px-2 py-0.5 rounded">{{ $student->class }}</span>
              <p class="text-primary dark:text-gray-400"></p>
            </div>
          </div>
        </div>
        <div class="flex flex-col">
          <h2 id="accordion-collapse-heading-2">
            <button type="button"
                    class="flex items-center justify-between w-full p-2 font-medium bg-indigo-100 text-left text-gray-500 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-800 dark:border-indigo-700 dark:text-gray-400 hover:bg-indigo-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-2"
                    aria-expanded="true"
                    aria-controls="accordion-collapse-body-2">
              <span class="text-primary font-bold">NIS (username)</span>
              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5 5 1 1 5"/>
              </svg>
            </button>
          </h2>
          <div id="accordion-collapse-body-2" class="hidden bg-indigo-50"
               aria-labelledby="accordion-collapse-heading-2">
            <div
              class="flex justify-between py-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                  <span
                    class="text-primary text-sm font-medium mr-2 px-2 py-0.5 rounded">{{ $student->nis }}</span>
              <p class="text-primary dark:text-gray-400"></p>
            </div>
          </div>
        </div>
        <div class="flex flex-col">
          <h2 id="accordion-collapse-heading-3">
            <button type="button"
                    class="flex items-center justify-between w-full p-2 font-medium bg-indigo-100 text-left text-gray-500 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-800 dark:border-indigo-700 dark:text-gray-400 hover:bg-indigo-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-3"
                    aria-expanded="true"
                    aria-controls="accordion-collapse-body-3">
              <span class="text-primary font-bold">DUDI</span>
              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5 5 1 1 5"/>
              </svg>
            </button>
          </h2>
          <div id="accordion-collapse-body-3" class="hidden bg-indigo-50"
               aria-labelledby="accordion-collapse-heading">
            <div
              class="flex justify-between py-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                  <span
                    class="text-primary text-sm font-medium mr-2 px-2 py-0.5 rounded">{{ $student->dudi->name }}</span>
              <p class="text-primary dark:text-gray-400"></p>
            </div>
          </div>
        </div>
        <div class="flex flex-col">
          <h2 id="accordion-collapse-heading-4">
            <button type="button"
                    class="flex items-center justify-between w-full p-2 font-medium bg-indigo-100 text-left text-gray-500 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-800 dark:border-indigo-700 dark:text-gray-400 hover:bg-indigo-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-4"
                    aria-expanded="true"
                    aria-controls="accordion-collapse-body-4">
              <span class="text-primary font-bold">Pembimbing</span>
              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5 5 1 1 5"/>
              </svg>
            </button>
          </h2>
          <div id="accordion-collapse-body-4" class="hidden bg-indigo-50"
               aria-labelledby="accordion-collapse-heading-4">
            <div
              class="flex justify-between py-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                  <span
                    class="text-primary text-sm font-medium mr-2 px-2 py-0.5 rounded">{{ $student->supervisor->name }}</span>
              <p class="text-primary dark:text-gray-400"></p>
            </div>
          </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="w-full">
          @method('DELETE')
          @csrf
          <button type="submit"
                  class="text-center text-white text-sm font-medium bg-red-700 hover:bg-red-800 rounded-lg px-5 py-2 mr-2 my-2">
            Logout
          </button>
        </form>
      </div>
    </div>


    <!-- Detail -->
    {{--    <div class="flex justify-between items-center bg-indigo-100 rounded-t-lg py-1 px-3 text-primary font-jakarta mt-6">--}}
    {{--      <a href="">--}}
    {{--        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
    {{--          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />--}}
    {{--        </svg>--}}
    {{--      </a>--}}
    {{--      <h1 class="text-base font-medium">Kelas</h1>--}}
    {{--    </div>--}}

    {{--    <div class="items-center bg-indigo-50 rounded-b-lg py-1 px-3 text-primary font-jakarta">--}}
    {{--      <h1>XI PPLG 1</h1>--}}
    {{--    </div>--}}
    {{--    <div class="flex justify-between items-center bg-indigo-100 rounded-t-lg py-1 px-3 text-primary font-jakarta mt-6">--}}
    {{--      <h1 class="text-base font-medium">NIS</h1>--}}
    {{--      <a href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
    {{--          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />--}}
    {{--        </svg>--}}
    {{--      </a>--}}
    {{--      </svg>--}}
    {{--    </div>--}}

    {{--    <div class="items-center bg-indigo-50 rounded-b-lg py-1 px-3 text-primary font-jakarta">--}}
    {{--      <h1>10504</h1>--}}
    {{--    </div>--}}
    {{--    <div class="flex justify-between items-center bg-indigo-100 rounded-t-lg py-1 px-3 text-primary font-jakarta mt-6">--}}
    {{--      <h1 class="text-base font-medium">DUDI</h1>--}}
    {{--      <a href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
    {{--          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />--}}
    {{--        </svg>--}}
    {{--      </a>--}}
    {{--      </svg>--}}
    {{--    </div>--}}
    {{--    <div class="items-center bg-indigo-50 rounded-b-lg py-1 px-3 text-primary font-jakarta">--}}
    {{--      <h1>VRAS MEDIA</h1>--}}
    {{--    </div>--}}


  </div>
@endsection
