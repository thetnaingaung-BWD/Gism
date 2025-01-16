<!-- Modal-welcome -->
<div id="modal-1" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_home_welcome')}}" class="lg:w-[72rem] h-[650px] sm:w-[800px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <button type="reset" onclick="toggleModal('modal-1')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>

        <!-- Upload Image -->

        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                <img class="object-contain  h-60 w-96 m-auto" src= "{{ session()->has('welcome-media') ? Storage::url('tmp/home/'.session('welcome-media')['welcome_bg_img']) :  asset('storage/asset/home/'.$homeMedia[0]['img_path']) }}">
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
                <input type="file" id="fileInput-1" name="welcome_bg_img" class="hidden" onchange="imageUpload(event,'modal-1')"/>

                </div>
            </div>
        </div>
        <!-- School Name -->
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">School Name (En) </label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 @error('en') border-red-500 @enderror"
                  placeholder="School Name (En)"
                  value="{{ session()->has('welcome-content') ? session('welcome-content')['school_name']['en'] : translate('school_name','en') }}"
                  name="school_name[en]"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">School Name (th)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="School Name (th)"
                  value="{{ session()->has('welcome-content') ? session('welcome-content')['school_name']['th'] : translate('school_name','th') }}"
                  name="school_name[th]"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">School Name (zh)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="School Name (zh)"
                  value="{{ session()->has('welcome-content') ? session('welcome-content')['school_name']['zh'] : translate('school_name','zh') }}"
                  name="school_name[zh]"
                  required
                >
              </div>
            </div>
        </div>
        <!-- about_school -->
        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">about_school (En)</label>
            <textarea name="about_school[en]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="About of school..." required>{{ session()->has('welcome-content') ? session('welcome-content')['about_school']['en'] :  translate('about_school','en')}}</textarea>
            </div>
            <div class="mb-4 mx-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">about_school (Th)</label>
            <textarea name="about_school[th]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="About of school..." required>{{ session()->has('welcome-content') ? session('welcome-content')['about_school']['th'] :  translate('about_school','th')}}</textarea>
            </div>
            <div class="mb-4 mx-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">about_school (Zh)</label>
            <textarea name="about_school[zh]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="About of school..." required>{{ session()->has('welcome-content') ? session('welcome-content')['about_school']['zh'] :  translate('about_school','zh')}}</textarea>
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
{{-- End Modal-welcome --}}

<!-- Modal-President -->
<div id="modal-2" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_president')}}" class="lg:w-[72rem] h-[650px] sm:w-[800px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <h3 class="text-lg font-semibold">President Speech Section</h3>
            <button type="reset" onclick="toggleModal('modal-2')" aria-label="Close" class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
         <!-- Upload Image -->
        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                <img class="object-contain  h-60 w-96 m-auto" src=" {{ session()->has('president-media') ? Storage::url('tmp/home/'.session('president-media')['president_photo']) :  asset('storage/asset/home/'.$homeMedia[1]['img_path'])}}" >
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
                    <input id="fileInput-2" type="file" class="hidden" name='president_photo' onchange="imageUpload(event,'modal-2')"/>
                    Upload President photo
                </label>
                </div>
            </div>
        </div>
        <!-- about -->
        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">About (En)</label>
            <textarea name="about[en]" id="Opening-speech" cols="20" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="About(En)" required>{{ session()->has('president-content') ? session('president-content')['about']['en'] : translate('about','en')}}</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">About (Th)</label>
              <textarea name="about[th]" id="Opening-speech" cols="20" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="About(Th)" required>{{ session()->has('president-content') ? session('president-content')['about']['th'] : translate('about','th')}}</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">About (Zh)</label>
              <textarea name="about[zh]" id="Opening-speech" cols="20" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="About(Zh)" required>{{ session()->has('president-content') ? session('president-content')['about']['zh'] : translate('about','zh')}}</textarea>
            </div>
        </div>
        <!-- President Name -->
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">President Name (En) </label>
                <input
                value="{{ session()->has('president-content') ? session('president-content')['president_name']['en'] : translate('president_name','en')}}"
                name="president_name[en]"
                type="text"
                class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                placeholder="President Name (En)"
                required
                >
            </div>
            <div class="my-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">President Name (Th) </label>
                <input
                  value="{{ session()->has('president-content') ? session('president-content')['president_name']['th'] : translate('president_name','th')}}"
                  name="president_name[th]"
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="President Name (Th)"
                  required
                >
            </div>
            <div class="my-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">President Name (Zh) </label>
                <input
                  value="{{ session()->has('president-content') ? session('president-content')['president_name']['zh'] : translate('president_name','zh')}}"
                  name="president_name[zh]"
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="President Name (Zh)"
                  required
                >
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
{{-- End Modal-President --}}

