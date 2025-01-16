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
            <a href="{{route('home_reset_btn')}}">Reset</a>
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('home_save_btn')}}">Save</a>
        </button>
      </div>
    </div>
    @include('Admin-Dashboard.Edit-page.pages.home-modal')
    <div class="relative" ondblclick="toggleModal('modal-1','fileInput-1')">
        <img class="w-full h-[88.5svh] max-xl:h-[41.875rem] max-lg:h-[36.25rem] max-md:h-[30.625rem] max-sm:h-[25rem] object-cover"
            src= "{{ session()->has('welcome-media') ?  Storage::url('tmp/home/'.session('welcome-media')['welcome_bg_img'])  : asset("storage/asset/home/".$homeMedia[0]['img_path']) }}"/>

        <div class="absolute top-0 left-0 bottom-0 right-0 bg-black bg-opacity-10"></div>
        <div class="absolute top-1/2 -translate-y-1/2 w-[55%] max-sm:w-[70%] left-1/2 -translate-x-[55%]">
            <p
                class="font-oswald text-sunflower_yellow text-[4.5rem] max-xl:text-[3.8125rem] max-lg:text-[3.125rem] max-md:text-[2.4375rem] max-sm:text-[1.75rem] leading-[1.25em] {{ session()->get('lang', 'en') === 'en' ? 'font-bold' : '' }}">
                {{ session()->has('welcome-content') ? session('welcome-content')['school_name'][session()->get('lang')] :  translate('school_name') }}
            </p>
            <p
                class="font-montserrat text-[1.125rem] max-xl:text-[1.03125rem] max-lg:text-[0.9375rem] max-md:text-[0.84375rem] max-sm:text-[0.75rem] text-white font-bold leading-[1.875em] mt-12">
                {{ session()->has('welcome-content') ? session('welcome-content')['about_school'][session()->get('lang')] : translate('about_school')  }}  </p>
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
    <div ondblclick="toggleModal('modal-2','fileInput-2')">
        <img class="rounded-full p-1 custom-shadow w-[18rem] max-xl:w-[16.78125rem] max-lg:w-[15.5625rem] max-md:w-[14.34375rem] max-sm:w-[13.125rem] mx-auto bg-white mt-36 max-xl:mt-28 max-lg:mt-20 max-md:mt-14 max-sm:mt-10"
            src="{{ session()->has('president-media') ? Storage::url('tmp/home/'.session('president-media')['president_photo']) :  asset('storage/asset/home/'.$homeMedia[1]['img_path'])}}"
            />
        <h1
            class="text-center text-[2.8rem] max-xl:text-[2.490625rem] max-lg:text-[2.18125rem] max-md:text-[1.871875rem] max-sm:text-[1.5625rem] font-oswald font-medium mt-6">
        {{ __('home.welcome') }}</h1>
        <p
            class="font-montserrat w-[56%] max-xl:w-[63.25%] max-lg:w-[70.5%] max-md:w-[77.75%] max-sm:w-[85%] mx-auto text-[1.2rem] max-xl:text-[1.103125rem] max-lg:text-[1.00625rem] max-md:text-[0.909375rem] max-sm:text-[0.8125rem] leading-loose mt-10">
            {{ session()->has('president-content') ? session('president-content')['about'][session()->get('lang')] : translate('about') }}
        </p>
        <p
            class="w-[56%] max-xl:w-[63.25%] max-lg:w-[70.5%] max-md:w-[77.75%] max-sm:w-[85%] mx-auto text-end text-[2rem] max-xl:text-[1.734375rem] max-lg:text-[1.46875rem] max-md:text-[1.203125rem] max-sm:text-[0.9375rem] font-clarendon mt-16 max-md:mt-12 max-sm:mt-8 translate-x-[5%] max-sm:translate-x-0 max-sm:text-center">
            {{ session()->has('president-content') ? session('president-content')['president_name'][session()->get('lang')] : translate('president_name')}}
        </p>
        <div
            class="w-[56%] max-xl:w-[63.25%] max-lg:w-[70.5%] max-md:w-[77.75%] max-sm:w-[85%] mx-auto font-bitter font-extrabold italic text-[1.8rem] max-xl:text-[1.553125rem] max-lg:text-[1.30625rem] max-md:text-[1.059375rem] max-sm:text-[0.8125rem] flex justify-end max-sm:justify-center translate-x-[5%] max-sm:translate-x-0">
            <div class="inline-flex flex-col items-center">
                <span>{{ __('home.president_of') }}</span>
                <span>{{ __('home.school_name_with_location') }}</span>
            </div>
        </div>
    </div>

    <div ondblclick="toggleModal('modal-3','fileInput-3')"
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
                {{ session()->has('vision-mission-content') ? session('vision-mission-content')['vision_context'][session()->get('lang')] : translate('vision_context')}}</p>
            <p
                class="text-[1.5rem] max-xl:text-[1.4375rem] max-lg:text-[1.375rem] max-md:text-[1.3125rem] max-sm:text-[1.25rem] mt-8 max-md:mt-4 max-md:text-center">
                {{ __('home.mission_title') }}</p>
            <p
                class="leading-9 text-[1rem] max-xl:text-[0.953125rem] max-lg:text-[0.90625rem] max-md:text-[0.859375rem] max-sm:text-[0.8125] max-md:text-center">
                {{ session()->has('vision-mission-content') ? session('vision-mission-content')['mission_context'][session()->get('lang')] : translate('mission_context')}}</p>
        </div>
        <img class="w-1/2 max-xl:w-full max-xl:h-[37.5rem] max-lg:h-[31.25] max-md:h-[25rem] max-sm:h-[18.75rem] object-cover"
            src="{{ session()->has('vision-mission-media') ?  Storage::url('tmp/home/'.session('vision-mission-media')['vision_mission_bg']) :  asset('storage/asset/home/'.$homeMedia[2]['img_path']) }}" />
    </div>

    <div ondblclick="toggleModal('modal-4')"
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
                {{ session()->has('contact-info') ? session('contact-info')['campus_address'][session()->get('lang')] :  translate('address') }}</p>
            <p
                class="font-avenir-light mt-3 max-xl:text-[0.96875rem] max-lg:text-[0.93749rem] max-md:text-[0.90624] max-sm:text-[0.875rem]">
                📞{{ session()->has('contact-info') ? session('contact-info')['phone_myanmar'][session()->get('lang')] :  translate('phone_myanmar') }}</p>
            <p
                class="font-avenir-light max-xl:text-[0.96875rem] max-lg:text-[0.93749rem] max-md:text-[0.90624] max-sm:text-[0.875rem]">
                📞{{ session()->has('contact-info') ? session('contact-info')['phone_thailand'][session()->get('lang')] :  translate('phone_thailand') }}</p>
        </div>
        <img class="w-80 h-80 max-xl:w-60 max-xl:h-60" src="{{ asset('assets/Logo/logo_eng-removebg-preview1.webp') }}" />
        <div class="w-1/5 max-xl:w-[25%] max-lg:w-1/2 max-md:w-2/3 max-sm:w-4/5 flex flex-wrap h-full gap-3">
            <input
                class="w-[calc(50%-0.75rem)] max-sm:hidden bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border required"
                placeholder="Name" required>
            <input
                class="w-[calc(50%-0.75rem)] max-sm:w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border required"
                placeholder="Email" type="email" required validate="email">

            <input
                class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                placeholder="Address">
            <div class="w-full max-w-sm min-w-[200px] mt-1">
              <div class="relative mt-2">
                <div class="absolute top-2 left-0 flex items-center pl-3">
                  <button
                    id="dropdownButton"
                    class="h-full text-sm flex justify-center items-center bg-transparent text-black focus:outline-none"
                  >
                    <span id="dropdownSpan">+95</span>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-4 w-4 ml-1"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </button>
                  <div class="h-6 border-l border-black ml-2"></div>
                  <div
                    id="dropdownMenu"
                    class="min-w-[150px] absolute left-0 w-full mt-10 hidden bg-sunflower_yellow border-black rounded-md shadow-lg z-10"
                  >
                    <ul id="dropdownOptions">
                      <li class="px-4 py-2 text-black hover:bg-slate-50 text-sm cursor-pointer " selected data-value="+95">
                        Myanmar (+95)
                      </li>
                      <li class="px-4 py-2 text-black hover:bg-slate-50 text-sm cursor-pointer" data-value="+66">
                        Thailand (+66)
                      </li>
                      </li>
                    </ul>
                  </div>
                </div>
                <input
                  type="tel"
                  class="w-full bg-transparent placeholder:text-black text-black text-sm border-b-[1px] border-black pr-3 pl-20 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                  placeholder="9xxxxxxxxx"
                  pattern="[0-9]*"
                  inputmode="numeric"
                  maxlength="12"
                  id="phoneNumberInput"
                />
              </div>
            </div>
            <input
                class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                placeholder="Subject">
            <textarea
                class="w-full bg-transparent border-b-[1px] h-32 border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border resize-none"
                placeholder="Type your message here..."></textarea>
            <button class="mt-6 w-full bg-black py-3 text-center text-white font-montserrat text-[1rem] hover:opacity-50 transition-.5s" >Send
                Message</button>
        </div>
    </div>
