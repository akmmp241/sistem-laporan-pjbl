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

  <!-- Modal toggle -->
  <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
          class="block text-white mb-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs md:text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          type="button">
    Tambah Siswa
  </button>

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
                    data-modal-id="{{ $student->user->id }}"
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

    <script>
      const getElement = (value) => {
        return document.querySelector('#' + value);
      }

      const id = getElement('id');
      const name = getElement('name');
      const nis = getElement('nis');
      const Class = getElement('class');
      const dudi = getElement('dudi');
      const supervisor = getElement('supervisor');

      window.onclick = e => {
        try {
          const toggleModal = document.querySelector('#' + e.target.id);

          if (toggleModal.id.split('-')[0] === 'updateModal') {
            id.value = toggleModal.getAttribute('data-modal-id');
            name.value = toggleModal.getAttribute('data-modal-name');
            nis.value = toggleModal.getAttribute('data-modal-nis');
            Class.value = toggleModal.getAttribute('data-modal-class');
            dudi.value = toggleModal.getAttribute('data-modal-dudi');
            supervisor.value = toggleModal.getAttribute('data-modal-supervisor');
          }
        } catch (e) {
        }
      }
    </script>

  </div>
@endsection
