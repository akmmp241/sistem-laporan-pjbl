@extends('admin.layouts.main')

@section('title')
  <title>Pembimbing</title>
@endsection

@section('content')

  @if(session('success'))
    <x-alert.success/>
  @endif
  @if($errors->any())
    @foreach($errors->all() as $error)
        <x-alert.failed :message="$error"/>
    @endforeach
  @endif

  <x-form.add-supervisor-modal/>

  {{-- Table --}}
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">Nama</th>
        <th scope="col" class="px-6 py-3">NIP (username)</th>
        <th scope="col" class="px-6 py-3">Daftar siswa</th>
        <th scope="col" class="px-6 py-3">Aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach($supervisors as $key => $supervisor)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4">{{ $supervisor->name }}</th>
          <th scope="row" class="px-6 py-4">{{ $supervisor->NIP }}</th>
          <td scope="row" class="px-6 py-4">Lihat</td>
          <td class="px-6 py-4 flex gap-2">
            <button id="updateModal-{{ $key }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    data-modal-target="update-modal"
                    data-modal-toggle="update-modal"
                    data-modal-id="{{ $supervisor->id }}"
                    data-modal-nip="{{ $supervisor->NIP }}"
                    data-modal-name="{{ $supervisor->name }}">Edit
            </button>
            <span>|</span>
            <form action="{{ route('admin.supervisors') }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $supervisor->id }}">
              <button type="submit" onclick="return window.confirm('apakah anda yakin ingin menghapus?')"
                      class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus
              </button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    {{-- Update Supervisor Modal--}}
    <x-form.update-supervisor-modal/>

    {{-- JS --}}
    <x-script.supervisor-script/>
  </div>
@endsection
