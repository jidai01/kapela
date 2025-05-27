@extends('template/main')

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    <!-- Sidebar Start -->
    <div class="d-flex">
        <nav id="sidebarMenu" class="d-lg-block bg-secondary text-white sidebar collapse vh-100 position-fixed">
            <div class="position-sticky p-3 text-center">
                <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" width="60" height="60"
                    class="border border-white rounded-circle mb-2">
                <h4 class="text-white"><strong>Kapela St. Agustinus Bello</strong></h4>

                <hr class="text-white">

                <ul class="nav nav-pills flex-column mb-auto text-center">

                    @if (!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="collapse" href="#profilCollapse"
                                role="button" aria-expanded="false" aria-controls="profilCollapse">
                                Profil
                            </a>
                            <div class="collapse" id="profilCollapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="/profil/sejarah" class="nav-link text-white">Sejarah</a></li>
                                    <li><a href="/profil/organisasi" class="nav-link text-white">Struktur Organisasi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Pengumuman</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Berita</a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-outline-success text-white mt-2" href="/login">LOGIN</a>
                        </li>
                    @else
                        @php $role = Auth::user()->role; @endphp

                        @if (in_array($role, ['admin', 'humas']))
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle text-white" data-bs-toggle="collapse"
                                    href="#dataCollapse" role="button" aria-expanded="false" aria-controls="dataCollapse">
                                    Data
                                </a>
                                <div class="collapse" id="dataCollapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        @if ($role === 'admin')
                                            <li><a href="/kelola/data-user" class="nav-link text-white">User</a></li>
                                            <li><a href="/kelola/data-wilayah" class="nav-link text-white">Wilayah</a></li>
                                            <li><a href="/kelola/data-kub" class="nav-link text-white">KUB</a></li>
                                            <li><a href="/kelola/data-sakramen" class="nav-link text-white">Sakramen</a>
                                            </li>
                                            <li><a href="/kelola/data-umat" class="nav-link text-white">Umat</a></li>
                                            <li><a href="/kelola/data-kegiatan-wilayah" class="nav-link text-white">Kegiatan
                                                    Wilayah</a></li>
                                            <li><a href="/kelola/data-kegiatan-kub" class="nav-link text-white">Kegiatan
                                                    KUB</a></li>
                                            <li><a href="/kelola/data-penerimaan-sakramen"
                                                    class="nav-link text-white">Penerimaan Sakramen</a></li>
                                        @endif
                                        <li><a href="/kelola/data-pengumuman" class="nav-link text-white">Pengumuman</a>
                                        </li>
                                        <li><a href="/kelola/data-berita" class="nav-link text-white">Berita</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (in_array($role, ['admin', 'ketua']))
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle text-white" data-bs-toggle="collapse"
                                    href="#laporanCollapse" role="button" aria-expanded="false"
                                    aria-controls="laporanCollapse">
                                    Laporan
                                </a>
                                <div class="collapse" id="laporanCollapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="/laporan/kegiatan-wilayah" class="nav-link text-white">Kegiatan
                                                Wilayah</a></li>
                                        <li><a href="/laporan/kegiatan-kub" class="nav-link text-white">Kegiatan KUB</a>
                                        </li>
                                        <li><a href="/laporan/penerimaan-sakramen" class="nav-link text-white">Penerimaan
                                                Sakramen</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        <li class="nav-item mt-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger text-white w-100">Logout</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="flex-grow-1 ms-lg-250 p-4" style="margin-left: 250px;">
            <!-- Content here -->
        </main>
    </div>
    <!-- Sidebar End -->
@endsection
