@extends('admin.layouts.main')

@section('title')
  <title>DUDI</title>
@endsection

@section('content')

  {{-- Success Alert --}}
  @if(session('success'))
    <x-alert.success/>
  @endif

  {{-- Failed Alert --}}
  @if($errors->any())
    @foreach($errors->all() as $error)
      <x-alert.failed :message="$error"/>
    @endforeach
  @endif

  {{-- Create Modal --}}
  <x-form.add-dudi-modal/>

  {{-- Table --}}
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">Nama</th>
        <th scope="col" class="px-6 py-3">No. Telp</th>
        <th scope="col" class="px-6 py-3">Alamar</th>
        <th scope="col" class="px-6 py-3">Jumlah siswa</th>
        <th scope="col" class="px-6 py-3">Aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach($dudis as $key => $dudi)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4">{{ $dudi->name }}</th>
          <th scope="row" class="px-6 py-4">0851</th>
          <td scope="row" class="px-6 py-4">Jl. </td>
          <td scope="row" class="px-6 py-4">{{ $dudi->students()->count() }}</td>
          <td class="px-6 py-4 flex gap-2">
            <button id="updateModal-{{ $key }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    data-modal-target="update-modal"
                    data-modal-toggle="update-modal"
                    data-modal-id="{{ $dudi->id }}"
                    data-modal-name="{{ $dudi->name }}">Edit
            </button>
            <span>|</span>
            <form action="{{ route('admin.dudis') }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $dudi->id }}">
              <button type="submit" onclick="return window.confirm('apakah anda yakin ingin menghapus?')"
                      class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus
              </button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    {{-- Update Modal--}}
    <x-form.update-dudi-modal/>

    {{-- JS --}}
    <x-script.dudi-script/>
  </div>
@endsection
