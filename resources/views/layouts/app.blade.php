<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            margin: 0;
            line-height: inherit;
            background-image: url('{{ asset('storage/images/earth.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            min-height: 100vh;
            height: auto;
        }
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen custom-bg">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
