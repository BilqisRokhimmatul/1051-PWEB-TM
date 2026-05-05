<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Sistem Booking Lapangan Jember</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('scripts')
</head>
<body>

    @include('partials.navbar')

    <div class="content-spacer"></div>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; margin: 20px 5%; border-radius: 5px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <a href="https://wa.me/6285785617164" class="wa-float" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
        <span>Chat</span>
    </a>

    <script src="{{ asset('js/script.js') }}"></script> 
    @stack('scripts')
</body>
</html>