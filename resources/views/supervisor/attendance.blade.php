<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @livewireStyles
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<h1 class="text-3xl">Kehadiran siswa</h1>

<br>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
      <th scope="col" class="px-6 py-3">Nama</th>
      <th scope="col" class="px-6 py-3">Kelas</th>
      <th scope="col" class="px-6 py-3">Dudi</th>
      <th scope="col" class="px-6 py-3">Tanggal</th>
      <th scope="col" class="px-6 py-3">Keterangan</th>
      <th scope="col" class="px-6 py-3">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $key => $task)
      <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <td class="px-6 py-4">{{ $task->student->name }} ({{ $task->student->nis }})</td>
        <td class="px-6 py-4">{{ $task->student->class }}</td>
        <td class="px-6 py-4">{{ $task->student->dudi->name }}</td>
        <td class="px-6 py-4">{{ date_create($task->date)->format('d-m-Y | H:i:s') }}</td>
        <td class="px-6 py-4">{{ $task->report->type }}</td>
        <td id="modalToggle-{{ $key }}"
            data-modal-target="defaultModal"
            data-modal-toggle="defaultModal"
            data-modal-name="{{ $task->student->name }} ({{ $task->student->nis }})"
            data-modal-class="{{ $task->student->class }}"
            data-modal-dudi="{{ $task->student->dudi->name }}"
            data-modal-type="{{ $task->report->type }}"
            data-modal-time="{{ date_create($task->date)->format('d-m-Y | H:i:s') }}"
            data-modal-detail="{{ $task->detail }}"
            data-modal-image="{{ asset($task->image) }}"
            class="modalToggle cursor-pointer px-6 py-4 font-medium text-blue-600 dark:text-blue-500 hover:underline">
          Lihat detail
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

<livewire:studen-modal/>

<script>
  const name = document.querySelector('#name');
  const Class = document.querySelector('#class');
  const date = document.querySelector('#date');
  const dudi = document.querySelector('#dudi');
  const type = document.querySelector('#type');
  const detail = document.querySelector('#detail');
  const image = document.querySelector('#image');

  // window.onclick = e => {
  //   const toggleModal = document.querySelector('#' + e.target.id);
  //
  //   name.innerHTML = toggleModal.getAttribute('data-modal-name');
  //   Class.innerHTML = toggleModal.getAttribute('data-modal-class');
  //   date.innerHTML = toggleModal.getAttribute('data-modal-time');
  //   dudi.innerHTML = toggleModal.getAttribute('data-modal-dudi');
  //   type.innerHTML = toggleModal.getAttribute('data-modal-type');
  //   detail.innerHTML = toggleModal.getAttribute('data-modal-detail');
  //   image.src = toggleModal.getAttribute('data-modal-image');
  // }

  window.onclick = (e) => {
    try {
      const toggleModal = document.querySelector('#' + e.target.id);

      name.innerHTML = toggleModal.getAttribute('data-modal-name');
      Class.innerHTML = toggleModal.getAttribute('data-modal-class');
      date.innerHTML = toggleModal.getAttribute('data-modal-time');
      dudi.innerHTML = toggleModal.getAttribute('data-modal-dudi');
      type.innerHTML = toggleModal.getAttribute('data-modal-type');
      detail.innerHTML = toggleModal.getAttribute('data-modal-detail');
      image.src = toggleModal.getAttribute('data-modal-image');
    } catch (exception) {

    }
  }
</script>

@livewireScripts
</body>
</html>
