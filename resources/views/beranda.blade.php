@extends('main')
@section('content')
    <div class="container-fluid p-0 mb-5">

        {{-- CAROUSEL START --}}
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="ratio ratio-21x9">
                        <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="d-block w-100">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><em>"Bersama Membangun Iman Umat Bello yang Beriman dan Bermartabat."</em></h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="ratio ratio-21x9">
                        <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="d-block w-100">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><em>Second slide label</em></h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="ratio ratio-21x9">
                        <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="d-block w-100">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><em>Third slide label</em></h5>
                    </div>
                </div>
            </div>
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
        {{-- CAROUSEL END --}}


    </div>
@endsection
