<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <div class="flex flex-col gap-0.5">
          <h3 id="name" class="text-title-lg font-semibold text-gray-900 dark:text-white"></h3>
          <span id="class" class="block text-title-sm"></span>
          <span id="date" class="block"></span>
        </div>
        <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="defaultModal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-6 space-y-6">
        <div class="flex items-center gap-3">
          <span id="dudi" class="text-lg"></span>
          <span id="type" class="text-base bg-blue-300 py-1.5 px-5 rounded-2xl"></span>
        </div>
        <p id="detail" class="text-base leading-relaxed text-gray-500 dark:text-gray-400"></p>
        <img id="image">
      </div>
    </div>
  </div>
</div>
