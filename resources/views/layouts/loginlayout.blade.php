<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SGPP</title>
    <!-- Favicon -->
    <link href="/imagens/fav.png" rel="shortcut icon"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        
    </style>
</head>
<body>
    <div id="app" style="background-color: rgb(0 162 232);height:100%">
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
