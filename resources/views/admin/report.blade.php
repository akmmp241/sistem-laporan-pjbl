@extends('admin.layouts.main')

@section('title')
  <title>Laporan Siswa</title>
@endsection

@section('content')
  {{-- Table --}}
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">Nama</th>
        <th scope="col" class="px-6 py-3">Kelas</th>
        <th scope="col" class="px-6 py-3">Detail</th>
        <th scope="col" class="px-6 py-3">Keterangan</th>
        <th scope="col" class="px-6 py-3">Tanggal</th>
        <th scope="col" class="px-6 py-3">Pembimbing</th>
        <th scope="col" class="px-6 py-3">Gambar</th>
      </tr>
      </thead>
      <tbody>
      @foreach($tasks as $key => $task)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4">{{ $task->student->name }}</th>
          <td class="px-6 py-4">{{ $task->student->class }}</td>
          <td class="px-6 py-4">{{ $task->detail }}</td>
          <td class="px-6 py-4">{{ $task->report->type }}</td>
          <td class="px-6 py-4">{{ $task->date }}</td>
          <td class="px-6 py-4">{{ $task->student->supervisor->name }}</td>
          <td class="px-6 py-4 flex gap-2">
            <button id="updateModal-{{ $key }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    data-modal-target="update-modal"
                    data-modal-toggle="update-modal"
                    data-modal-image="{{ $task->image }}">Lihat
            </button>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
@endsection
