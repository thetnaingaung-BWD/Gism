@extends('Admin-Dashboard.Edit-page.layout.master')
@include('Admin-Dashboard.Edit-page.pages.programs.programs-modal')
@section('content')
    {{-- 1.5 / 0.5625 --}}
    <div class="relative max-lg:hidden">
        <img src="{{ asset('assets/Programs/bb21e7_0bc919e3e353428690a46eb03980bdcd~mv2.webp') }}" />
        <div class="bg-black absolute top-0 right-0 left-0 bottom-0 bg-opacity-10"></div>
        <p
            class="font-oswald text-sunflower_yellow text-[5rem] font-medium leading-[1.5em] absolute top-1/2 w-[55%] max-xl:w-4/5 left-1/2 -translate-x-[59%] -translate-y-[20%] max-xl:-translate-y-[40%]">
            {{ __('general.school_name') }}</p>
    </div>
    <div class="bg-royal_blue pt-10 pb-20 flex flex-col gap-10">
        <p
            class="font-oswald text-[4.0625rem] max-xl:text-[3.5rem] max-lg:text-[2.9375rem] max-md:text-[2.375rem] max-sm:text-[1.8125rem] text-white text-center max-lg:text-start max-lg:w-[62%] max-lg:mx-auto max-sm:w-[90%]">
            {{ __('program.our_program_title') }}</p>
        <div class="w-[62%] flex mx-auto max-md:flex-col max-sm:w-[90%]">
            <img class="w-1/2 max-md:w-full" src="{{ asset('assets/Programs/file.webp') }}" />
            <div
                class="w-1/2 max-md:w-full bg-white flex flex-col gap-[1.5rem] justify-center items-start px-[4.6875rem] max-md:py-[2.25rem] max-md:px-[1.875rem]">
                <p class="font-oswald font-medium text-[1.375rem] max-md:text-[1.5rem]">{{ __('program.ged') }}</p>
                <p class="font-avenir-light">{{ __('program.free') }}</p>
                <a class="px-[1rem] py-[0.4375rem] border rounded-full border-black hover:bg-cyan_blue hover:text-opacity-75 hover:text-white transition-all cursor-pointer">
                    {{ __('program.view_details') }}
                </a>
            </div>
        </div>
        <div class="w-[62%] flex mx-auto max-md:flex-col max-sm:w-[90%]">
            <img class="w-1/2 max-md:w-full" src="{{ asset('assets/Programs/file (1).webp') }}" />
            <div
                class="w-1/2 max-md:w-full bg-white flex flex-col gap-[1.5rem] justify-center items-start px-[4.6875rem] max-md:py-[2.25rem] max-md:px-[1.875rem]">
                <p class="font-oswald font-medium text-[1.375rem] max-md:text-[1.5rem]">{{ __('program.pre_igcse') }}</p>
                <p class="font-avenir-light">{{ __('program.free') }}</p>
                <a class="px-[1rem] py-[0.4375rem] border rounded-full border-black hover:bg-cyan_blue hover:text-opacity-75 hover:text-white transition-all cursor-pointer">
                    {{ __('program.view_details') }}
                </a>
            </div>
        </div>
        <div class="w-[62%] flex mx-auto max-md:flex-col max-sm:w-[90%]">
            <img class="w-1/2 max-md:w-full" src="{{ asset('assets/Programs/file (2).webp') }}" />
            <div
                class="w-1/2 max-md:w-full bg-white flex flex-col gap-[1.5rem] justify-center items-start px-[4.6875rem] max-md:py-[2.25rem] max-md:px-[1.875rem]">
                <p class="font-oswald font-medium text-[1.375rem] max-md:text-[1.5rem]">{{ __('program.igcse_o_level') }}
                </p>
                <p class="font-avenir-light">{{ __('program.free') }}</p>
                <a class="px-[1rem] py-[0.4375rem] border rounded-full border-black hover:bg-cyan_blue hover:text-opacity-75 hover:text-white transition-all cursor-pointer">
                    {{ __('program.view_details') }}
                </a>
            </div>
        </div>
    </div>
@endsection
