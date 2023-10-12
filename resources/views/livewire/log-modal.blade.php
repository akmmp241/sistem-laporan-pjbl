<div id="small-modal" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-[60] hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div
        class="flex items-center justify-between bg-gradient-to-r from-primary to-[#CD7BFF] p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="flex flex-col text-xl font-medium text-gray-900 dark:text-white">
          <span id="title" class="text-white capitalize"></span>
          <span class="text-base text-gray-200 -mb-3" id="time"></span>
        </h3>
        <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="small-modal">
          <svg class="w-3 h-3 text-gray-200 hover:text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
               fill="none"
               viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-6 space-y-6">
        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
          <span id="dudi" class="block text-lg border-b-2 mb-2"></span>
          <span id="detail"></span>
        </p>
        <img id="image" class="h-96 m-auto">
      </div>
    </div>
  </div>
</div>
