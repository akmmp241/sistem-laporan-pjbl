@extends('admin.layouts.main')

@section('title')
  <title>Data Siswa</title>
@endsection

@section('content')

  @if(session('errors'))
    @foreach(session('errors')->all() as $key => $message)
      <x-alert.failed :$message :$key />
    @endforeach
  @endif

  @if(session('success'))
    <x-alert.success :message=" session('success') " />
  @endif

  <!-- Modal toggle -->
  <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
          class="block text-white mb-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs md:text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          type="button">
    Tambah Siswa
  </button>

  {{-- Add User Modal --}}
  <x-form.add-student-modal :$dudis :$supervisors />

  {{-- Table --}}
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">Nama</th>
        <th scope="col" class="px-6 py-3">NIS</th>
        <th scope="col" class="px-6 py-3">Kelas</th>
        <th scope="col" class="px-6 py-3">DUDI</th>
        <th scope="col" class="px-6 py-3">Pembimbing</th>
        <th scope="col" class="px-6 py-3">Aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach($students as $student)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4">{{ $student->name }}</th>
          <th scope="row" class="px-6 py-4">{{ $student->nis }}</th>
          <td class="px-6 py-4">{{ $student->class }}</td>
          <td class="px-6 py-4">{{ $student->dudi->name }}</td>
          <td class="px-6 py-4">{{ $student->supervisor->name }}</td>
          <td class="px-6 py-4 flex gap-2">
            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            <span>|</span>
            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
