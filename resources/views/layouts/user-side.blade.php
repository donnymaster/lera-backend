<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
</head>
<body>
    <header class="header">
        <nav class="wrapped__nav">
            <div class="container">
               <div class="nav">
                  <div class="nav__logo">
                      <img src="{{ asset('img/logo_end.png') }}" alt="logo-site" class="logo__site">
                  </div>

                  @include('blocks.desktop-menu')

                  @include('blocks.no-login')

                  @include('blocks.mobile-menu')

                  @auth
                      @include('blocks.user-menu')
                  @endauth

               </div>
            </div>
        </nav>

        @yield('content-footer')

    </header>

    @yield('content-main')

    @include('blocks.footer')

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>

    @auth
        <script src="{{ asset('js/menu.js') }}"></script>
    @endauth
    <script src="{{ asset('js/mobile-menu.js') }}"></script>

</body>

</html>
