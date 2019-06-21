<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        .Portfolio {
            position: relative;
            margin: 5px;
            border: 2px solid black;
            float: left;
            width: 180px;
            transition-duration: 0.4s;
            border-radius: 5px;
            animation: winanim 0.5s ;
            -webkit-backface-visibility:visible;
            backface-visibility:visible;
            box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)
        }

        .Portfolio:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
        }

        .Portfolio img {
            width: 100%;
            height: auto;
            border-radius: 5px
        }

        .desc {
            padding: 5px;
            text-align: center;
            font-size: 90%;
            background:black;
            color:white;
        }

        @keyframes winanim {
            0%{opacity:0;transform:scale3d(.3,.3,.3)}
            50%{opacity:1}
            
        }
    </style>
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('js/plugins/purify.min.js') }}"></script>
    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script src="{{ asset('js/locales/es.js') }}"></script> --}}
    @include('sweet::alert')

    @yield('script')
</body>
</html>
