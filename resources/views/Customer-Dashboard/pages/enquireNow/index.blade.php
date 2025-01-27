@extends('Customer-Dashboard.layout.master')

@section('content')
    <div class="relative max-lg:hidden">
    @if(isset($enquireMedia[0]))
        <img src="{{ asset('storage/asset/enquire/'.$enquireMedia[0]['img_path']) }}" />
    @else
        <img src="{{asset('assets/Enquire/hero_bg.webp')}}">
    @endif
        <div class="bg-black absolute top-0 right-0 left-0 bottom-0 bg-opacity-20"></div>
        <p
            class="font-oswald text-sunflower_yellow text-[5rem] font-medium leading-[1.5em] absolute top-1/2 w-[55%] max-xl:w-[75%] left-1/2 -translate-x-[59%] -translate-y-[30%]">
            {{ __('general.school_name') }}</p>
    </div>
    <div class="mt-6 flex max-lg:mt-0 max-lg:flex-col max-lg:gap-8">
        <div class="w-1/2 max-lg:w-full">
            <div class="w-3/5 max-md:w-[90%] mx-auto">
                <h2 class="font-oswald font-medium text-[2rem] my-10">{{ __('enquire.enquire_form_title') }}</h2>
                <form method="post" action="{{route('enquire_mail')}}" class="flex flex-wrap gap-3" >
                    @csrf
                    <input value="{{old('name')}}"
                        class="w-[calc(50%-0.4rem)] bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                        placeholder="Name" name="name">
                    <input value="{{old('email')}}"
                        class="w-[calc(50%-0.4rem)] bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border "
                        placeholder="Email" name="email" type="email"  validate="email">
                    @error('name')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                    @error('email')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                    <input value="{{old('TH_ph')}}"
                        class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                        placeholder="Phone Number(Thai)" name="TH_ph">
                    @error('TH_ph')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                    <input value="{{old('MM_ph')}}"
                        class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                        placeholder="Phone Number(Myanmar)" name="MM_ph">
                    @error('MM_ph')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                    <input value="{{old('HEC')}}"
                        class="w-full bg-transparent border-b-[1px] border-black placeholder:text-black placeholder:font-light  py-2 ps-2 hover:border"
                        placeholder="Highest Education Completed" name="HEC">
                    <div class="w-full relative">
                        @error('HEC')
                            <div class=" text-red-800">{{$message}}</div>
                        @enderror
                        <select
                            class="w-full bg-transparent border-b-[1px] border-black text-black font-light py-2 ps-2 hover:border" name="CON">
                            <option class="hidden" disabled selected>Country of Nationality</option>
                            <option value="1" @if(old('CON')== 'Myanmar') selected  @endif class="bg-black text-yellow-400">Myanmar</option>
                            <option value="2" @if(old('CON')== 'Thai') selected  @endif class="bg-black text-yellow-400">Thai</option>
                            <option value="3" @if(old('CON')== 'Malayasia') selected  @endif class="bg-black text-yellow-400">Malayasia</option>
                            <option value="4" @if(old('CON')== 'Indonesia') selected  @endif class="bg-black text-yellow-400">Indonesia</option>
                            <option value="5" @if(old('CON')== 'Philippines') selected  @endif class="bg-black text-yellow-400">Philippines</option>
                            <option value="6" @if(old('CON')== 'Cambodia') selected  @endif class="bg-black text-yellow-400">Cambodia</option>
                            <option value="7" @if(old('CON')== 'Laos') selected  @endif class="bg-black text-yellow-400">Laos</option>
                        </select>
                        @error('CON')
                            <div class=" text-red-800">{{$message}}</div>
                        @enderror
                    </div>
                    <select
                        class="w-full bg-transparent border-b-[1px] border-black text-black font-light  py-2 ps-2 hover:border" name="program">
                        <option class="hidden" disabled selected>Programs Interested In</option>
                        <option value="1" @if(old('program') == "1") selected @endif class="bg-black text-yellow-400">GED</option>
                        <option value="2" @if(old('program') == "2") selected @endif class="bg-black text-yellow-400">Pre-IGSCE</option>
                        <option value="3" @if(old('program') == "3") selected @endif class="bg-black text-yellow-400">IGSCE O Level</option>
                    </select>
                    @error('program')
                        <div class=" text-red-800">{{$message}}</div>
                    @enderror
                    <div class="flex items-center gap-4 my-8">
                        <div class="inline-flex items-center">
                          <label class="flex items-center cursor-pointer relative">
                            <input type="checkbox" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-sunflower_yellow checked:border-sunflower_yellow" id="accept-policy-enquire-checkbox"  />
                            <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            </span>
                          </label>
                        </div>
                        <label id="accept-policy-enquire-label"
                            class="font-avenir-light opacity-85 text-[0.9375rem] cursor-pointer" style="line-height: 1">
                            Gainsville International School Maesai can contact me regarding information on other courses,
                            future events and news updates
                        </label>

                    </div>
                    <button type='submit' class="w-full text-[1.125rem] font-avenir-light bg-black text-white py-2 cursor-not-allowed " disabled id="enquire_btn" >Send Message</button>

                </form>
            </div>
        </div>
        @if(isset($enquireMedia[1]))
        <img class="w-1/2 max-lg:w-full object-cover"
            src="{{ asset('storage/asset/enquire/'.$enquireMedia[1]['img_path']) }}" />
        @else
            <img class="w-1/2 max-lg:w-full object-cover" src="{{asset('assets/Enquire/bb21e7_a33d0ea1148444e78468410a5caf65ee~mv2.webp')}}"/>
        @endif
    </div>
<script>
    const checkbox = document.getElementById('accept-policy-enquire-checkbox');
    checkbox.addEventListener('change', function () {
        const btn = document.getElementById('enquire_btn')
        if (checkbox.checked) {
            btn.classList.remove('cursor-not-allowed');
            btn.classList.add('hover:opacity-50', 'transition-.5s');
            btn.disabled = false;
        } else {
            if (btn.classList.contains('hover:opacity-50') || btn.classList.contains('transition-.5s')) {
                btn.classList.remove('hover:opacity-50', 'transition-.5s' );
                btn.classList.add('cursor-not-allowed');
                btn.disabled = true;
            }
        }
    });
</script>
@endsection
