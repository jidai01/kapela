<nav class="navbar navbar-expand-lg bg-secondary pb-0 d-flex flex-column">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center p-3 px-4"
        style="min-height: 80px;">
        <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" width="60" height="60"
            class="border border-white rounded-circle mb-2 mb-md-0 me-md-5">
        <h1 class="text-center m-0 responsive-heading">
            <strong>Kapela St. Agustinus Bello</strong>
        </h1>
    </div>

    <div class="container-fluid border-top border-2 border-dark d-flex justify-content-center">
        <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (!Auth::check())
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex justify-content-center text-center">
                    <li class="nav-item">
                        <a class="nav-link py-1" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu p-0 py-1">
                            <li>
                                <a class="dropdown-item d-flex justify-content-center"
                                    href="/profil-sejarah">Sejarah</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider m-0">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-center"
                                    href="/profil-organisasi">Struktur
                                    Organisasi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="#">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="#">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark text-light nav-link py-1" href="/login">LOGIN</a>
                    </li>
                </ul>
            </div>
        @else
            @php
                $role = Auth::user()->role;
            @endphp

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Data
                </a>
                <ul class="dropdown-menu text-start">
                    @if ($role === 'admin')
                        <li><a class="dropdown-item" href="#">User</a></li>
                        <li><a class="dropdown-item" href="#">Wilayah</a></li>
                        <li><a class="dropdown-item" href="#">KUB</a></li>
                        <li><a class="dropdown-item" href="#">Sakramen</a></li>
                        <li><a class="dropdown-item" href="#">Umat</a></li>
                        <li><a class="dropdown-item" href="#">Kegiatan Wilayah</a></li>
                        <li><a class="dropdown-item" href="#">Kegiatan KUB</a></li>
                        <li><a class="dropdown-item" href="#">Penerimaan Sakramen</a></li>
                    @endif

                    @if (in_array($role, ['admin', 'humas']))
                        <li><a class="dropdown-item" href="#">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="#">Berita</a></li>
                    @endif
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Laporan
                </a>
                <ul class="dropdown-menu text-start">
                    @if (in_array($role, ['admin', 'ketua']))
                        <li><a class="dropdown-item" href="#">Laporan Kegiatan Wilayah</a></li>
                        <li><a class="dropdown-item" href="#">Laporan Kegiatan KUB</a></li>
                        <li><a class="dropdown-item" href="#">Laporan Penerimaan Sakramen</a></li>
                    @endif
                </ul>
            </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger text-light my-1">Logout</button>
                </form>
            </li>
        @endif
</nav>
