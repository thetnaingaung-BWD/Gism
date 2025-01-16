@extends('Customer-Dashboard.layout.master')

@section('content')
    <div class="relative">
        <img class="w-full h-[88.5svh] max-xl:h-[41.875rem] max-lg:h-[36.25rem] max-md:h-[30.625rem] max-sm:h-[25rem] object-cover"
            src="{{ asset('storage/asset/home/'.$homeMedia[0]['img_path']) }}" />
        <div class="absolute top-0 left-0 bottom-0 right-0 bg-black bg-opacity-10"></div>
        <div class="absolute top-1/2 -translate-y-1/2 w-[55%] max-sm:w-[70%] left-1/2 -translate-x-[55%]">
            <p
                class="font-oswald text-sunflower_yellow text-[4.5rem] max-xl:text-[3.8125rem] max-lg:text-[3.125rem] max-md:text-[2.4375rem] max-sm:text-[1.75rem] leading-[1.25em] {{ session()->get('lang', 'en') === 'en' ? 'font-bold' : '' }}">
                {{translate('school_name')}}
            </p>
            <p
                class="font-montserrat text-[1.125rem] max-xl:text-[1.03125rem] max-lg:text-[0.9375rem] max-md:text-[0.84375rem] max-sm:text-[0.75rem] text-white font-bold leading-[1.875em] mt-12">
                {{translate('about_school')}}
            </p>
        </div>
        <img class="rotate-180 w-full absolute h-36 max-lg:h-28 max-sm:h-20 -z-10"
            src="{{ asset('assets/General/download.svg') }}">
        <img class="rotate-180 w-full absolute opacity-30 h-40 max-lg:h-32 max-sm:h-24 -z-10"
            src="{{ asset('assets/General/download.svg') }}">
        <img class="rotate-180 w-full absolute opacity-30 h-44 max-lg:h-36 max-sm:h-28 -z-10"
            src="{{ asset('assets/General/download.svg') }}">
        <img class="rotate-180 w-full absolute opacity-30 h-48 max-lg:h-40 max-sm:h-32 -z-10"
            src="{{ asset('assets/General/download.svg') }}">
    </div>
    <img class="rounded-full p-1 custom-shadow w-[18rem] max-xl:w-[16.78125rem] max-lg:w-[15.5625rem] max-md:w-[14.34375rem] max-sm:w-[13.125rem] mx-auto bg-white mt-36 max-xl:mt-28 max-lg:mt-20 max-md:mt-14 max-sm:mt-10"
        src="{{ asset('storage/asset/home/'.$homeMedia[1]['img_path']) }}" />
    <h1
        class="text-center text-[2.8rem] max-xl:text-[2.490625rem] max-lg:text-[2.18125rem] max-md:text-[1.871875rem] max-sm:text-[1.5625rem] font-oswald font-medium mt-6">
    {{ __('home.welcome') }}</h1>


    <p
        class="font-montserrat w-[56%] max-xl:w-[63.25%] max-lg:w-[70.5%] max-md:w-[77.75%] max-sm:w-[85%] mx-auto text-[1.2rem] max-xl:text-[1.103125rem] max-lg:text-[1.00625rem] max-md:text-[0.909375rem] max-sm:text-[0.8125rem] leading-loose mt-10">
        {{ __('home.about') }}
    </p>
    <p
        class="w-[56%] max-xl:w-[63.25%] max-lg:w-[70.5%] max-md:w-[77.75%] max-sm:w-[85%] mx-auto text-end text-[2rem] max-xl:text-[1.734375rem] max-lg:text-[1.46875rem] max-md:text-[1.203125rem] max-sm:text-[0.9375rem] font-clarendon mt-16 max-md:mt-12 max-sm:mt-8 translate-x-[5%] max-sm:translate-x-0 max-sm:text-center">
        {{ __('home.president_name') }}
    </p>
    <div
        class="w-[56%] max-xl:w-[63.25%] max-lg:w-[70.5%] max-md:w-[77.75%] max-sm:w-[85%] mx-auto font-bitter font-extrabold italic text-[1.8rem] max-xl:text-[1.553125rem] max-lg:text-[1.30625rem] max-md:text-[1.059375rem] max-sm:text-[0.8125rem] flex justify-end max-sm:justify-center translate-x-[5%] max-sm:translate-x-0">
        <div class="inline-flex flex-col items-center">
            <span>{{ __('home.president_of') }}</span>
            <span>{{ __('home.school_name_with_location') }}</span>
        </div>
    </div>
    <div
        class="flex bg-royal_blue text-white font-montserrat max-xl:flex-col-reverse relative mt-36 max-xl:mt-28 max-lg:mt-24 max-md:mt-14 max-sm:mt-10">
        <img class="absolute top-0 -translate-y-full w-full h-36 max-lg:h-28 max-sm:h-20 -z-10"
            src="{{ asset('assets/General/download.svg') }}">
        <div class="w-1/2 max-xl:w-full px-36 py-14 max-md:px-16 max-sm:px-8">
            <p
                class="font-oswald text-[2.5rem] max-xl:text-[2.25rem] max-lg:text-[2rem] max-md:text-[1.75rem] max-sm:text-[1.5rem] text-sunflower_yellow max-md:text-center">
                {{ __('home.vision_and_mission') }}</p>
            <p
                class="text-[1.5rem] max-xl:text-[1.4375rem] max-lg:text-[1.375rem] max-md:text-[1.3125rem] max-sm:text-[1.25rem] mt-12 max-md:mt-4 max-md:text-center">
                {{ __('home.vision_title') }}</p>
            <p
                class="leading-9 text-[1rem] max-xl:text-[0.953125rem] max-lg:text-[0.90625rem] max-md:text-[0.859375rem] max-sm:text-[0.8125] max-md:text-center">
                {{ __('home.vision_context') }}</p>
            <p
                class="text-[1.5rem] max-xl:text-[1.4375rem] max-lg:text-[1.375rem] max-md:text-[1.3125rem] max-sm:text-[1.25rem] mt-8 max-md:mt-4 max-md:text-center">
                {{ __('home.mission_title') }}</p>
            <p
                class="leading-9 text-[1rem] max-xl:text-[0.953125rem] max-lg:text-[0.90625rem] max-md:text-[0.859375rem] max-sm:text-[0.8125] max-md:text-center">
                {{ __('home.mission_context') }}</p>
        </div>
        <img class="w-1/2 max-xl:w-full max-xl:h-[37.5rem] max-lg:h-[31.25] max-md:h-[25rem] max-sm:h-[18.75rem] object-cover"
            src="{{ asset('storage/asset/home/'.$homeMedia[2]['img_path']) }}" />
    </div>
    <div
        class="bg-sunflower_yellow flex max-lg:flex-col max-lg:items-center max-lg:gap-10 justify-around pt-28 max-lg:pt-16 max-sm:pt-8 pb-24 max-lg:pb-14 max-sm:pb-10">
        <div class="w-1/5 max-xl:w-[25%] max-lg:w-1/2 max-md:w-2/3 max-sm:w-4/5">
            <p
                class="font-oswald text-[2.5rem] max-xl:text-[2.25rem] max-lg:text-[2rem] max-md:text-[1.75rem] max-sm:text-[1.5rem] font-medium mb-10">
                {{ __('home.get_in_touch') }}</p>
            <p
                class="font-avenir-medium text-opacity-50 max-xl:text-[0.96875rem] max-lg:text-[0.93749rem] max-md:text-[0.90624] max-sm:text-[0.875rem]">
                🏫{{ __('home.campus_address') }}</p>
            <p
                class="font-avenir-light leading-[1.95rem] max-xl:text-[0.96875rem] max-lg:text-[0.93749rem] max-md:text-[0.90624] max-sm:text-[0.875rem]">
                {{ __('home.address') }}</p>
            <p
                class="font-avenir-light mt-3 max-xl:text-[0.96875rem] max-lg:text-[0.93749rem] max-md:text-[0.90624] max-sm:text-[0.875rem]">
                📞{{ __('home.phone_myanmar') }}</p>
            <p
                class="font-avenir-light max-xl:text-[0.96875rem] max-lg:text-[0.93749rem] max-md:text-[0.90624] max-sm:text-[0.875rem]">
                📞{{ __('home.phone_thailand') }}</p>
        </div>
        <img class="w-80 h-80 max-xl:w-60 max-xl:h-60" src="{{ asset('assets/Logo/logo_eng-removebg-preview1.webp') }}" />
        <div class="w-1/5 max-xl:w-[25%] max-lg:w-1/2 max-md:w-2/3 max-sm:w-4/5 flex flex-wrap h-full gap-3">
            <form action="{{route('contact_mail')}}" method="post">
                @csrf
                <input
                    class=" w-[calc(50%-0.75rem)] max-sm:hidden bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border required"
                    placeholder="Name" name="name" value="{{old('name')}}" >
                <input
                    class=" w-[calc(50%-0.75rem)] max-sm:w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border required"
                    placeholder="Email" type="email" name="email" value="{{old('email')}}" >
                    @error('name')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                    @error('email')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror


                <input
                    class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                    placeholder="Address"  name="address" value="{{old('address')}}">
                    @error('address')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror

                <input
                    class=" w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                    placeholder="Subject"  name="subject" value="{{old('subject')}}" >
                    @error('subject')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                <div class="w-full max-w-sm min-w-[200px] mt-1">
                  <div class="relative mt-2">
                    <div class="absolute top-2 left-0 flex items-center pl-3">
                        <select name="country_code" class="h-full text-sm flex justify-center items-center bg-transparent text-black focus:outline-none cursor-pointer" id="dropdownButton">
                            <option value="+95" @if(old('country_code') == "+95") selected @endif class="px-4 py-2 text-black hover:bg-slate-50 text-sm cursor-pointer ">+95</option>
                            <option value="+66" @if(old('country_code') == "+66") selected @endif class="px-4 py-2 text-black hover:bg-slate-50 text-sm cursor-pointer ">+66</option>
                        </select>
                    </div>
                    <input
                      value="{{old('phone')}}"
                      value="+95"
                      type="tel"
                      class="w-full bg-transparent placeholder:text-black text-black text-sm border-b-[1px] border-black pr-3 pl-20 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                      placeholder="9xxxxxxxxx"
                      pattern="[0-9]*"
                      inputmode="numeric"
                      maxlength="12"
                      name="phone"
                      id="phoneNumberInput"
                    />
                    @error('phone')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <textarea
                    class=" w-full bg-transparent border-b-[1px] h-32 border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border resize-none"
                    placeholder="Type your message here..." name='remark'>{{old('remark')}}</textarea>
                    @error('remark')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                <button type="submit" class="mt-6 w-full bg-black py-3 text-center text-white font-montserrat text-[1rem] hover:opacity-50 transition-.5s" >Send
                Message</button>
            </form>
        </div>
    </div>
<script>
        document.getElementById('dropdownButton').addEventListener('click', function (event) {
            const dataValue = document.getElementById('dropdownButton').value;
            const input = document.getElementById('phoneNumberInput');
            document.getElementById('dropdownButton').addEventListener('change',function () {
                input.value =''
            })
            dataValue == '+95' ? input.placeholder  = '9xxxxxxxxx' : input.placeholder  = '2xxxxxxx'
        });

</script>
@endsection
