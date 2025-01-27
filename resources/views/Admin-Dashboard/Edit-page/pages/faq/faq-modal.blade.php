<div id="faqs-1" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_faq_welcome')}}" class="lg:w-[500px] h-[550px] sm:w-[300px] bg-white p-6 rounded-lg shadow-md overflow-auto
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
            <button type="reset" onclick="toggleModal('faqs-1')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Upload Image -->
        <div class="mb-4 parentDiv">
            <div class="m-5  imageContainer">
              @if(isset($faqsMedia))
                <img class="object-contain  h-60 w-96 m-auto" src="{{ session()->has('faqs-welcome-media') ? Storage::url('tmp/faqs/'.session('faqs-welcome-media')['faqs_bg_img']) :  $faqsMedia->img_path}}" >
              @else
                <img src="{{asset('assets/Faq/bb21e7_c2bb00ab4b0b4b3e8027cd85720743f3~mv2.webp')}}" class="object-contain  h-60 w-96 m-auto">
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
                    <input id="fileInput-1" type="file" class="hidden" name='faqs_bg_img' onchange="imageUpload(event,'faqs-1')"/>
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

<div id="faqs-2" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_faq_content')}}" class="lg:w-[72rem] h-[550px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
          [&::-webkit-scrollbar]:w-2
          [&::-webkit-scrollbar-track]:rounded-full
          [&::-webkit-scrollbar-track]:bg-gray-100
          [&::-webkit-scrollbar-thumb]:rounded-full
          [&::-webkit-scrollbar-thumb]:bg-gray-300
          dark:[&::-webkit-scrollbar-track]:bg-neutral-700
          dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
          enctype="multipart/form-data">
          @csrf

        <input type="hidden" name="section_id" value="1">
        <!-- Header -->
        <div class="flex justify-between items-center border-b  pb-3">
            <h3 class="text-lg font-semibold">Edit Faqs Section-1</h3>
            <button type="reset" onclick="toggleModal('faqs-2')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>
        <!-- Faqs Question -->
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (EN)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question section 1"
                  @if($faqs->count() > 0)
                    value="{{ session()->get('faqs-content-1')['faqs_ques_1']['en'] ??  translate($faqs[0]->key,'en')  }}"
                  @endif
                  name="faqs_ques_1[en]"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (TH)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question section 1"
                  @if($faqs->count() > 0)
                  value="{{ session()->get('faqs-content-1')['faqs_ques_1']['th'] ??  translate($faqs[0]->key,'th')  }}"
                  @endif
                  name="faqs_ques_1[th]"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (ZH)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question section 1"
                  @if($faqs->count() > 0)
                    value="{{ session()->get('faqs-content-1')['faqs_ques_1']['zh'] ??  translate($faqs[0]->key,'zh')  }}"
                  @endif
                  name="faqs_ques_1[zh]"
                  required
                >
              </div>
            </div>
        </div>

        <!-- Faqs Answer -->
        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (EN)</label>
              <textarea name="faqs_ans_1[en]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer section 1" required>@if($faqs->count() > 0){{ session()->get('faqs-content-1')['faqs_ans_1']['en'] ??  translate($faqs[1]->key,'en')  }}@endif</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (TH)</label>
              <textarea name="faqs_ans_1[th]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer section 1" required>@if($faqs->count() > 0){{ session()->get('faqs-content-1')['faqs_ans_1']['th'] ??  translate($faqs[1]->key,'th')  }}@endif</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (ZH)</label>
              <textarea name="faqs_ans_1[zh]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer section 1" required>@if($faqs->count() > 0){{ session()->get('faqs-content-1')['faqs_ans_1']['zh'] ??  translate($faqs[1]->key,'zh')  }}@endif</textarea>
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

