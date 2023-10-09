@extends('admin.layouts.main')

@section('title')
  <title>Data Siswa</title>
@endsection

@section('content')

  @if(session('errors'))
    @foreach(session('errors')->all() as $key => $message)
      <x-alert.failed :$message :$key/>
    @endforeach
  @endif

  @if(session('failed'))
    <livewire:alert.failed :message="session('failed')"/>
  @endif

  @if(session('success'))
    <x-alert.success :message=" session('success') "/>
  @endif

  {{-- Add User Modal --}}
  <x-form.add-student-modal :$dudis :$supervisors/>

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
      @foreach($students as $key => $student)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4">{{ $student->name }}</th>
          <th scope="row" class="px-6 py-4">{{ $student->nis }}</th>
          <td class="px-6 py-4">{{ $student->class }}</td>
          <td class="px-6 py-4">{{ $student->dudi->name }}</td>
          <td class="px-6 py-4">{{ $student->supervisor->name }}</td>
          <td class="px-6 py-4 flex gap-2">
            <button id="updateModal-{{ $key }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    data-modal-target="update-modal"
                    data-modal-toggle="update-modal"
                    data-modal-id="{{ $student->id }}"
                    data-modal-name="{{ $student->name }}"
                    data-modal-nis="{{ $student->nis }}"
                    data-modal-class="{{ $student->class }}"
                    data-modal-dudi="{{ $student->dudi->id }}"
                    data-modal-supervisor="{{ $student->supervisor->id }}">Edit
            </button>
            <span>|</span>
            <form action="{{ route('admin.students') }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $student->id }}">
              <button type="submit" onclick="return window.confirm('apakah anda yakin ingin menghapus?')"
                      class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus
              </button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    {{--  Form Modal  --}}
    <x-form.update-student-modal :$dudis :$supervisors id="waw"/>

    {{-- JS --}}
    <x-script.student-script/>

  </div>
@endsection
