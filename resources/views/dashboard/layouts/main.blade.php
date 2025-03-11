<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- icon --}}
    <link rel="icon" type="image/png" href="/red-logo-nobg.png" />
    {{-- title --}}
    @if (request()->is('dashboard'))
        <title>Dashboard Page</title>
    @elseif (request()->is('dashboard/about'))
        <title>About Page</title>
    @elseif (request()->is('dashboard/articles'))
        <title>Articles Page</title>
    @elseif (request()->is('dashboard/categories'))
        <title>Category Article Page</title>
    @elseif (request()->is('dashboard/members'))
        <title>Members Page</title>
    @elseif (request()->is('dashboard/users'))
        <title>Users Page</title>
    @elseif (request()->is('dashboard/events'))
        <title>Events Page</title>
    @elseif (request()->is('dashboard/carousels'))
        <title>Carousels Page</title>
    @elseif (request()->is('dashboard/orders'))
        <title>Merchandise Orders Page</title>
    
    @endif
    {{-- poppins font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    {{-- CKEditor --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- dark mode --}}
    <script>
        // Immediately check localStorage for dark mode preference
        (function() {
            const isDarkMode = localStorage.getItem('darkMode') === 'true';
            if (isDarkMode) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</head>
<body class="font-poppins dark:bg-gray-900 dark:border-gray-700">
    @include('dashboard.partials.sidebar')
</body>
</html>