<div id="faqs-3" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_faq_content')}}" class="lg:w-[72rem] h-[550px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
          [&::-webkit-scrollbar]:w-2
          [&::-webkit-scrollbar-track]:rounded-full
          [&::-webkit-scrollbar-track]:bg-gray-100
          [&::-webkit-scrollbar-thumb]:rounded-full
          [&::-webkit-scrollbar-thumb]:bg-gray-300
          dark:[&::-webkit-scrollbar-track]:bg-neutral-700
          dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
          enctype="multipart/form-data">
          @csrf
        <input type="hidden" name="section_id" value="2">
        <!-- Header -->
        <div class="flex justify-between items-center border-b  pb-3">
            <h3 class="text-lg font-semibold">Edit Faqs section-2</h3>
            <button type="reset" onclick="toggleModal('faqs-3')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>

        <!-- Faqs Question -->
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (EN)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question Section 2"
                  @if($faqs->count() > 0)
                  value="{{ session()->get('faqs-content-2')['faqs_ques_2']['en'] ??  translate($faqs[2]->key,'en')  }}"
                  @endif
                  name="faqs_ques_2[en]"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (TH)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question Section 2"
                  @if($faqs->count() > 0)
                  value="{{ session()->get('faqs-content-2')['faqs_ques_2']['th'] ??  translate($faqs[2]->key,'th')  }}"
                  @endif
                  name="faqs_ques_2[th]"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (ZH)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question Section 2"
                  @if($faqs->count() > 0)
                  value="{{ session()->get('faqs-content-2')['faqs_ques_2']['zh'] ??  translate($faqs[2]->key,'zh')  }}"
                  @endif
                  name="faqs_ques_2[zh]"
                  required
                >
              </div>
            </div>
        </div>

        <!-- Faqs Answer -->
        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (EN)</label>
                <textarea name="faqs_ans_2[en]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 2" required>@if($faqs->count() > 0){{ session()->get('faqs-content-2')['faqs_ans_2']['en'] ??  translate($faqs[3]->key,'en') }}@endif</textarea>
            </div>
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (TH)</label>
                <textarea name="faqs_ans_2[th]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 2" required>@if($faqs->count() > 0){{ session()->get('faqs-content-2')['faqs_ans_2']['th'] ??  translate($faqs[3]->key,'th') }}@endif</textarea>
            </div>
            <div class="mb-4 mx-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (ZH)</label>
                <textarea name="faqs_ans_2[zh]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 2" required>@if($faqs->count() > 0){{ session()->get('faqs-content-2')['faqs_ans_2']['zh'] ??  translate($faqs[3]->key,'zh') }}@endif</textarea>
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

<div id="faqs-4" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_faq_content')}}" class="lg:w-[72rem] h-[550px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
          [&::-webkit-scrollbar]:w-2
          [&::-webkit-scrollbar-track]:rounded-full
          [&::-webkit-scrollbar-track]:bg-gray-100
          [&::-webkit-scrollbar-thumb]:rounded-full
          [&::-webkit-scrollbar-thumb]:bg-gray-300
          dark:[&::-webkit-scrollbar-track]:bg-neutral-700
          dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
          enctype="multipart/form-data">
          @csrf
        <input type="hidden" name="section_id" value="3">
        <!-- Header -->
        <div class="flex justify-between items-center border-b  pb-3">
            <h3 class="text-lg font-semibold">Edit Faqs Section-3</h3>
            <button type="reset" onclick="toggleModal('faqs-4')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>

        <!-- Faqs Question -->
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (EN)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question Section 3"
                  @if($faqs->count() > 0)
                  value="{{ session()->get('faqs-content-3')['faqs_ques_3']['en'] ??  translate($faqs[4]->key)  }}"
                  @endif
                  name="faqs_ques_3[en]"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (TH)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question Section 3"
                  @if($faqs->count() > 0)
                  value="{{ session()->get('faqs-content-3')['faqs_ques_3']['th'] ??  translate($faqs[4]->key)  }}"
                  @endif
                  name="faqs_ques_3[th]"
                  required
                >
              </div>
            </div>
            <div class="my-4 mx-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (ZH)</label>
                <input
                  type="text"
                  class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                  placeholder="Question Section 3"
                  @if($faqs->count() > 0)
                  value="{{ session()->get('faqs-content-3')['faqs_ques_3']['zh'] ??  translate($faqs[4]->key)  }}"
                  @endif
                  name="faqs_ques_3[zh]"
                  required
                >
              </div>
            </div>
        </div>

        <!-- Faqs Answer -->
        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (EN)</label>
              <textarea name="faqs_ans_3[en]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 3" required>@if($faqs->count() > 0){{ session()->get('faqs-content-3')['faqs_ans_3']['en'] ??  translate($faqs[5]->key,'en')  }}@endif</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (TH)</label>
              <textarea name="faqs_ans_3[th]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 3" required>@if($faqs->count() > 0){{ session()->get('faqs-content-3')['faqs_ans_3']['th'] ??  translate($faqs[5]->key,'th')  }}@endif</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (ZH)</label>
              <textarea name="faqs_ans_3[zh]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 3" required>@if($faqs->count() > 0){{ session()->get('faqs-content-3')['faqs_ans_3']['zh'] ??  translate($faqs[5]->key,'zh')  }}@endif</textarea>
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

