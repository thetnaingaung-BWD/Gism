<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/Logo/logo_eng-removebg-preview.webp') }}" />
    <title>{{ __('nav.' . Route::currentRouteName()) }} | GISM</title>
    @vite('resources/css/Customer/app.css')
    @vite('resources/js/Customer/app.js')
    <link rel="stylesheet" href="{{ asset('build/assets/app-DPV_CP_-.css') }}" />
</head>

<body>
    @include('Customer-Dashboard.include.nav')
    @yield('content')
    @include('sweetalert::alert')
    @include('Customer-Dashboard.include.footer')
</body>
<script src="{{ asset('build/assets/app-CpHtIrYO.js') }}"></script>

</html>
