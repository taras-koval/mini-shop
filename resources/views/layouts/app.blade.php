<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-white p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a class="text-lg font-extrabold" href="{{ route('home') }}">{{ config('app.name') }}</a>
        </div>
    </nav>

    <div class="container flex flex-col flex-1 mx-auto my-8">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto">
            <p class="text-center">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
