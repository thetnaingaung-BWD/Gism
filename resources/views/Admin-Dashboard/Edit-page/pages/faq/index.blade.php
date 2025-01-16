@extends('Admin-Dashboard.Edit-page.layout.master')
@section('content')
    <div class="flex flex-row bg-sunflower_yellow  p-3 ">
      <div class="basis-1/4 text-center items-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('contact_form_blade')}}">Back</a>
        </button>
      </div>
      <div class="basis-1/3 text-center bg-black italic text-xl rounded-lg text-white">
        <h1>you are now in {{ __('nav.faq') }} preview mode</h1>
      </div>
      <div class="basis-1/3 text-center">
        <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('faq_reset_btn')}}">Reset</a>
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('faq_save_btn')}}">Save</a>
        </button>
      </div>
    </div>
     @include('Admin-Dashboard.Edit-page.pages.faq.faq-modal')
    <div class="relative max-lg:hidden" ondblclick="toggleModal('faqs-1')">
        <img src="{{ session()->has('faqs-welcome-media') ? Storage::url('tmp/faqs/'.session('faqs-welcome-media')['faqs_bg_img']) :  asset('storage/asset/faqs/'.$faqsMedia->img_path)}}" />
        <div class="bg-black absolute top-0 right-0 left-0 bottom-0 bg-opacity-20"></div>
        <p
            class="font-oswald text-sunflower_yellow text-[5rem] font-medium leading-[1.5em] absolute top-1/2 w-[55%] max-xl:w-[75%] left-1/2 -translate-x-[59%] -translate-y-[26%]">
            {{ __('general.school_name') }}</p>
    </div>
    <h4
        class="font-oswald font-medium text-[3.75rem] text-center mt-2 mb-10 max-md:text-start max-md:w-[90%] max-md:mx-auto">
        {{ __('faq.faq_title') }}
    </h4>
    <div class="w-[65%] max-lg:w-[90%] mx-auto flex flex-wrap gap-16 max-md:flex-col mb-20">
        <div class="flex-1 cursor-pointer" ondblclick="toggleModal('faqs-2')">
            <h5 class="font-oswald font-medium text-[1.375rem] mb-[2.1875rem]">{{session()->get('faqs-content-1')['faqs_ques_1'][session()->get('lang')] ?? translate($faqs[0]->key) }} </h5>
            <p class="font-avenir-light text-[0.9375rem] leading-[1.875em]">{{ session()->get('faqs-content-1')['faqs_ans_1'][session()->get('lang')] ??  translate($faqs[1]->key) }} </p>
        </div>
        <div class="flex-1 cursor-pointer" ondblclick="toggleModal('faqs-3')">
            <h5 class="font-oswald font-medium text-[1.375rem] mb-[2.1875rem]">{{ session()->get('faqs-content-2')['faqs_ques_2'][session()->get('lang')] ??  translate($faqs[2]->key)  }} </h5>
            <p class="font-avenir-light text-[0.9375rem] leading-[1.875em]">{{ session()->get('faqs-content-2')['faqs_ans_2'][session()->get('lang')] ??  translate($faqs[3]->key)  }} </p>
        </div>
    </div>
    <div class="w-[65%] max-lg:w-[90%] mx-auto flex flex-wrap gap-16 max-md:flex-col mb-20">
        <div class="flex-1 cursor-pointer" ondblclick="toggleModal('faqs-4')">
            <h5 class="font-oswald font-medium text-[1.375rem] mb-[2.1875rem]">{{ session()->get('faqs-content-3')['faqs_ques_3'][session()->get('lang')] ??  translate($faqs[4]->key)  }} </h5>
            <p class="font-avenir-light text-[0.9375rem] leading-[1.875em]">{{ session()->get('faqs-content-3')['faqs_ans_3'][session()->get('lang')] ??  translate($faqs[5]->key)  }} </p>
        </div>
        <div class="flex-1 cursor-pointer" ondblclick="toggleModal('faqs-5')">
            <h5 class="font-oswald font-medium text-[1.375rem] mb-[2.1875rem]">{{ session()->get('faqs-content-4')['faqs_ques_4'][session()->get('lang')] ??  translate($faqs[6]->key)  }} </h5>
            <p class="font-avenir-light  text-[0.9375rem] leading-[1.875em]">{{ session()->get('faqs-content-4')['faqs_ans_4'][session()->get('lang')] ??  translate($faqs[7]->key)  }} </p>
        </div>
    </div>


@endsection