{{-- Vision & Mission Modal --}}
<div id="modal-3" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_vision_and_mission')}}" class="lg:w-[800px] h-[650px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <h3 class="text-lg font-semibold">Edit Vision & Mission Section</h3>
            <button type="reset" onclick="toggleModal('modal-3');clearText(2)" aria-label="Close" class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->
        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                <img class="object-contain  h-60 w-96 m-auto" src="{{ session()->has('vision-mission-media') ? Storage::url('tmp/home/'.session('vision-mission-media')['vision_mission_bg']) :  asset('storage/asset/home/'.$homeMedia[2]['img_path']) }}">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
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
                    <input id="fileInput-3" type="file" name="vision_mission_bg" class="hidden" onchange="imageUpload(event,'modal-3')"/>
                    Upload photo
                </label>
                </div>
            </div>
        </div>

        <!-- vision_context -->

        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 my-2">Vision Context (En)</label>
                <textarea name="vision_context[en]" cols="10" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Vision Context ()..." required>{{ session()->has('vision-mission-content') ? session('vision-mission-content')['vision_context']['en'] :  translate('vision_context','en')}}</textarea>
            </div>
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 my-2">Vision Context (Th)</label>
                <textarea name="vision_context[th]" cols="10" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Vision Context ()..." required>{{ session()->has('vision-mission-content') ? session('vision-mission-content')['vision_context']['th'] :  translate('vision_context','th')}}</textarea>
            </div>
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 my-2">Vision Context (Zh)</label>
                <textarea name="vision_context[zh]" cols="10" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Vision Context ()..." required>{{ session()->has('vision-mission-content') ? session('vision-mission-content')['vision_context']['zh'] :  translate('vision_context','zh')}}</textarea>
            </div>
        </div>

        <!-- mission_context -->

        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Mission Context (En)</label>
                <textarea name="mission_context[en]" id="" cols="10" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Mission Context ()..." required>{{ session()->has('mission-mission-content') ? session('mission-mission-content')['mission_context']['en'] : translate('mission_context','en')}}</textarea>
            </div>
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Mission Context (Th)</label>
                <textarea name="mission_context[th]" id="" cols="10" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Mission Context ()..." required>{{ session()->has('mission-mission-content') ? session('mission-mission-content')['mission_context']['th'] : translate('mission_context','th')}}</textarea>
            </div>
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Mission Context (Zh)</label>
                <textarea name="mission_context[zh]" id="" cols="10" rows="5" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Mission Context ()..." required>{{ session()->has('mission-mission-content') ? session('mission-mission-content')['mission_context']['zh'] : translate('mission_context','zh')}}</textarea>
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
{{-- End Vision & Mission Modal --}}

{{-- Start Contact Information --}}
<div id="modal-4"  class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_contact_info')}}" class="lg:w-[800px] h-[650px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <button type="reset" onclick="toggleModal('modal-4')" aria-label="Close" class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Campus Address -->
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Campus Address (En)</label>
                <input
                    value="{{ session()->has('contact-info') ? session('contact-info')['campus_address']['en'] :  translate('address','en') }}"
                    name="campus_address[en]"
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Campus Address (En)"
                    required>
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Campus Address (Th)</label>
                <input
                    value="{{ session()->has('contact-info') ? session('contact-info')['campus_address']['th'] :  translate('address','th') }}"
                    name="campus_address[th]"
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Campus Address (Th)"
                    required>
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Campus Address (Zh)</label>
                <input
                    value="{{ session()->has('contact-info') ? session('contact-info')['campus_address']['zh'] :  translate('address','zh') }}"
                    name="campus_address[zh]"
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Campus Address (Zh)"
                    required>
              </div>
            </div>
        </div>

        <!-- Phone Myanmar -->
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Myanmar (En)</label>
                <input
                  value="{{ session()->has('contact-info') ? session('contact-info')['phone_myanmar']['en'] :  translate('phone_myanmar','en') }}"
                  name="phone_myanmar[en]"
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Phone Myanmar (En)"
                  required
                >
              </div>

            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Myanmar (Th)</label>
                <input
                  value="{{ session()->has('contact-info') ? session('contact-info')['phone_myanmar']['th'] :  translate('phone_myanmar','th') }}"
                  name="phone_myanmar[th]"
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Phone Myanmar (Th)"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Myanmar (Zh)</label>
                <input
                  value="{{ session()->has('contact-info') ? session('contact-info')['phone_myanmar']['zh'] :  translate('phone_myanmar','zh') }}"
                  name="phone_myanmar[zh]"
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Phone Myanmar (Zh)"
                  required
                >
              </div>

            </div>
        </div>

        {{-- Phone Thailand --}}
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Thailand (En)</label>
                <input
                    value="{{ session()->has('contact-info') ? session('contact-info')['phone_thailand']['en'] :  translate('phone_thailand','en') }}"
                    name="phone_thailand[en]"
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Phone Thailand (En)"
                    required
                >
              </div>

            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Thailand (Th)</label>
                <input
                    value="{{ session()->has('contact-info') ? session('contact-info')['phone_thailand']['th'] :  translate('phone_thailand','th') }}"
                    name="phone_thailand[th]"
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Phone Thailand (Th)"
                    required
                >
              </div>

            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Thailand (Zh)</label>
                <input
                    value="{{ session()->has('contact-info') ? session('contact-info')['phone_thailand']['zh'] :  translate('phone_thailand','zh') }}"
                    name="phone_thailand[zh]"
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Phone Thailand (Zh)"
                    required
                >
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
{{-- End Contact Information --}}





