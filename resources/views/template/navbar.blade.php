<nav class="navbar navbar-expand-lg bg-secondary pb-0 d-flex flex-column">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center p-3 px-4"
        style="min-height: 80px;">
        <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" width="60" height="60"
            class="border border-white rounded-circle mb-2 mb-md-0 me-md-5">
        <h1 class="text-center m-0 responsive-heading"><strong>Kapela St. Agustinus Bello</strong></h1>
    </div>

    <div class="container-fluid border-top border-2 border-dark d-flex justify-content-center">
        <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex justify-content-center align-items-center text-center">
                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link py-1" href="/">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link py-1 dropdown-toggle" href="/profil" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Profil</a>
                        <ul class="dropdown-menu p-0 py-1">
                            <li>
                                <a class="dropdown-item d-flex justify-content-center"
                                    href="/profil/sejarah">Sejarah</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider m-0">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-center"
                                    href="/profil/organisasi">Struktur
                                    Organisasi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="/pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="/berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-success text-light nav-link my-1 py-1" href="/login">LOGIN</a>
                    </li>
                @else
                    @php $role = Auth::user()->role; @endphp

                    @if (in_array($role, ['admin', 'humas']))
                        <li class="nav-item dropdown">
                            <a class="nav-link py-1 dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Data</a>
                            <ul class="dropdown-menu p-0 py-1">
                                @if ($role === 'admin')
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-center"
                                            href="/kelola/data-user">User</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-center"
                                            href="/kelola/data-wilayah">Wilayah</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-center"
                                            href="/kelola/data-kub">KUB</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-center"
                                            href="/kelola/data-sakramen">Sakramen</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-center"
                                            href="/kelola/data-umat">Umat</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-center"
                                            href="/kelola/data-kegiatan-wilayah">Kegiatan
                                            Wilayah</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-center"
                                            href="/kelola/data-kegiatan-kub">Kegiatan
                                            KUB</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-center"
                                            href="/kelola/data-penerimaan-sakramen">Penerimaan
                                            Sakramen</a>
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item d-flex justify-content-center"
                                        href="/kelola/data-pengumuman">Pengumuman</a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex justify-content-center"
                                        href="/kelola/data-berita">Berita</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if (in_array($role, ['admin', 'ketua']))
                        <li class="nav-item dropdown">
                            <a class="nav-link py-1 dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Laporan</a>
                            <ul class="dropdown-menu p-0 py-1">
                                <li>
                                    <a class="dropdown-item d-flex justify-content-center"
                                        href="/laporan/kegiatan-wilayah">Laporan
                                        Kegiatan Wilayah</a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex justify-content-center"
                                        href="/laporan/kegiatan-kub">Laporan
                                        Kegiatan KUB</a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex justify-content-center"
                                        href="/laporan/penerimaan-sakramen">Laporan
                                        Penerimaan Sakramen</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <button type="submit"
                                class="btn btn-outline-danger text-light nav-link my-1 py-1">Logout</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
