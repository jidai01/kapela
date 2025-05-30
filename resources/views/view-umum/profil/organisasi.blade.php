@extends('template/main')

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    <div class="container-fluid p-0 mt-5 mb-5">
        <h4 class="border-top border-bottom border-2 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
            {{ $title }}
        </h4>

        <div class="d-flex justify-content-center">
            <div class="container">

                <!-- PELINDUNG -->
                <h5 class="border border-dark py-1 m-0 mb-3 d-flex justify-content-center" data-bs-toggle="collapse"
                    href="#pelindungCards" role="button" aria-expanded="false" aria-controls="pelindungCards"
                    style="cursor: pointer;">
                    Pelindung
                </h5>

                <div class="collapse" id="pelindungCards">
                    <div class="row justify-content-center mb-3">
                        @for ($i = 0; $i < 2; $i++)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                                <div class="card" style="width: 10rem;">
                                    <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" class="card-img-top">
                                    <div class="card-body px-1">
                                        <h6 class="card-title text-center">nama</h6>
                                        <p class="card-text text-center">posisi</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- PENASIHAT -->
                <h5 class="border border-dark py-1 m-0 mb-3 d-flex justify-content-center"
                    data-bs-toggle="collapse" href="#penasihatCards" role="button" aria-expanded="false"
                    aria-controls="penasihatCards" style="cursor: pointer;">
                    Penasihat
                </h5>

                <div class="collapse" id="penasihatCards">
                    <div class="row justify-content-center mb-3">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                                <div class="card" style="width: 10rem;">
                                    <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" class="card-img-top">
                                    <div class="card-body px-1">
                                        <h6 class="card-title text-center">nama</h6>
                                        <p class="card-text text-center">posisi</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- PENGURUS INTI -->
                <h5 class="border border-dark py-1 m-0 mb-3 d-flex justify-content-center"
                    data-bs-toggle="collapse" href="#pengurusintiCards" role="button" aria-expanded="false"
                    aria-controls="pengurusintiCards" style="cursor: pointer;">
                    Pengurus Inti
                </h5>

                <div class="collapse" id="pengurusintiCards">
                    <!-- Card pertama (terpisah di atas) -->
                    <div class="row justify-content-center mb-3">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                            <div class="card" style="width: 10rem;">
                                <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" class="card-img-top">
                                <div class="card-body px-1">
                                    <h6 class="card-title text-center">nama</h6>
                                    <p class="card-text text-center">posisi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-3">
                        @for ($i = 1; $i < 12; $i++)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                                <div class="card" style="width: 10rem;">
                                    <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" class="card-img-top">
                                    <div class="card-body px-1">
                                        <h6 class="card-title text-center">nama</h6>
                                        <p class="card-text text-center">posisi</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@include('template/bottom')