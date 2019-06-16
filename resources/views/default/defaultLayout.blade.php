<html>
    <head>
        <title>E volunteer</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        @hasSection('content')
            @yield('content')
        @endif

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
