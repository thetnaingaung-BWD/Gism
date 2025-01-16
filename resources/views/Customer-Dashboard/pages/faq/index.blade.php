@extends('Customer-Dashboard.layout.master')

@section('content')
    <div class="relative max-lg:hidden">
        <img src="{{ asset('storage/asset/faqs/'.$faqsMedia->img_path) }}" />
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
        <div class="flex-1">
            <h5 class="font-oswald font-medium text-[1.375rem] mb-[2.1875rem]">{{ __('faq.faq_1_title') }}</h5>
            <p class="font-avenir-light text-[0.9375rem] leading-[1.875em]">{{ __('faq.faq_1_content') }}</p>
        </div>
        <div class="flex-1">
            <h5 class="font-oswald font-medium text-[1.375rem] mb-[2.1875rem]">{{ __('faq.faq_2_title') }}</h5>
            <p class="font-avenir-light text-[0.9375rem] leading-[1.875em]">{{ __('faq.faq_2_content') }}</p>
        </div>
    </div>
    <div class="w-[65%] max-lg:w-[90%] mx-auto flex flex-wrap gap-16 max-md:flex-col mb-8">
        <div class="flex-1">
            <h5 class="font-oswald font-medium text-[1.375rem] mb-[2.1875rem]">{{ __('faq.faq_3_title') }}</h5>
            <p class="font-avenir-light text-[0.9375rem] leading-[1.875em]">{{ __('faq.faq_3_content') }}</p>
        </div>
        <div class="flex-1">
            <h5 class="font-oswald font-medium text-[1.375rem] mb-[2.1875rem]">{{ __('faq.faq_4_title') }}</h5>
            <p class="font-avenir-light  text-[0.9375rem] leading-[1.875em]">{{ __('faq.faq_4_content') }}</p>
        </div>
    </div>
@endsection
