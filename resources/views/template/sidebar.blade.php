<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }

    #sidebarToggle {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 1001;
    }

    #sidebar {
        width: 25rem;
        padding-top: 60px;
        background-color: #212d5a;
        color: #fff;
        transition: width 0.3s ease;
        overflow: hidden;
    }

    #sidebar.collapsed {
        width: 0 !important;
    }

    #sidebar.collapsed #sidebar-show {
        display: none;
    }

    .navbar-toggler {
        display: inline-block;
        cursor: pointer;
        background: none;
        border: none;
    }

    .bar1,
    .bar2,
    .bar3 {
        width: 1.5rem;
        height: 0.25rem;
        background-color: #212d5a;
        margin: 0.3rem 0;
        transition: 0.4s;
        border-radius: 0.125rem;
    }

    .bar1 {
        background-color: white;
        transform: translateY(0.55rem) rotate(45deg);
    }

    .bar2 {
        background-color: white;
        opacity: 0;
    }

    .bar3 {
        background-color: white;
        transform: translateY(-0.55rem) rotate(-45deg);
    }

    .change .bar1 {
        background-color: #212d5a;
        transform: rotate(0);
    }

    .change .bar2 {
        background-color: #212d5a;
        opacity: 1;
    }

    .change .bar3 {
        background-color: #212d5a;
        transform: rotate(0);
    }

    .sidebar-header {
        width: 20rem;
        min-height: 80px;
        border-bottom: 2px solid #fff;
        text-align: center;
    }

    .sidebar-header img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border: 2px solid #fff;
        border-radius: 50%;
        margin-bottom: 5px;
    }

    .responsive-heading {
        font-size: 1rem;
        font-weight: 600;
        color: #fff;
    }

    .sidebar-nav .nav-link {
        background-color: transparent;
        color: #fff;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar-nav .nav-link:hover {
        background-color: #1a2348;
        color: #fff;
    }

    .sidebar-nav .btn-outline-danger {
        color: #fff;
        border-color: #dc3545;
    }

    .sidebar-nav .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .sidebar-nav .btn-outline-success {
        color: #fff;
        border-color: #28a745;
    }

    .sidebar-nav .btn-outline-success:hover {
        background-color: #28a745;
        color: #fff;
    }
</style>

<!-- Toggle Button -->
<button class="navbar-toggler d-block border-0" type="button" id="sidebarToggle" aria-label="Toggle navigation"
    onclick="myFunction(this)">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
</button>

<!-- Sidebar Navigation -->
<nav class="navbar navbar-expand-lg d-flex flex-column min-vh-100 shadow" id="sidebar">
    <div class="collapse show" id="sidebar-show">
        <div class="container-fluid sidebar-header d-flex flex-column align-items-center justify-content-center p-3">
            <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello">
            <h6 class="responsive-heading">Kapela St. Agustinus Bello</h6>
        </div>

        <div class="container-fluid my-2 pe-2">
            <ul class="navbar-nav sidebar-nav d-flex flex-column w-100">
                @if (Auth::check())
                    @php $role = Auth::user()->role; @endphp
                    <li class="nav-item">
                        <a class="nav-link" href="/beranda/{{ $role }}">
                            Beranda {{ ucfirst(strtolower($role)) }}
                        </a>
                    </li>

                    @if (in_array($role, ['admin', 'humas', 'pengurus']))
                        @if ($role === 'admin')
                            @php
                                $adminLinks = [
                                    ['href' => '/kelola/data-user', 'label' => 'Data User'],
                                    ['href' => '/kelola/data-wilayah', 'label' => 'Data Wilayah'],
                                    ['href' => '/kelola/data-kub', 'label' => 'Data KUB'],
                                    ['href' => '/kelola/data-umat', 'label' => 'Data Umat'],
                                    ['href' => '/kelola/data-kegiatan-wilayah', 'label' => 'Data Kegiatan Wilayah'],
                                    ['href' => '/kelola/data-kegiatan-kub', 'label' => 'Data Kegiatan KUB'],
                                    [
                                        'href' => '/kelola/data-penerimaan-sakramen',
                                        'label' => 'Data Penerimaan Sakramen',
                                    ],
                                ];
                            @endphp
                            @foreach ($adminLinks as $link)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $link['href'] }}">
                                        {{ $link['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        @elseif ($role === 'pengurus')
                            @php
                                $pengurusLinks = [
                                    ['href' => '/kelola/data-umat', 'label' => 'Data Umat'],
                                    ['href' => '/kelola/data-kegiatan-wilayah', 'label' => 'Data Kegiatan Wilayah'],
                                    ['href' => '/kelola/data-kegiatan-kub', 'label' => 'Data Kegiatan KUB'],
                                ];
                            @endphp
                            @foreach ($pengurusLinks as $link)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $link['href'] }}">
                                        {{ $link['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    @endif

                    @if (in_array($role, ['admin', 'humas']))
                        <li><a class="nav-link" href="/kelola/data-pengumuman">Data Pengumuman</a></li>
                        <li><a class="nav-link" href="/kelola/data-berita">Data Berita</a></li>
                    @endif


                    @if (in_array($role, ['admin', 'ketua']))
                        <li><a class="nav-link" href="/laporan/kegiatan-wilayah">Laporan Kegiatan Wilayah</a></li>
                        <li><a class="nav-link" href="/laporan/kegiatan-kub">Laporan Kegiatan KUB</a></li>
                        <li><a class="nav-link" href="/laporan/penerimaan-sakramen">Laporan Penerimaan Sakramen</a></li>
                    @endif

                    <li class="nav-item mt-2">
                        <a class="btn btn-outline-success w-100 text-start" href="/profil-user/{{ Auth::user()->email }}">
                            <i class="bi bi-person-circle me-1"></i> PROFIL
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a class="btn btn-outline-danger w-100 text-start"
                            onclick="return confirm('Yakin ingin keluar?')" href="/logout">
                            <i class="bi bi-box-arrow-right me-1"></i> LOGOUT
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButton = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");

        toggleButton.addEventListener("click", function() {
            sidebar.classList.toggle("collapsed");
        });
    });

    function myFunction(x) {
        x.classList.toggle("change");
    }
</script>
