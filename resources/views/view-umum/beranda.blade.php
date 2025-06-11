@extends('template/main')

@php
    $hideFooter = false;
@endphp

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    <div class="container-fluid p-0 mb-5">

        {{-- ========== CAROUSEL START ========== --}}
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

            {{-- Carousel Indicators --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            {{-- Carousel Items --}}
            <div class="carousel-inner">

                {{-- Slide 1 --}}
                <div class="carousel-item active">
                    <div class="ratio ratio-21x9">
                        <img src="{{ asset('storage/img/c1.jpg') }}" alt="logo-sanbello" class="d-block w-100">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h2><em>"Bersama Membangun Iman Umat Bello yang Beriman dan Bermartabat."</em></h2>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="carousel-item">
                    <div class="ratio ratio-21x9">
                        <img src="{{ asset('storage/img/c2.jpg') }}" alt="logo-sanbello" class="d-block w-100">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h2><em>"Bersama Membangun Iman Umat Bello yang Beriman dan Bermartabat."</em></h2>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="carousel-item">
                    <div class="ratio ratio-21x9">
                        <img src="{{ asset('storage/img/c3.jpg') }}" alt="logo-sanbello" class="d-block w-100">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h2><em>"Bersama Membangun Iman Umat Bello yang Beriman dan Bermartabat."</em></h2>
                    </div>
                </div>

            </div>

            {{-- Carousel Controls --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
        {{-- ========== CAROUSEL END ========== --}}

        {{-- ===== PENGUMUMAN DAN JADWAL ===== --}}
        <div class="container my-5">
            <div class="row">
                {{-- Pengumuman --}}
                <div class="col-md-6">
                    <h5 class="fw-bold text-center">PENGUMUMAN</h5>
                    <ul class="list-group mt-3">
                        @foreach ($pengumuman as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="/pengumuman/{{ $item->slug }}" class="text-decoration-none">{{ $item->judul_pengumuman }}</a>
                                    <div class="small text-muted">
                                        {{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d F Y') }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Jadwal --}}
                <div class="col-md-6">
                    <h5 class="fw-bold text-center">JADWAL</h5>
                    <div class="card mt-3">
                        <div class="card-body text-center">
                            <p class="mb-1"><strong>Misa Mingguan</strong></p>
                            <p class="mb-1">Misa Pertama : 06.00 WITA</p>
                            <p class="mb-0">Misa Kedua : 08.00 WITA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== BERITA ===== --}}
        <div class="container my-5">
            <h5 class="fw-bold text-center mb-4">BERITA</h5>
            @foreach ($berita as $item)
                <div class="row mb-4">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded" alt="Foto Berita">
                    </div>
                    <div class="col-md-9">
                        <h6><strong>{{ $item->judul_berita }}</strong></h6>
                        <p>{{ Str::limit(strip_tags($item->isi_berita), 250, '...') }}</p>
                        <a href="berita/{{ $item->slug }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
