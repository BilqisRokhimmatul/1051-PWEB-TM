<header class="navbar-fixed">
    <div class="nav-container">
        <div class="nav-left">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="nav-logo">
        </div>

        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Cari lapangan kesukaanmu..." onkeyup="handleSearch()">
            <button class="btn-search" onclick="handleSearch()">Cari</button>
        </div>

        <nav class="nav-right">
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{ url('/tentang') }}">Tentang</a>
        </nav>
    </div>
</header>