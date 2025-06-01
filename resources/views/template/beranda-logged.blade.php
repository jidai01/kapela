<div class="container my-5">
    @if (Auth::check())
        @php $role = Auth::user()->role; @endphp
        <h1 class="text-center mb-4">Selamat Datang {{ ucfirst(strtolower($role)) }}</h1>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

            {{-- Menu untuk Admin dan Humas --}}
            @if (in_array($role, ['admin', 'humas']))
                @if ($role === 'admin')
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title">Data User</h5>
                                <a class="btn btn-primary mt-3" href="/kelola/data-user"><i class="bi bi-arrow-right"></i> Masuk</a>
                            </div>
                        </div>
                    </div>

                    @php
                        $adminMenus = [
                            ['title' => 'Data Wilayah', 'url' => '/kelola/data-wilayah'],
                            ['title' => 'Data KUB', 'url' => '/kelola/data-kub'],
                            ['title' => 'Data Sakramen', 'url' => '/kelola/data-sakramen'],
                            ['title' => 'Data Umat', 'url' => '/kelola/data-umat'],
                            ['title' => 'Data Kegiatan Wilayah', 'url' => '/kelola/data-kegiatan-wilayah'],
                            ['title' => 'Data Kegiatan KUB', 'url' => '/kelola/data-kegiatan-kub'],
                            ['title' => 'Data Penerimaan Sakramen', 'url' => '/kelola/data-penerimaan-sakramen'],
                        ];
                    @endphp

                    @foreach ($adminMenus as $menu)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title">{{ $menu['title'] }}</h5>
                                    <a class="btn btn-primary mt-3" href="{{ $menu['url'] }}"><i class="bi bi-arrow-right"></i> Masuk</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- Menu Humas dan Admin --}}
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">Data Pengumuman</h5>
                            <a class="btn btn-primary mt-3" href="/kelola/data-pengumuman"><i class="bi bi-arrow-right"></i> Masuk</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">Data Berita</h5>
                            <a class="btn btn-primary mt-3" href="/kelola/data-berita"><i class="bi bi-arrow-right"></i> Masuk</a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Menu Laporan --}}
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
                                <a class="btn btn-primary mt-3" href="{{ $menu['url'] }}"><i class="bi bi-arrow-right"></i> Masuk</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            {{-- Logout --}}
            <div class="col">
                <div class="card h-100 shadow-sm bg-danger text-white">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">Logout</h5>
                        <a class="btn btn-light mt-3" href="/logout"><i class="bi bi-box-arrow-right"></i> Keluar</a>
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>