<div id="faqs-5" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10 w-full h-100" >
    <div class="flex justify-center items-center">
      <form method="post" action="{{route('edit_faq_content')}}" class="lg:w-[72rem] h-[550px] sm:w-[500px] bg-white p-6 rounded-lg shadow-md overflow-auto
          [&::-webkit-scrollbar]:w-2
          [&::-webkit-scrollbar-track]:rounded-full
          [&::-webkit-scrollbar-track]:bg-gray-100
          [&::-webkit-scrollbar-thumb]:rounded-full
          [&::-webkit-scrollbar-thumb]:bg-gray-300
          dark:[&::-webkit-scrollbar-track]:bg-neutral-700
          dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
          enctype="multipart/form-data">
          @csrf
        <input type="hidden" name="section_id" value="4">
        <!-- Header -->
        <div class="flex justify-between items-center border-b  pb-3">
            <h3 class="text-lg font-semibold">Edit Faqs Section-4</h3>
            <button type="reset" onclick="toggleModal('faqs-5')"  class="text-gray-400 hover:text-gray-600">
              X
            </button>
        </div>

        <!-- Faqs Question -->
        <div class="grid grid-cols-3">
            <div class="my-4 mx-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (EN)</label>
                    <input
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Question Section 4"
                    @if($faqs->count() > 0)
                    value="{{ session()->get('faqs-content-4')['faqs_ques_4']['en'] ??  translate($faqs[6]->key,'en')  }}"
                    @endif
                    name="faqs_ques_4[en]"
                    required>
                </div>
            </div>
            <div class="my-4 mx-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (TH)</label>
                    <input
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Question Section 4"
                    @if($faqs->count() > 0)
                    value="{{ session()->get('faqs-content-4')['faqs_ques_4']['th'] ??  translate($faqs[6]->key,'th')  }}"
                    @endif
                    name="faqs_ques_4[th]"
                    required>
                </div>
            </div>
            <div class="my-4 mx-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Question (ZH)</label>
                    <input
                    type="text"
                    class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    placeholder="Question Section 4"
                    @if($faqs->count() > 0)
                    value="{{ session()->get('faqs-content-4')['faqs_ques_4']['zh'] ??  translate($faqs[6]->key,'zh')  }}"
                    @endif
                    name="faqs_ques_4[zh]"
                    required>
                </div>
            </div>
        </div>

        <!-- Faqs Answer -->
        <div class="grid grid-cols-3">
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (EN)</label>
              <textarea name="faqs_ans_4[en]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 4" required>@if($faqs->count() > 0){{ session()->get('faqs-content-4')['faqs_ans_4']['en'] ??  translate($faqs[7]->key,'en')  }}@endif</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (TH)</label>
              <textarea name="faqs_ans_4[th]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 4" required>@if($faqs->count() > 0){{ session()->get('faqs-content-4')['faqs_ans_4']['th'] ??  translate($faqs[7]->key,'th')  }}@endif</textarea>
            </div>
            <div class="mb-4 mx-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">FAQs Answer (ZH)</label>
              <textarea name="faqs_ans_4[zh]" id="" cols="30" rows="10" class="block w-full text-sm border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Answer Section 4" required>@if($faqs->count() > 0){{ session()->get('faqs-content-4')['faqs_ans_4']['zh'] ??  translate($faqs[7]->key,'zh')  }}@endif</textarea>
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


