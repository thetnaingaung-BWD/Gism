{{-- Start About-welcome page --}}
<div id="about-1" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_welcome')}}" class="lg:w-[500px] h-[550px] sm:w-[300px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <button type="reset" onclick="toggleModal('about-1')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->
        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                <img class="object-contain  h-60 w-96 m-auto" src="{{ session()->has('about-welcome-media') ? Storage::url('tmp/about/'.session('about-welcome-media')['about_bg_img']) :  asset('storage/asset/about/'.$aboutMedia[0]['img_path'])}}" >
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
                    <input id="fileInput-1" type="file" class="hidden" name='about_bg_img' onchange="imageUpload(event,'about-1')"/>
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
{{-- End About-welcome page --}}

{{-- Start Our History --}}
<div id="about-2" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_history')}}" class="lg:w-[800px] h-[650px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <h3 class="text-lg font-semibold">Edit Our History Section</h3>
            <button type="reset" onclick="toggleModal('about-2')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->
        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
                <img class="object-contain  h-60 w-96 m-auto" src=" {{ session()->has('about-our-history-media') ? Storage::url('/tmp/about/'.session('about-our-history-media')['our_history_img']) :  asset('storage/asset/about/'.$aboutMedia[1]['img_path'])}}" >
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
                    <input id="fileInput-2" type="file" class="hidden" name='our_history_img' onchange="imageUpload(event,'about-2')"/>
                    Upload President photo
                </label>
                </div>
            </div>
        </div>
        <!-- Our History -->
        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">Our history (En)</label>
              <textarea name="our_history_content[en]" id="" cols="5" rows="15" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Our History (En)..." required>{{ session()->has('our-history-content') ? session('our-history-content')['our_history_content']['en'] : translate('our_history_content','en') }}</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">Our history (Th)</label>
              <textarea name="our_history_content[th]" id="" cols="5" rows="15" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Our History (Th)..." required>{{ session()->has('our-history-content') ? session('our-history-content')['our_history_content']['th'] : translate('our_history_content','th') }}</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">Our history (Zh)</label>
              <textarea name="our_history_content[zh]" id="" cols="5" rows="15" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Our History (Zh)..." required>{{ session()->has('our-history-content') ? session('our-history-content')['our_history_content']['zh'] : translate('our_history_content','zh') }}</textarea>
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
{{-- End Our History --}}

{{-- Start About School --}}
    <div id="about-update" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
        <div class="flex justify-center items-center">
          <form method="post" action="{{route('edit_about_school')}}" class="lg:w-[78rem] h-[550px] sm:w-[800px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
                <h3 class="text-lg font-semibold">Edit About School Section</h3>
                <button type="reset" onclick="toggleModal('about-update')"  class="text-gray-400 hover:text-gray-600">
                  X
                </button>
            </div>
            <div class="bg-white rounded-lg p-6 w-full">
                <div class="bg-white rounded-lg p-6 w-full">
                    <div class="grid grid-cols-3">
                        <div class="mb-4 mx-2">
                          <label id="about-label-en" class="block text-sm font-medium text-gray-700 mb-1"></label>
                          <textarea  id="about-school-en" cols="5" rows="5" class="block mb-4 w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="about_school_1 (En)..." required></textarea>
                        </div>
                        <div class="mb-4 mx-2">
                          <label id="about-label-th" class="block text-sm font-medium text-gray-700 mb-1"></label>
                          <textarea  id="about-school-th" cols="5" rows="5" class="block mb-4 w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="about_school_1 (Th)..." required></textarea>
                        </div>
                        <div class="mb-4 mx-2">
                          <label id="about-label-zh" class="block text-sm font-medium text-gray-700 mb-1"></label>
                          <textarea  id="about-school-zh" cols="5" rows="5" class="block mb-4 w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="about_school_1 (Zh)..." required></textarea>
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
                </div>
            </div>

          </form>
        </div>
    </div>
    <div id="about-create" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
        <div class="flex justify-center items-center">
        <form method="post" action="{{route('edit_about_school')}}" class="lg:w-[78rem] h-[550px] sm:w-[800px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
                <h3 class="text-lg font-semibold">Edit About School Section</h3>
                <button type="reset" onclick="toggleModal('about-create')"  class="text-gray-400 hover:text-gray-600">
                X
                </button>
            </div>

            <div class="bg-white rounded-lg p-6 w-full">
                <div class="bg-white rounded-lg p-6 w-full">
                    <div class="grid grid-cols-3">
                        <div class="mb-4 mx-2">
                          <label id="about-create-label-en" class="block text-sm font-medium text-gray-700 mb-1"></label>
                          <textarea name='' id="about-create-school-en" cols="5" rows="5" class="block mb-4 w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="about_school_1 (En)..." required> </textarea>
                        </div>
                        <div class="mb-4 mx-2">
                          <label id="about-create-label-th" class="block text-sm font-medium text-gray-700 mb-1"></label>
                          <textarea name='' id="about-create-school-th" cols="5" rows="5" class="block mb-4 w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="about_school_1 (Th)..." required> </textarea>
                        </div>
                        <div class="mb-4 mx-2">
                          <label id="about-create-label-zh" class="block text-sm font-medium text-gray-700 mb-1"></label>
                          <textarea name='' id="about-create-school-zh" cols="5" rows="5" class="block mb-4 w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="about_school_1 (Zh)..." required> </textarea>
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
                </div>
            </div>

        </form>
        </div>
    </div>
{{-- End about school --}}


<script>
    function sessionModal(key,modalId) {
        console.log(key,modalId);

        const sessionData = @json(session('about-school-list'));
        const fields = ['en', 'th', 'zh'];
        if (sessionData[key]) {
            fields.forEach(lang => {
                const field = document.getElementById(`about-school-${lang}`);
                if (field) {
                    field.value = sessionData[key][lang] || '';
                    field.name = `${key}[${lang}]`;
                    field.placeholder = `For ${lang.toUpperCase()}:`
                }
            });
        }
        // Show the modal
        document.getElementById(modalId).classList.toggle('hidden');

    }
    function dbModal(key, itemContent, modalId ) {
            const sessionData = @json(session('about-school-list')); // Get from session
            const fields = ['en', 'th', 'zh'];
            if (itemContent) {
                const content = JSON.parse(itemContent);
                fields.forEach(lang => {
                    const field = document.getElementById(`about-school-${lang}`);
                    const label = document.getElementById(`about-label-${lang}`);
                    if (label) label.textContent = `About School Label for ${lang.toUpperCase()}:`;
                    if (field) {
                        field.value = content[lang] || '';
                        field.name = `${key}[${lang}]`;
                        field.placeholder = `For ${lang.toUpperCase()}:`
                    }
                });
            }


            // Show the modal
            document.getElementById(modalId).classList.toggle('hidden');

    }
    function createModal(key , modal_id) {
        const fields = ['en', 'th', 'zh'];
        fields.forEach(lang => {
            const field = document.getElementById(`about-create-school-${lang}`);
            const label = document.getElementById(`about-create-label-${lang}`);
            if (label) label.textContent = `About School Label for ${lang.toUpperCase()}:`;
            if (field) {

                field.name = field.placeholder = `${key}[${lang}]`;

            }
        });
        document.getElementById(modal_id).classList.toggle('hidden');


    }
</script>
