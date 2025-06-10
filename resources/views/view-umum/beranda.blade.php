@extends('template/main')

@php
    $hideFooter = false;
@endphp

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
{{-- <style>
    h5 {
        color: rgb(255, 255, 255);
        font-family: "Changa One", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.changa-one-regular-italic {
  font-family: "Changa One", sans-serif;
  font-weight: 400;
  font-style: italic;
    }
</style> --}}

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
                        <h5><em>"Bersama Membangun Iman Umat Bello yang Beriman dan Bermartabat."</em></h5>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="carousel-item">
                    <div class="ratio ratio-21x9">
                        <img src="{{ asset('storage/img/c2.jpg') }}" alt="logo-sanbello" class="d-block w-100">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><em>"Bersama Membangun Iman Umat Bello yang Beriman dan Bermartabat."</em></h5>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="carousel-item">
                    <div class="ratio ratio-21x9">
                        <img src="{{ asset('storage/img/c3.jpg') }}" alt="logo-sanbello" class="d-block w-100">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><em>"Bersama Membangun Iman Umat Bello yang Beriman dan Bermartabat."</em></h5>
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

    </div>
@endsection
