@extends('Customer-Dashboard.layout.master')
@section('content')
    <div class="relative max-lg:hidden">
        <img src="{{ asset('storage/asset/about/'.$aboutMedia[0]['img_path']) }}" />
        <p
            class="font-oswald text-sunflower_yellow text-[4.5rem] font-bold leading-[1.25em] absolute top-1/2 -translate-y-1/2 w-[55%] max-xl:w-4/5 left-1/2 -translate-x-[55%]">
            {{ __('general.school_name') }}</p>
    </div>
    <div class="flex max-md:flex-col">
        <div
            class="w-1/2 max-md:w-full bg-sunflower_yellow px-44 max-xl:px-12 max-md:px-6 py-10 max-lg:py-8 max-md:py-6 max-sm:py-4">
            <h6
                class="font-oswald text-[2.5rem] max-xl:text-[2.3125rem] max-lg:text-[2.125rem] max-md:text-[1.9375rem] max-sm:text-[1.75rem] text-center max-md:text-start font-bold">
                {{ __('about.our_history_title') }}</h6>
            <p
                class="font-montserrat mt-10 max-lg:mt-5 max-md:mt-2 leading-[1.88em] max-xl:text-[0.96875rem] max-lg:text-[0.9375rem] max-md:text-[0.90625rem] max-sm:text-[0.875rem]">
                {{ __('about.our_history_content') }}</p>
        </div>
        <img class="w-1/2 max-md:w-full object-cover"
            src="{{ asset('storage/asset/about/'.$aboutMedia[1]['img_path']) }}" />
    </div>
    <div class="bg-royal_blue w-full text-white pt-10 pb-20 max-md:py-10">
        <p
            class="font-oswald text-[2.375rem] max-xl:text-[2.140625rem] max-lg:text-[1.90625rem] max-md:text-[1.671875rem] max-sm:text-[1.4375rem] w-[45%] max-lg:w-4/5 max-md:w-[90%] mx-auto font-medium leading-[2.6rem]">
            {{ __('about.about_school_title') }}</p>
        <div
            class="flex flex-col font-montserrat text-[1.0625rem] max-xl:text-[1.015625rem] max-lg:text-[0.96875rem] max-md:text-[0.921875rem] max-sm:text-[0.875rem] w-1/2 max-lg:w-4/5 max-md:w-[90%] mx-auto gap-8 mt-16 max-lg:mt-8 max-md:mt-4">
            @foreach (__('about.about_school') as $item)
                <p>{{ __($item) }}</p>
            @endforeach
        </div>
    </div>
    <div class="py-5">
        <h5
            class="font-poppin font-bold text-[2.8125rem] max-xl:text-[2.5rem] max-lg:text-[2.1875rem] max-md:text-[1.875rem] max-sm:text-[1.5625rem] text-center mb-5">
            {{ __('about.our_philosophy_title') }}</h5>
        <img class="w-[46%] max-xl:w-[70%] max-md:w-[80%] max-sm:w-[90%] mx-auto"
            src="{{ asset('assets/About/philosophy0_edited.webp') }}" />
    </div>
@endsection
