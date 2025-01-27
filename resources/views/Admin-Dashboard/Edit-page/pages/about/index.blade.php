@extends('Admin-Dashboard.Edit-page.layout.master')
@section('content')
    <div class="flex flex-row bg-sunflower_yellow  p-3 ">
      <div class="basis-1/4 text-center items-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('contact_form_blade')}}">Back</a>
        </button>
      </div>
      <div class="basis-1/3 text-center bg-black italic text-xl rounded-lg text-white">
        <h1>you are now in {{ __('nav.about') }} preview mode</h1>
      </div>
      <div class="basis-1/3 text-center">
        <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('about_reset_btn')}}">Reset</a>
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('about_save_btn')}}">Save</a>
        </button>
      </div>
    </div>
    @include('Admin-Dashboard.Edit-page.pages.about.about-modal')

    <div ondblclick="toggleModal('about-1')" class="relative max-lg:hidden">
        @if(isset($aboutMedia[0]))
        <img src="{{ session()->has('about-welcome-media') ? Storage::url('tmp/about/'.session('about-welcome-media')['about_bg_img']) :  asset('storage/asset/about/'.$aboutMedia[0]['img_path'])}}" />
        @else
        <img src="{{ asset('assets/About/bb21e7_e1de3e9ec5e0402dbe6da4537b485b58~mv2.webp')}}" />
        @endif
        <p
            class="font-oswald text-sunflower_yellow text-[4.5rem] font-bold leading-[1.25em] absolute top-1/2 -translate-y-1/2 w-[55%] max-xl:w-4/5 left-1/2 -translate-x-[55%]">
            {{ __('general.school_name') }}</p>
    </div>

    <div ondblclick="toggleModal('about-2')" class="flex max-md:flex-col">
        <div
            class="w-1/2 max-md:w-full bg-sunflower_yellow px-44 max-xl:px-12 max-md:px-6 py-10 max-lg:py-8 max-md:py-6 max-sm:py-4">
            <h6
                class="font-oswald text-[2.5rem] max-xl:text-[2.3125rem] max-lg:text-[2.125rem] max-md:text-[1.9375rem] max-sm:text-[1.75rem] text-center max-md:text-start font-bold">
                {{ __('about.our_history_title') }}</h6>
            <p
                class="font-montserrat mt-10 max-lg:mt-5 max-md:mt-2 leading-[1.88em] max-xl:text-[0.96875rem] max-lg:text-[0.9375rem] max-md:text-[0.90625rem] max-sm:text-[0.875rem]">
                {{ session()->has('our-history-content') ? session('our-history-content')['our_history_content'][session()->get('lang')] : translate('our_history_content') }}
            </p>
        </div>
        @if(isset($aboutMedia[1]))
            <img class="w-1/2 max-md:w-full object-cover"
                src="{{ session()->has('about-our-history-media') ? Storage::url('tmp/about/'.session('about-our-history-media')['our_history_img']) :  asset('storage/asset/about/'.$aboutMedia[1]['img_path'])}}" />
        @else
            <img class="w-1/2 max-md:w-full object-cover" src="{{asset('assets/About/bb21e7_111b8172203d41b2951b4af6d9f1b2af~mv2.webp')}}"/>
        @endif
        
    </div>

    <div class="bg-royal_blue w-full text-white pt-10 pb-20 max-md:py-10">
        <p
            class="font-oswald text-[2.375rem] max-xl:text-[2.140625rem] max-lg:text-[1.90625rem] max-md:text-[1.671875rem] max-sm:text-[1.4375rem] w-[45%] max-lg:w-4/5 max-md:w-[90%] mx-auto font-medium leading-[2.6rem]">
            {{ __('about.about_school_title') }}</p>

        <div
            class="flex flex-col font-montserrat text-[1.0625rem] max-xl:text-[1.015625rem] max-lg:text-[0.96875rem] max-md:text-[0.921875rem] max-sm:text-[0.875rem] w-1/2 max-lg:w-4/5 max-md:w-[90%] mx-auto gap-8 mt-16 max-lg:mt-8 max-md:mt-4">
            @if($contents)
            {{-- Get from lang/en --}}
                @foreach ($contents as $item)
                    <div class="group relative p-4 grid grid-cols-12 shadow-md rounded mb-4">
                        <p class="block col-span-10">{{ translate($item->key) }}</p>
                        <button onclick="dbModal('{{$item->key}}' , '{{ addslashes($item->body) }}','about-update')" class="absolute top-2 right-3 text-white m-2 hover:text-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button class="absolute top-2 right-10 text-white m-2 hover:text-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <a href="{{route('about_item_delete_db', $id = $item->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>
                        </button>
                    </div>
                @endforeach
            @endif
            @if(session()->has('about-school-list'))
             {{-- get from Session Data --}}
                @foreach (session('about-school-list') as $key => $item)

                    <div  class="group relative p-4 grid grid-cols-12 shadow-md rounded mb-4">
                        <p class="block col-span-10">{{$item[session()->get('lang')]}}</p>
                        <button onclick="sessionModal('{{$key}}','about-update')"  class="absolute top-2 right-3 text-white m-2 hover:text-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>

                        <button type="submit" class="absolute top-2 right-10 text-white m-2 hover:text-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <a href="{{route('about_item_delete_session', $id = $key)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>
                        </button>
                    </div>
                @endforeach
            @endif

            <button onclick="createModal('about_school_{{ uniqid() }}','about-create')" class="w-full rounded-md bg-sunflower_yellow py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
                Add New list
            </button>

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
