@extends('main')
@section('content')
    <div class="container-fluid p-0 mt-5 mb-5">
        <h4 class="border-top border-bottom border-2 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
            {{ $title }}
        </h4>
        <div class="d-flex justify-content-center">
            <div class="container">

                <!-- PELINDUNG START -->
                <h5 class="border border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center" data-bs-toggle="collapse"
                    href="#pelindungCards" role="button" aria-expanded="false" aria-controls="pelindungCards"
                    style="cursor: pointer;">
                    Pelindung
                </h5>

                <div class="collapse" id="pelindungCards">
                    <div class="container-fluid mb-3 d-flex justify-content-evenly flex-wrap">
                        <div class="card mx-2 mb-3" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2 mb-3" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PELINDUNG END -->

                <!-- PENASIHAT START -->
                <h5 class="border border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center"
                    data-bs-toggle="collapse" href="#penasihatCards" role="button" aria-expanded="false"
                    aria-controls="penasihatCards" style="cursor: pointer;">
                    Penasihat
                </h5>

                <div class="collapse" id="penasihatCards">
                    <div class="container-fluid mb-3 d-flex justify-content-evenly flex-wrap">
                        <div class="card mx-2 mb-3" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2 mb-3" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2 mb-3" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2 mb-3" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2 mb-3" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PENASIHAT END -->

                <!-- PENGURUS INTI START -->
                <h5 class="border border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center"
                    data-bs-toggle="collapse" href="#pengurusintiCards" role="button" aria-expanded="false"
                    aria-controls="pengurusintiCards" style="cursor: pointer;">
                    Pengurus Inti
                </h5>

                <div class="collapse" id="pengurusintiCards">
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PENGURUS INTI END -->

                <!-- SEKSI BIDANG I START -->
                <h5 class="border border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center"
                    data-bs-toggle="collapse" href="#seksibidang1Cards" role="button" aria-expanded="false"
                    aria-controls="seksibidang1Cards" style="cursor: pointer;">
                    Seksi Bidang I
                </h5>

                <div class="collapse" id="seksibidang1Cards">
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang I: Liturgi & Musik Liturgi
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang I: Pewartaan
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang I: Perlengkapan Rohani
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang I: Koster
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEKSI BIDANG I END -->

                <!-- SEKSI BIDANG II START -->
                <h5 class="border border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center"
                    data-bs-toggle="collapse" href="#seksibidang2Cards" role="button" aria-expanded="false"
                    aria-controls="seksibidang2Cards" style="cursor: pointer;">
                    Seksi Bidang II
                </h5>

                <div class="collapse" id="seksibidang2Cards">
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang II: Kerasulan Awam/Keluarga
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang II: Keamanan, Publikasi & Humas
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang II: Karya Misioner/PAR
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang II: Sound System
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEKSI BIDANG II END -->

                <!-- SEKSI BIDANG III START -->
                <h5 class="border border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center"
                    data-bs-toggle="collapse" href="#seksibidang3Cards" role="button" aria-expanded="false"
                    aria-controls="seksibidang3Cards" style="cursor: pointer;">
                    Seksi Bidang III
                </h5>

                <div class="collapse" id="seksibidang3Cards">
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang III: Sosial dan Pemberdayaan Perempuan
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang III: Kesehatan
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang III: Pemberdayaan Ekonomi Umat
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEKSI BIDANG III END -->

                <!-- SEKSI BIDANG IV START -->
                <h5 class="border border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center"
                    data-bs-toggle="collapse" href="#seksibidang4Cards" role="button" aria-expanded="false"
                    aria-controls="seksibidang4Cards" style="cursor: pointer;">
                    Seksi Bidang IV
                </h5>

                <div class="collapse" id="seksibidang4Cards">
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang IV: Perencaan & Pembangunan
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang IV: Pemuda & Olahraga
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="border-top border-bottom border-1 border-dark py-1 m-0 mb-3 d-flex justify-content-center">
                        Seksi Bidang IV: Sarana Prasarana & Aset
                    </h5>
                    <div class="container-fluid mb-3 d-flex justify-content-evenly">
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                        <div class="card mx-2" style="width: 10rem;">
                            <img src="{{ asset('img/logo.jpg') }}" alt="logo-sanbello" class="card-img-top">
                            <div class="card-body px-1">
                                <h6 class="card-title text-center">nama</h6>
                                <p class="card-text text-center">posisi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEKSI BIDANG IV END -->

            </div>
        </div>
    </div>
@endsection
