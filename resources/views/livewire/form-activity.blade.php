<form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data" class="flex flex-col font-jakarta">
  @method('POST')
  @csrf
  <div class="mt-11 my-3">
    <label for="detail"
           class="block mb-2 text-base font-medium text-primary">@if(url()->current() === route('student.checkin'))
        Apa rencanamu hari ini
      @else
        Kegiatanmu
      @endif</label>
    <textarea id="detail" rows="1" name="detail"
              class="block p-2.5 w-full text-sm text-gray-900 bg-indigo-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
              placeholder="@if(url()->current() === route('student.checkin')) Apa rencanamu hari ini @else Apa yang kamu kerjakan hari ini @endif"></textarea>
  </div>
  <div>
    <label for="date" class="block mb-2 text-base font-medium text-primary">Tanggal</label>
    <input type="date" id="date" name="date"
           class="bg-indigo-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           required>
  </div>
  <div class="my-3">
    <label for="dudi" class="block mb-2 text-base font-medium text-primary">DUDI</label>
    <select id="dudi" name="dudi"
            class="bg-indigo-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
      <option selected>Pilih dudi</option>
      @foreach($dudis as $dudi)
        <option value="{{ $dudi->id }}">{{ $dudi->name }}</option>
      @endforeach
    </select>
  </div>
  <div>
    <label for="image" class="text-base font-medium text-primary">Upload Foto</label>
    <p class="text-sm font-medium text-primary">Ukuran maksimal file adalah 1 Mb. File yang didukung adalah .jpg dan
      .png</p>
    <input type="file" name="image" placeholder="Apa rencanamu hari ini"
           class="bg-indigo-100 text-sm text-indigo-300 my-1 py-3 px-4 rounded-lg w-full">
  </div>
  @if(session('errors'))
    <div class="my-3">
      @foreach(session('errors')->all() as $message)
        <p class="text-sm font-medium text-red-600">{{ $message }}</p>
      @endforeach
    </div>
  @endif
  @if(session('failed'))
    <p class="text-sm font-medium text-red-600">{{ session('failed') }}</p>
  @endif
  <button type="submit"
          class="text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 my-12 text-center w-full font-jakarta">
    Submit
  </button>
</form>
