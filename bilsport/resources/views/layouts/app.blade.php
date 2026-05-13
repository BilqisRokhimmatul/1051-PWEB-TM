<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bilsport Jember</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-color: #FDF5E6; font-family: 'Poppins', sans-serif;">
    
    @include('partials.navbar')

    <div style="height: 100px;"></div> <main>
        {{ $slot }}
    </main>

    @include('partials.footer')

    <a href="https://wa.me/6285785617164" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WA" width="60">
    </a>
</body>
</html>