<script>
  // Toggle dropdown menu visibility
  document.getElementById('dropdownButton').addEventListener('click', function (event) {
    event.stopPropagation(); // Prevent event bubbling
    const dropdownMenu = document.getElementById('dropdownMenu');
    dropdownMenu.classList.toggle('hidden');
  });

  // Update country code when an option is selected
  document.getElementById('dropdownOptions').addEventListener('click', function (event) {
    if (event.target.tagName === 'LI') {
      const dataValue = event.target.getAttribute('data-value');
      const input = document.getElementById('phoneNumberInput');
      document.getElementById('dropdownSpan').textContent = dataValue;
      document.getElementById('dropdownMenu').classList.add('hidden');
      dataValue == '+95' ? input.placeholder  = '9xxxxxxxxx' : input.placeholder  = '2xxxxxxx'

    }
  });

  // Close the dropdown if clicked outside
  document.addEventListener('click', function (event) {
    const dropdownMenu = document.getElementById('dropdownMenu');
    const isClickInside =
      document.getElementById('dropdownButton').contains(event.target) ||
      dropdownMenu.contains(event.target);

    if (!isClickInside) {
      dropdownMenu.classList.add('hidden');
    }
  });

  // Limit input to numeric values only and restrict length
  document.getElementById('phoneNumberInput').addEventListener('input', function (e) {
    // Ensure only numeric values
    e.target.value = e.target.value.replace(/\D/g, '').slice(0, 12); // Limit to 12 digits
  });

</script>
@endsection



