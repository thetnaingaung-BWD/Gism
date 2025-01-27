{{-- Start Gallery-welcome page --}}
<div id="gallery-1"  class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_gallery_welcome')}}" class="lg:w-[800px] h-[650px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <button type="reset"  onclick="toggleModal('gallery-1')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->
        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                @if(isset($galleryWelcome))
                  <img class="object-contain  h-60 w-96 m-auto" src= "{{ asset('storage/asset/gallery/'.$galleryWelcome->img_path) }}">
                @else   
                  <img src="{{asset('assets/Gallery/bb21e7_e802ac35a1d341eea4ca693b0e4ffdfc~mv2.webp')}}">
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
                        Upload photo
                    </label>
                    <input type="file" id="fileInput-1" name="gallery_welcome" class="hidden" onchange="imageUpload(event,'gallery-1')"/>
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
{{-- End Gallery-welcome page --}}

{{-- Start Campus life Gallery --}}
<div id="gallery-2"  class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_campus_life')}}" class="lg:w-[800px] h-[650px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <h3 class="text-lg font-semibold">Edit Campus life Gallery</h3>
            <button type="reset" data-dismiss="gallery-2" onclick="toggleModal('gallery-2')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->

        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                    @if (session()->has('gallery-campus'))
                        @foreach ( session('gallery-campus') as $item)
                            <div>
                                <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src= "{{ Storage::url('tmp/gallery/'.$item) }}">
                            </div>
                        @endforeach
                    @endif
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
                    Upload photo
                </label>
                <input type="file" id="fileInput-2" name="gallery_campus[]" class="hidden" onchange="imageUpload(event,'gallery-2')" multiple/>

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
{{-- End Campus life Gallery --}}
{{-- Start Activity Gallery --}}
<div id="gallery-3"  class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_activity')}}" class="lg:w-[800px] h-[650px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <button type="reset" data-dismiss="gallery-2" onclick="toggleModal('gallery-3')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->

        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                {{-- <img class="object-contain  h-60 w-96 m-auto" src= "{{ asset('assets/Home/bb21e7_185db25cb6b44f4bbbf1cf109e234b62~mv2.webp')}}"> --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                        @if (session()->has('gallery-activity'))
                            @foreach ( session('gallery-activity') as $item)
                                <div>
                                    <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src= "{{ Storage::url('tmp/gallery/'.$item) }}">
                                </div>
                            @endforeach
                        @else
                            <div>
                                <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src= "{{ asset('assets/Gallery/CampusLife/girls.jpg') }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Upload Background Image *</label>
           <div class="grow">
                <div class="flex items-center gap-x-2">
                <label type="button" for="fileInput-3" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-file-upload-trigger="">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" x2="12" y1="3" y2="15"></line>
                    </svg>
                    Upload photo
                </label>
                <input type="file" id="fileInput-3" name="gallery_activity[]" class="hidden" onchange="imageUpload(event,'gallery-3')" multiple/>

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
{{-- End Activity Gallery --}}
