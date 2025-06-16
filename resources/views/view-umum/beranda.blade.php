@extends('template/main')

@php
    $hideFooter = false;
@endphp

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    <style>
        /* Font Import */
        @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Cursive&family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6ff;
            color: #212529;
        }

        .berandacarouselh3style {
            background-color: rgba(33, 45, 90, 0.8);
            color: #fff;
            font-family: "Edu NSW ACT Cursive", cursive;
            font-size: 1.5rem;
            padding: 1rem;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .list-group-item {
            transition: background-color 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #eef1ff;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-outline-primary {
            border-radius: 20px;
        }

        h5,
        h6 {
            font-weight: 600;
        }
    </style>

    <div class="container-fluid p-0 mb-5">

        {{-- ========== CAROUSEL START ========== --}}
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="carousel-item @if ($i == 1) active @endif">
                        <div class="ratio ratio-21x9">
                            <img src="{{ asset("storage/img/c$i.jpg") }}" alt="carousel-image-{{ $i }}"
                                class="d-block w-100">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="berandacarouselh3style">
                                <em>"Bersama Membangun Iman Umat Bello yang Beriman dan Bermartabat."</em>
                            </h3>
                        </div>
                    </div>
                @endfor
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
        </div>
        {{-- ========== CAROUSEL END ========== --}}

        {{-- ===== PENGUMUMAN DAN JADWAL ===== --}}
        <div class="container my-5">
            <div class="row g-4">
                {{-- Pengumuman --}}
                <div class="col-md-6">
                    <h5 class="text-center">📢 PENGUMUMAN</h5>
                    <ul class="list-group mt-3">
                        @foreach ($pengumuman as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="/pengumuman/{{ $item->slug }}"
                                        class="text-decoration-none text-primary fw-semibold">
                                        {{ $item->judul_pengumuman }}
                                    </a>
                                    <div class="small text-muted">
                                        {{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d F Y') }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Jadwal --}}
                <div class="col-md-6">
                    <h5 class="text-center">⛪ JADWAL</h5>
                    <div class="card mt-3 bg-light">
                        <div class="card-body text-center">
                            <p class="mb-1"><strong>Misa Mingguan</strong></p>
                            <p class="mb-1">Misa Pertama: <span class="text-primary">06.00 WITA</span></p>
                            <p class="mb-0">Misa Kedua: <span class="text-primary">08.00 WITA</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== BERITA ===== --}}
        <div class="container my-5">
            <h5 class="text-center mb-4">📰 BERITA</h5>
            @foreach ($berita as $item)
                <div class="row mb-4 shadow-sm bg-white rounded p-3">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded" alt="Foto Berita">
                    </div>
                    <div class="col-md-9">
                        <h6 class="text-dark">{{ $item->judul_berita }}</h6>
                        <p class="text-muted">{{ Str::limit(strip_tags($item->isi_berita), 250, '...') }}</p>
                        <a href="berita/{{ $item->slug }}" class="btn btn-outline-primary btn-sm px-3">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
