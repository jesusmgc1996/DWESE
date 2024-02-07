<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        @section('header')
            CABECERA DEL MASTER
        @show

        <div>
            @yield('content')
        </div>

        @section('footer')
            PIE DEL MASTER
        @show
    </body>
</html>