@extends('Admin-Dashboard.Edit-page.layout.master')
@section('content')
    <div class="flex flex-row bg-sunflower_yellow  p-3 ">
      <div class="basis-1/4 text-center items-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('contact_form_blade')}}">Back</a>
        </button>
      </div>
      <div class="basis-1/3 text-center bg-black italic text-xl rounded-lg text-white">
        <h1>you are now in {{ __('nav.enquire') }} preview mode</h1>
      </div>
      <div class="basis-1/3 text-center">
        <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('enquire_reset_btn')}}">Reset</a>
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('enquire_save_btn')}}">Save</a>
        </button>
      </div>
    </div>
    @include('Admin-Dashboard.Edit-page.pages.enquireNow.enquire-modal')
    <div ondblclick="toggleModal('enquire-1')" class="relative max-lg:hidden">
        <img src="{{ session()->has('enquire_welcome') ? Storage::url('tmp/enquire'.session('enquire_welcome')['enquire_bg_img']) :  asset('storage/asset/enquire/'.$enquireMedia[0]['img_path'])}}" />
        <div class="bg-black absolute top-0 right-0 left-0 bottom-0 bg-opacity-20"></div>
        <p
            class="font-oswald text-sunflower_yellow text-[5rem] font-medium leading-[1.5em] absolute top-1/2 w-[55%] max-xl:w-[75%] left-1/2 -translate-x-[59%] -translate-y-[30%]">
            {{ __('general.school_name') }}</p>
    </div>
    <div ondblclick="toggleModal('enquire-2')" class="mt-6 flex max-lg:mt-0 max-lg:flex-col max-lg:gap-8">
        <div class="w-1/2 max-lg:w-full">
            <div class="w-3/5 max-md:w-[90%] mx-auto">
                <h2 class="font-oswald font-medium text-[2rem] my-10">{{ __('enquire.enquire_form_title') }}</h2>
                <form class="flex flex-wrap gap-3">
                    <input
                        class="w-[calc(50%-0.4rem)] bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                        placeholder="Name">
                    <input
                        class="w-[calc(50%-0.4rem)] bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border required"
                        placeholder="Email" type="email" required validate="email">
                    <input
                        class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                        placeholder="Phone Number(Thai)">
                    <input
                        class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                        placeholder="Phone Number(Myanmar)">
                    <input
                        class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                        placeholder="Highest Education Completed">
                    <div class="w-full relative">
                        <select
                            class="w-full bg-transparent border-b-[1px] border-black text-black font-light py-2 ps-2 hover:border">
                            <option class="hidden" disabled selected>Country of Nationality
                            </option>
                            <option class="bg-black text-yellow-400">Myanmar</option>
                            <option class="bg-black text-yellow-400">Thai</option>
                            <option class="bg-black text-yellow-400">Malayasia</option>
                            <option class="bg-black text-yellow-400">Indonesia</option>
                            <option class="bg-black text-yellow-400">Philippines</option>
                            <option class="bg-black text-yellow-400">Cambodia</option>
                            <option class="bg-black text-yellow-400">Laos</option>
                        </select>
                    </div>
                    <select
                        class="w-full bg-transparent border-b-[1px] border-black text-black font-light  py-2 ps-2 hover:border">
                        <option class="hidden" disabled selected>Programs Interested In</option>
                        <option class="bg-black text-yellow-400">GED</option>
                        <option class="bg-black text-yellow-400">Pre-IGSCE</option>
                        <option class="bg-black text-yellow-400">IGSCE O Level</option>
                    </select>
                    <div class="flex items-center gap-4 my-8">
                        <div class="relative cursor-pointer bg-white border border-black"
                            id="accept-policy-enquire-container">
                            <input id="accept-policy-enquire-checkbox" type="checkbox"
                                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  cursor-pointer -z-20 opacity-0"
                                style="border-radius: 0px" />
                            <div class="w-4 h-4"></div>
                            <svg id="accept-policy-enquire-tick" viewBox="0 0 512 512"
                                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2 hidden">
                                <path
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                            </svg>

                        </div>
                        <label id="accept-policy-enquire-label"
                            class="font-avenir-light opacity-85 text-[0.9375rem] cursor-pointer" style="line-height: 1">
                            Gainsville International School Maesai can contact me regarding information on other courses,
                            future events and news updates
                        </label>
                    </div>
                    <button class="w-full text-[1.125rem] font-avenir-light bg-black text-white py-2 hover:opacity-50 transition-.5s">Send Message</button>
                </form>
            </div>
        </div>
        <img class="w-1/2 max-lg:w-full object-cover" src="{{ session()->has('enquire_form') ? Storage::url('tmp/enquire'.session('enquire_form')['enquire_form_img']) :  asset('storage/asset/enquire/'.$enquireMedia[1]['img_path'])}}" />
    </div>
@endsection
