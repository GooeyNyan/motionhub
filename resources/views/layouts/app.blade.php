<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- APP_URL --}}
    <meta name="root-url" content="{{ env("APP_URL") }}">

    <title>{{ config('app.name', 'motionhub') }}</title>

    <meta name="api-token" content="{{ Auth::check() ? "Bearer ".Auth::user()->api_token : ""}}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}" type="image/x-icon"/>
    <!-- Custom Styles -->
    @yield('style')
</head>
<body>
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<!-- Custom Scripts -->
@yield('script')
</body>
</html>
