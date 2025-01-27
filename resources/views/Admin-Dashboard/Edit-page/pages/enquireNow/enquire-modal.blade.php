{{-- Start Enquire-welcome page --}}
<div id="enquire-1" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_enquire_welcome')}}" class="lg:w-[500px] h-[550px] sm:w-[300px] bg-white p-6 rounded-lg shadow-md overflow-auto
          [&::-webkit-scrollbar]:w-2
          [&::-webkit-scrollbar-track]:rounded-full
          [&::-webkit-scrollbar-track]:bg-gray-100
          [&::-webkit-scrollbar-thumb]:rounded-full
          [&::-webkit-scrollbar-thumb]:bg-gray-300
          dark:[&::-webkit-scrollbar-track]:bg-neutral-700
          dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
          enctype="multipart/form-data">
          @csrf
        <!-- Header -->
        <div class="flex justify-between items-center border-b  pb-3">
            <h3 class="text-lg font-semibold">Edit Welcome Section</h3>
            <button type="reset" onclick="toggleModal('enquire-1')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->
        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                @if(isset($enquireMedia[0]))
                <img class="object-contain  h-60 w-96 m-auto" src="{{ session()->has('enquire_welcome') ? Storage::url('tmp/enquire/'.session('enquire_welcome')['enquire_bg_img']) :  asset('storage/asset/enquire/'.$enquireMedia[0]['img_path'])}}" >
                @else
                <img class="object-contain  h-60 w-96 m-auto" src="{{asset('assets/Enquire/hero_bg.webp')}}" >
                @endif
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                </div>
            </div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Upload Background Image *</label>
           <div class="grow">
                <div class="flex items-center gap-x-2">
                <label type="button" for="fileInput-1" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-file-upload-trigger="">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" x2="12" y1="3" y2="15"></line>
                    </svg>
                    <input  id="fileInput-1" type="file" class="hidden" name='enquire_bg_img' onchange="imageUpload(event,'enquire-1')"/>
                    Upload background photo
                </label>
                </div>
            </div>
        </div>
        <!-- Submit Button -->
        <div>
          <button
            type="submit"
            class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 transition">
            SUBMIT
          </button>
        </div>
      </form>
    </div>
</div>
<div id="enquire-2" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_enquire_form')}}" class="lg:w-[500px] h-[550px] sm:w-[300px] bg-white p-6 rounded-lg shadow-md overflow-auto
          [&::-webkit-scrollbar]:w-2
          [&::-webkit-scrollbar-track]:rounded-full
          [&::-webkit-scrollbar-track]:bg-gray-100
          [&::-webkit-scrollbar-thumb]:rounded-full
          [&::-webkit-scrollbar-thumb]:bg-gray-300
          dark:[&::-webkit-scrollbar-track]:bg-neutral-700
          dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
          enctype="multipart/form-data">
          @csrf
        <!-- Header -->
        <div class="flex justify-between items-center border-b  pb-3">
            <h3 class="text-lg font-semibold">Edit Welcome Section</h3>
            <button type="reset" onclick="toggleModal('enquire-2')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->
        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
            @if(isset($enquireMedia[1]))
                <img class="object-contain  h-60 w-96 m-auto" src="{{ session()->has('enquire_form') ? Storage::url('tmp/enquire/'.session('enquire_form')['enquire_form_img']) :  asset('storage/asset/enquire/'.$enquireMedia[1]['img_path'])}}" >
            @else
              <img class="object-contain  h-60 w-96 m-auto" src="{{asset('assets/Enquire/bb21e7_a33d0ea1148444e78468410a5caf65ee~mv2.webp')}}" >
            @endif
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                </div>
            </div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Upload Background Image *</label>
           <div class="grow">
                <div class="flex items-center gap-x-2">
                <label type="button" for="fileInput-2" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-file-upload-trigger="">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" x2="12" y1="3" y2="15"></line>
                    </svg>
                    <input id="fileInput-2" type="file" class="hidden" name='enquire_form_img' onchange="imageUpload(event,'enquire-2')"/>
                    Upload background photo
                </label>
                </div>
            </div>
        </div>
        <!-- Submit Button -->
        <div>
          <button
            type="submit"
            class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 transition">
            SUBMIT
          </button>
        </div>
      </form>
    </div>
</div>
{{-- End Enquire-welcome page --}}
