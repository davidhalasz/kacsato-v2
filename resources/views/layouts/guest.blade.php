<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Kacsa tó</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/jsCalendar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jsCalendar.clean.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script type="text/javascript" src="{{ asset('js/jsCalendar.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/jsCalendar.lang.hu.js')}}"></script>
    </head>
    <body class="font-sans text-gray-900 bg-gray-200 antialiased regularPoppins">
        <div class="min-h-screen">
            @include('layouts.navbar')
            <div class="">
                {{ $slot }}
            </div>
            @include('layouts.footer')
        </div>
    </body>
    
</html>
