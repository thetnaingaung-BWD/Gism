<?php
$selectedLanguage = session()->get('lang', 'en');
$selectedLanguageImage;
$selectedLanguageText;
switch ($selectedLanguage) {
    case 'th':
        $selectedLanguageImage = asset('assets/Icon/THA.png');
        $selectedLanguageText = 'ไทย';
        break;
    case 'zh':
        $selectedLanguageImage = asset('assets/Icon/CHN.png');
        $selectedLanguageText = '中文';
        break;
    default:
        $selectedLanguageImage = asset('assets/Icon/GBR.png');
        $selectedLanguageText = 'English';
        break;
}
?>

<div class="h-[18.5svh] max-lg:hidden"></div>

<div class="h-[18.5svh] lg:fixed z-10 top-0 left-0 right-0 flex items-center pl-36 pr-48 max-sm:pl-8 max-sm:pr-14 justify-between"
    id="nav-container">
    <img class="w-24" src="{{ asset('assets/Logo/logo_eng-removebg-preview.webp') }}" />
    <div class="flex max-lg:hidden items-center">
        <a href="{{ route('admin-home') }}"
            class="font-montserrat hover:bg-alabaster text-[1.0625rem] px-4 cursor-pointer {{ Route::is('admin-home') ? 'bg-light_beige' : '' }}">{{ __('nav.home') }}</a>
        <a href="{{ route('admin-about') }}"
            class="font-montserrat hover:bg-alabaster text-[1.0625rem] px-4 cursor-pointer {{ Route::is('admin-about') ? 'bg-light_beige' : '' }}">{{ __('nav.about') }}</a>
        <a href="{{ route('admin-program') }}"
            class="font-montserrat hover:bg-alabaster text-[1.0625rem] px-4 cursor-pointer {{ Route::is('admin-program') ? 'bg-light_beige' : '' }}">{{ __('nav.programs') }}</a>
        <a href="{{ route('admin-gallery') }}"
            class="font-montserrat hover:bg-alabaster text-[1.0625rem] px-4 cursor-pointer {{ Route::is('admin-gallery') ? 'bg-light_beige' : '' }}">{{ __('nav.gallery') }}</a>
        <a href="{{ route('admin-faq') }}"
            class="font-montserrat hover:bg-alabaster text-[1.0625rem] px-4 cursor-pointer {{ Route::is('admin-faq') ? 'bg-light_beige' : '' }}">{{ __('nav.faq') }}</a>
        <a href="{{ route('admin-enquire') }}"
            class="font-montserrat hover:bg-alabaster text-[1.0625rem] px-4 cursor-pointer {{ Route::is('admin-enquire') ? 'bg-light_beige' : '' }}">{{ __('nav.enquire') }}</a>
    </div>
    <div class="flex items-center gap-16 max-lg:hidden">
        <div class="flex gap-2 max-xl:hidden">
            <a href="https://www.facebook.com/wix"><img class="w-5"
                    src="{{ asset('assets/Icon/Facebook (1).webp') }}" /></a>
            <a href="https://www.twitter.com/wix"><img class="w-5"
                    src="{{ asset('assets/Icon/Twitter.webp') }}" /></a>
            <a href="https://www.linkedin.com/company/wix-com"><img class="w-5"
                    src="{{ asset('assets/Icon/LinkedIn.webp') }}" /></a>
        </div>
        <div class="relative">
            <div id="language-select" value="{{ $selectedLanguage }}"
                class="bg-warm_gray py-2 px-3 rounded-tl-lg rounded-tr-lg rounded-bl-lg rounded-br-lg gap-2 cursor-pointer flex hover-parent">
                <img id="language-image" src="{{ $selectedLanguageImage }}" class="w-6" />
                <p id="language-text" class="font-avenir-light">{{ $selectedLanguageText }}</p>
                <svg class="w-6 ms-6" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1"
                    viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <polygon points="396.6,160 416,180.7 256,352 96,180.7 115.3,160 256,310.5 " />
                </svg>
            </div>
            <div id="language-select-container" class="absolute w-full"></div>
        </div>
    </div>
    <div class="flex flex-col w-8 h-4 gap-2 menu-bar lg:hidden relative z-20">
        <div id="hamburger-bar" class="w-full h-full">
            <span class="w-full border border-black bg-black absolute top-0 hamburger-bar-1 rounded-full"></span>
            <span
                class="w-full border-[1.5px] border-black absolute top-1/2 -translate-y-1/2 hamburger-bar-2 rounded-full"></span>
            <span class="w-full border-2 rounded-full border-black bg-black absolute top-full hamburger-bar-3"></span>
        </div>
        <div id="language-select-container-2" class="absolute top-0 right-0 -translate-y-[130%] hidden">
            <img id="language-image-2" src="{{ $selectedLanguageImage }}"
                class="absolute top-1/2 -translate-y-1/2 w-6 left-3" />
            <select id="language-select-2" class="bg-alabaster pr-4 pl-10 py-1 rounded-xl"
                style="-webkit-appearance: none; -moz-appearance: none; appearance: none;">
                <option value="en" <?= $selectedLanguage === 'en' ? 'selected' : '' ?>>English</option>
                <option value="th" <?= $selectedLanguage === 'th' ? 'selected' : '' ?>>ไทย</option>
                <option value="zh" <?= $selectedLanguage === 'zh' ? 'selected' : '' ?>>中文</option>
            </select>
        </div>
    </div>
</div>

<div id="nav-list" class="bg-white fixed inset-0 z-10 flex flex-col items-center pt-24 gap-5"
    style="visibility: hidden;">
    <a href="{{ route('admin-home') }}"
        class="font-avenir-light text-[1.4rem] opacity-75 px-4 cursor-pointer">{{ __('nav.admin-home') }}</a>
    <a href="{{ route('admin-about') }}"
        class="font-avenir-light text-[1.4rem] opacity-75 px-4 cursor-pointer">{{ __('nav.admin-about') }}</a>
    <a href="{{ route('admin-program') }}"
        class="font-avenir-light text-[1.4rem] opacity-75 px-4 cursor-pointer">{{ __('nav.programs') }}</a>
    <a href="{{ route('admin-gallery') }}"
        class="font-avenir-light text-[1.4rem] opacity-75 px-4 cursor-pointer">{{ __('nav.gallery') }}</a>
    <a href="{{ route('admin-faq') }}"
        class="font-avenir-light text-[1.4rem] opacity-75 px-4 cursor-pointer">{{ __('nav.faq') }}</a>
    <a href="{{ route('admin-enquire') }}"
        class="font-avenir-light text-[1.4rem] opacity-75 px-4 cursor-pointer">{{ __('nav.enquire') }}</a>
</div>
