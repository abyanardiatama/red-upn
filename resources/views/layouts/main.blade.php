<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- icon --}}
    {{-- <link rel="icon" type="/red-logo-nobg.png"  /> --}}
    <link rel="icon" type="image/png" href="/red-logo-nobg.png" />
    {{-- title --}}
    {{-- if request if / return home page title --}}
    @if (request()->is('/'))
        <title>Home Page</title>
    {{-- else if  request /about return about page title --}}
    @elseif (request()->is('about'))
        <title>About Page</title>
    {{-- else if  request /articles return articles page title --}}
    @elseif (request()->is('articles'))
        <title>Articles Page</title>
    {{-- else if  request /articles return articles page title --}}
    @elseif (request()->is('articles/*'))
        <title>Articles Detail Page</title>
    @endif
    
    {{-- poppins font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="font-poppins">
    @include('partials.navbar')
    @yield('container')
</body>
</html>