@extends('Admin-Dashboard.Edit-page.layout.master')
@section('content')
    <div class="flex flex-row bg-sunflower_yellow  p-3 ">
      <div class="basis-1/4 text-center items-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('contact_form_blade')}}">Back</a>
        </button>
      </div>
      <div class="basis-1/3 text-center bg-black italic text-xl rounded-lg text-white">
        <h1>you are now in preview mode</h1>
      </div>
      <div class="basis-1/3 text-center">
        <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('gallery_reset_btn')}}">Reset</a>
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('gallery_save_btn')}}">Save</a>
        </button>
      </div>
    </div>
     @include('Admin-Dashboard.Edit-page.pages.gallery.gallery-modal')
    <div class="relative max-md:hidden" ondblclick="toggleModal('gallery-1')">

        @if(isset($galleryWelcome))
            <img src="{{ asset('storage/asset/gallery/'.$galleryWelcome->img_path) }}" />
        @else   
            <img src="{{asset('assets/Gallery/bb21e7_e802ac35a1d341eea4ca693b0e4ffdfc~mv2.webp')}}">
        @endif

        <div class="absolute top-0 bottom-0 left-0 right-0 bg-royal_blue bg-opacity-20">
        </div>
        <p
            class="font-oswald text-sunflower_yellow text-[4.5rem] font-bold leading-[1.25em] absolute  top-1/2 -translate-y-1/2 w-[55%] max-lg:w-[70%] left-1/2 -translate-x-[59%]">
            {{ __('general.school_name') }}</p>
    </div>
    <div class="bg-sunflower_yellow pt-8 pb-36 max-lg:pb-20 max-md:pb-10" ondblclick="toggleModal('gallery-2')">
        <h1 class="font-oswald font-medium text-[3.5rem] text-center mb-8">{{ __('gallery.campus_life_title') }}</h1>
        <div class="w-[70%] max-xl:w-[75%] max-lg:w-[85%] max-md:w-[90%] mx-auto grid grid-cols-6 gap-2 max-lg:gap-4">
            @if ($campusLife->count() > 0)
                @foreach ($campusLife as $item)
                    <div class="col-span-2 max-lg:col-span-3 max-md:col-span-full relative">
                        <!-- Cancel Button -->
                        <button class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 hover:bg-red-700" >
                            <a href="{{route('gallery_item_delete_db',$id = $item->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </a>
                        </button>
                        <div class="hover:bg-blue-600 hover:bg-opacity-50 bg-transparent absolute inset-0 heart-container">
                            <svg class="absolute bottom-5 left-5 w-8 h-8 fill-white cursor-pointer heart-empty hidden show"
                                viewBox="0 0 512 512">
                                <path
                                    d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9  c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256,124.8  c-20-26-51-41.8-84.8-41.8C112.1,83,64,131.3,64,190.7c0,27.9,10.6,54.4,29.9,74.6L245.1,418l10.9,11l10.9-11l148.3-149.8  c21-20.3,32.8-47.9,32.8-77.5C448,131.3,399.9,83,340.8,83L340.8,83z" />
                            </svg>
                            <svg class="heart-fill w-8 h-8 absolute bottom-[1.0625rem] left-6 hidden">
                                <g transform="translate(0 -1028.4)">
                                    <path
                                        d="m7 1031.4c-1.5355 0-3.0784 0.5-4.25 1.7-2.3431 2.4-2.2788 6.1 0 8.5l9.25 9.8 9.25-9.8c2.279-2.4 2.343-6.1 0-8.5-2.343-2.3-6.157-2.3-8.5 0l-0.75 0.8-0.75-0.8c-1.172-1.2-2.7145-1.7-4.25-1.7z"
                                        fill="#c0392b" />
                                </g>
                            </svg>
                        </div>
                        <img class="h-full w-full object-cover" src="{{ asset('storage/asset/gallery/'.$item->img_path) }}" />
                    </div>
                @endforeach
            @endif
            @if (session()->has('gallery-campus'))
                @foreach ( session('gallery-campus') as $key => $item)
                    <div class="col-span-2 max-lg:col-span-3 max-md:col-span-full relative">
                            <!-- Cancel Button -->
                            <button class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 hover:bg-red-700 " >
                                <a href="{{route('gallery_item_delete_session',$id =  $key)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </a>
                            </button>
                            <div class="hover:bg-blue-600 hover:bg-opacity-50 bg-transparent absolute inset-0 heart-container">
                            <svg class="absolute bottom-5 left-5 w-8 h-8 fill-white cursor-pointer heart-empty hidden show"
                                viewBox="0 0 512 512">
                                <path
                                    d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9  c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256,124.8  c-20-26-51-41.8-84.8-41.8C112.1,83,64,131.3,64,190.7c0,27.9,10.6,54.4,29.9,74.6L245.1,418l10.9,11l10.9-11l148.3-149.8  c21-20.3,32.8-47.9,32.8-77.5C448,131.3,399.9,83,340.8,83L340.8,83z" />
                            </svg>
                            <svg class="heart-fill w-8 h-8 absolute bottom-[1.0625rem] left-6 hidden">
                                <g transform="translate(0 -1028.4)">
                                    <path
                                        d="m7 1031.4c-1.5355 0-3.0784 0.5-4.25 1.7-2.3431 2.4-2.2788 6.1 0 8.5l9.25 9.8 9.25-9.8c2.279-2.4 2.343-6.1 0-8.5-2.343-2.3-6.157-2.3-8.5 0l-0.75 0.8-0.75-0.8c-1.172-1.2-2.7145-1.7-4.25-1.7z"
                                        fill="#c0392b" />
                                </g>
                            </svg>
                        </div>
                        <img class="h-full w-full object-cover" src="{{ asset('storage/tmp/gallery/'.$item) }}" />
                    </div>
                @endforeach
            @endif
        </div>

    </div>
    <h2
        class="font-oswald font-medium text-[3.5rem] max-xl:text-[3.125rem] max-lg:text-[2.75rem] max-md:text-[2.375rem] max-sm:text-[2rem] text-center mt-10 mb-12">
        {{ __('gallery.our_activities_title') }}
    </h2>

    @php
        $images = [
            ['class_1' => 'col-span-6 row-span-5 max-lg:col-span-12 max-md:row-span-3'],
            ['class_1' => 'col-span-7 row-span-5 max-lg:col-span-12 max-md:row-span-3'],
            ['class_1' => 'col-span-4 row-span-6 max-lg:col-span-5 max-md:col-span-9 max-md:row-span-4'],
            ['class_1' => 'col-span-7 row-span-6 max-md:col-span-15 max-md:row-span-4'],
            ['class_1' => 'col-span-13 row-span-7 max-lg:col-span-12 max-md:col-span-full max-md:row-span-4'],
            ['class_1' => 'col-span-11 row-span-6 max-lg:col-span-12 max-md:col-span-full max-md:row-span-3'],
            ['class_1' => 'col-span-6 row-span-5 max-lg:col-span-12 max-md:col-span-full max-md:row-span-3'],
            ['class_1' => 'col-span-10 row-span-6 max-md:col-span-12 max-md:row-span-2'],
            ['class_1' => 'col-span-8 row-span-5 max-md:col-span-12 max-md:row-span-2'],
            ['class_1' => 'col-span-6 row-span-5 max-md:col-span-12 max-md:row-span-2'],
            ['class_1' => 'col-span-6 row-span-5 max-lg:col-span-10 max-md:col-span-12 max-md:row-span-2'],
            ['class_1' => 'col-span-2 row-span-5 max-lg:col-span-4 max-md:col-span-full'],
            ['class_1' => 'col-span-5 row-span-4 max-lg:col-span-10 max-md:col-span-full'],
            ['class_1' => 'col-span-5 row-span-4 max-lg:col-span-8 max-md:col-span-full'],
            ['class_1' => 'col-span-5 row-span-4 max-lg:col-span-8 max-md:col-span-16'],
            ['class_1' => 'col-span-4 row-span-3 max-lg:col-span-8 max-lg:row-span-4 max-md:col-span-8'],
            ['class_1' => 'col-span-4 row-span-3 max-lg:col-span-8 max-lg:row-span-1 max-md:col-span-full'],
            ['class_1' => 'col-span-11 row-span-8 max-lg:col-span-16 max-lg:row-span-1 max-md:col-span-full'],
            ['class_1' => 'col-span-8 row-span-5 max-lg:col-span-12 max-lg:row-span-1'],
            ['class_1' => 'col-span-5 row-span-4 max-lg:col-span-12 max-lg:row-span-1'],
        ];
    @endphp

    <div class="grid gap-4 mb-10" style="grid-template-columns: repeat(24, minmax(0, 1fr)); grid-template-rows: repeat(25, minmax(0,50px))" ondblclick="toggleModal('gallery-3')">
        @if ($activities->count() > 0)
            @foreach ($activities as $key => $item)
                <div class="w-full h-full overflow-hidden {{$images[$key]['class_1']}}" >
                    <img class="w-full h-full object-cover animated-element move" src="{{ asset('storage/asset/gallery/'.$item->img_path) }}" />
                </div>
            @endforeach
        @endif
    </div>
@endsection
