<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Book') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- TailwindCSs -->
    {{-- <link rel="stylesheet" href="{{ mix('css/tailwind.css') }}"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ elixir("css/app.css") }}">
    @yield('style')

</head>
    <body id="app-layout">
        @include('layouts.partial.navigation')

        <div class="container">
            @yield('content')
        </div>

        @include('layouts.partial.footer')

        <script src="{{ elixir("js/app.js") }}"></script>
        @yield('script')
    </body>
</html>
