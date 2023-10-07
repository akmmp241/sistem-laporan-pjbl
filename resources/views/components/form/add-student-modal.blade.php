<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button"
              class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
              data-modal-hide="authentication-modal">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah siswa</h3>
        <form class="space-y-6" action="{{ route('admin.students') }}" method="POST">
          @csrf
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" name="name" id="name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                   placeholder="Masukan nama siswa" required>
          </div>
          <div>
            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
            <input type="text" name="nis" id="nis" placeholder="masukan NIS"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                   required>
          </div>
          <div>
            <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
            <input type="text" name="class" id="class" placeholder="masukan kelas"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                   required>
          </div>
          <div>
            <label for="dudi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DUDI</label>
            <select id="dudi" name="dudi"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
              <option selected>Pilih DUDI</option>
              @foreach($dudis as $dudi)
                <option value="{{ $dudi->id }}">{{ $dudi->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label for="supervisor"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembimbing</label>
            <select id="supervisor" name="supervisor"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
              <option selected>Pilih Pembimbing</option>
              @foreach($supervisors as $supervisor)
                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit"
                  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
