<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Search, compare and track prices of goods and services in Trinidad & Tobago. Upload your prices and earn points. Know a price is right? Verify it by giving it a like for other users to know.">
    <meta name="keywords" content="PriceCheck, Trinidad, Tobago, Price, Prices, Cost, Costs, Goods, Services, Check, Verify, Search, Find, Compare, Track, Vendor, Upload, Consumer">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6NS98YHVSG"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-6NS98YHVSG');
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        <div class="container-lg">
            @include('inc.messages')
            @yield('content')            
            @include('popper::assets')

        </div>
    </div>
</body>
</html>
