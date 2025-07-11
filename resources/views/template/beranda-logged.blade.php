@extends('template.main')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f6fa;
        }

        .card-header {
            background-color: #212d5a;
            color: #fff;
        }

        .dashboard-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
        }

        .card-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: #212d5a;
        }

        .btn-dashboard {
            background-color: #212d5a;
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .btn-dashboard:hover {
            background-color: #1a2348;
            color: #fff;
        }

        .btn-logout {
            background-color: #fff;
            color: #1a2348;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background-color: #f8d7da;
            color: #dc3545;
        }

        .btn-profil {
            background-color: #fff;
            color: #1a2348;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .btn-profil:hover {
            background-color: #d4edda;
            color: #28a745;
        }
    </style>

    <div class="container-fluid my-5">
        @if (Auth::check())
            @php
                $name = Auth::user()->name;
                $role = Auth::user()->role;
                $email = Auth::user()->email;
            @endphp

            <div class="card shadow-lg border-0 mt-4">
                <div class="card-header text-white text-center">
                    <h1 class="dashboard-title mb-0">Selamat Datang {{ ucfirst(strtolower($name)) }}
                        ({{ ucfirst(strtolower($role)) }})</h1>
                </div>

                <div class="card-body bg-light p-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 text-center">
                        @if (in_array($role, ['admin', 'humas', 'pengurus']))
                            @if ($role === 'admin')
                                {{-- Data User --}}
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <h5 class="card-title">Data User</h5>
                                            <a class="btn btn-dashboard mt-3" href="/kelola/data-user">
                                                <i class="bi bi-arrow-right"></i> Masuk
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                {{-- Menu Admin --}}
                                @php
                                    $adminMenus = [
                                        ['title' => 'Data Wilayah', 'url' => '/kelola/data-wilayah'],
                                        ['title' => 'Data KUB', 'url' => '/kelola/data-kub'],
                                        ['title' => 'Data Umat', 'url' => '/kelola/data-umat'],
                                        ['title' => 'Data Kegiatan Wilayah', 'url' => '/kelola/data-kegiatan-wilayah'],
                                        ['title' => 'Data Kegiatan KUB', 'url' => '/kelola/data-kegiatan-kub'],
                                        [
                                            'title' => 'Data Penerimaan Sakramen',
                                            'url' => '/kelola/data-penerimaan-sakramen',
                                        ],
                                    ];
                                @endphp

                                @foreach ($adminMenus as $menu)
                                    <div class="col">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <h5 class="card-title">{{ $menu['title'] }}</h5>
                                                <a class="btn btn-dashboard mt-3" href="{{ $menu['url'] }}">
                                                    <i class="bi bi-arrow-right"></i> Masuk
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @elseif ($role === 'pengurus')
                                {{-- Menu Pengurus --}}
                                @php
                                    $pengurusMenus = [
                                        ['title' => 'Data Umat', 'url' => '/kelola/data-umat'],
                                        ['title' => 'Data Kegiatan Wilayah', 'url' => '/kelola/data-kegiatan-wilayah'],
                                        ['title' => 'Data Kegiatan KUB', 'url' => '/kelola/data-kegiatan-kub'],
                                    ];
                                @endphp

                                @foreach ($pengurusMenus as $menu)
                                    <div class="col">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <h5 class="card-title">{{ $menu['title'] }}</h5>
                                                <a class="btn btn-dashboard mt-3" href="{{ $menu['url'] }}">
                                                    <i class="bi bi-arrow-right"></i> Masuk
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if (in_array($role, ['admin', 'humas']))
                                {{-- Menu Admin & Humas --}}
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <h5 class="card-title">Data Pengumuman</h5>
                                            <a class="btn btn-dashboard mt-3" href="/kelola/data-pengumuman">
                                                <i class="bi bi-arrow-right"></i> Masuk
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <h5 class="card-title">Data Berita</h5>
                                            <a class="btn btn-dashboard mt-3" href="/kelola/data-berita">
                                                <i class="bi bi-arrow-right"></i> Masuk
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        @if (in_array($role, ['admin', 'ketua']))
                            @php
                                $laporanMenus = [
                                    ['title' => 'Laporan Kegiatan Wilayah', 'url' => '/laporan/kegiatan-wilayah'],
                                    ['title' => 'Laporan Kegiatan KUB', 'url' => '/laporan/kegiatan-kub'],
                                    ['title' => 'Laporan Penerimaan Sakramen', 'url' => '/laporan/penerimaan-sakramen'],
                                ];
                            @endphp

                            @foreach ($laporanMenus as $menu)
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <h5 class="card-title">{{ $menu['title'] }}</h5>
                                            <a class="btn btn-dashboard mt-3" href="{{ $menu['url'] }}">
                                                <i class="bi bi-arrow-right"></i> Masuk
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        {{-- Profil --}}
                        <div class="col">
                            <div class="card h-100 shadow-sm bg-success text-white">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title text-white">Profil</h5>
                                    <a class="btn btn-profil mt-3" href="/profil-user/{{ $email }}">
                                        <i class="bi bi-person-circle"></i> Lihat Profil
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Logout --}}
                        <div class="col">
                            <div class="card h-100 shadow-sm bg-danger text-white">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title text-white">Logout</h5>
                                    <a class="btn btn-logout mt-3" href="/logout"
                                        onclick="return confirm('Yakin ingin keluar?')">
                                        <i class="bi bi-box-arrow-right"></i> Keluar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
