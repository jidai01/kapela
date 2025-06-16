@extends('template/main')

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap');

        .struktur-section {
            padding: 3rem 1rem;
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
        }

        .struktur-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #212d5a;
            font-weight: 700;
            border-top: 3px solid #212d5a;
            border-bottom: 3px solid #212d5a;
            padding: 0.75rem 0;
            margin-bottom: 2rem;
            text-align: center;
        }

        .struktur-heading {
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
            color: #212d5a;
            background-color: #ffffff;
            border: 2px solid #212d5a;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .struktur-heading:hover {
            background-color: #212d5a;
            color: white;
        }

        .struktur-card {
            width: 10rem;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .struktur-card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .struktur-card .card-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #212d5a;
        }

        .struktur-card .card-text {
            font-size: 0.85rem;
            color: #555;
        }

        @media (max-width: 768px) {
            .struktur-title {
                font-size: 1.4rem;
            }
        }
    </style>

    <div class="container-fluid struktur-section">
        <div class="struktur-title">
            {{ $title }}
        </div>

        <div class="container">

            <!-- BAGIAN: Pelindung -->
            <div class="mb-3">
                <h5 class="struktur-heading mb-3" data-bs-toggle="collapse" href="#pelindungCards" role="button"
                    aria-expanded="false" aria-controls="pelindungCards">
                    Pelindung
                </h5>

                <div class="collapse" id="pelindungCards">
                    <div class="row justify-content-center mb-3">
                        @for ($i = 0; $i < 2; $i++)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                                <div class="card struktur-card">
                                    <img src="{{ asset('storage/img/logo.png') }}" alt="logo" class="card-img-top">
                                    <div class="card-body text-center px-1">
                                        <h6 class="card-title">nama</h6>
                                        <p class="card-text">posisi</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- BAGIAN: Penasihat -->
            <div class="mb-3">
                <h5 class="struktur-heading mb-3" data-bs-toggle="collapse" href="#penasihatCards" role="button"
                    aria-expanded="false" aria-controls="penasihatCards">
                    Penasihat
                </h5>

                <div class="collapse" id="penasihatCards">
                    <div class="row justify-content-center mb-3">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                                <div class="card struktur-card">
                                    <img src="{{ asset('storage/img/logo.png') }}" alt="logo" class="card-img-top">
                                    <div class="card-body text-center px-1">
                                        <h6 class="card-title">nama</h6>
                                        <p class="card-text">posisi</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- BAGIAN: Pengurus Inti -->
            <div class="mb-3">
                <h5 class="struktur-heading mb-3" data-bs-toggle="collapse" href="#pengurusintiCards" role="button"
                    aria-expanded="false" aria-controls="pengurusintiCards">
                    Pengurus Inti
                </h5>

                <div class="collapse" id="pengurusintiCards">
                    <div class="row justify-content-center mb-3">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                            <div class="card struktur-card">
                                <img src="{{ asset('storage/img/logo.png') }}" alt="logo" class="card-img-top">
                                <div class="card-body text-center px-1">
                                    <h6 class="card-title">nama</h6>
                                    <p class="card-text">posisi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-3">
                        @for ($i = 1; $i < 12; $i++)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                                <div class="card struktur-card">
                                    <img src="{{ asset('storage/img/logo.png') }}" alt="logo" class="card-img-top">
                                    <div class="card-body text-center px-1">
                                        <h6 class="card-title">nama</h6>
                                        <p class="card-text">posisi</p>
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
