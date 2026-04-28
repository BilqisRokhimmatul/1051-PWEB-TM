<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Sistem Booking Lapangan Jember</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('components.navbar')

    <div class="content-spacer"></div>

    @yield('content')

    @include('components.footer')

    <a href="https://wa.me/6285785617164" class="wa-float" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
        <span>Chat</span>
    </a>

    <script src="{{ asset('js/script.js') }}"></script> 
</body>
</html>

