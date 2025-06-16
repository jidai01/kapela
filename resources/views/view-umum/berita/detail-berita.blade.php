@extends('template.main')

@section('menu-navbar')
    @include('template.navbar')
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap');

        .berita-section {
            padding: 3rem 1rem;
            background-color: #f9f9f9;
            font-family: 'Montserrat', sans-serif;
        }

        .berita-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #212d5a;
            font-weight: 700;
            border-top: 3px solid #212d5a;
            border-bottom: 3px solid #212d5a;
            padding: 0.75rem 0;
            margin-bottom: 1rem;
            text-align: center;
        }

        .berita-date {
            font-size: 0.9rem;
            color: #666;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .berita-image {
            max-height: 420px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
        }

        .berita-content {
            max-width: 850px;
            background-color: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            line-height: 1.9rem;
            color: #333;
            text-align: justify;
            text-indent: 2em;
        }

        .btn-kembali {
            background-color: #212d5a;
            color: #fff;
            font-size: 0.9rem;
            padding: 0.5rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 2rem;
            transition: background-color 0.3s ease;
        }

        .btn-kembali:hover {
            background-color: #1a2348;
            color: #fff;
        }
    </style>

    <div class="container-fluid berita-section">
        <div class="berita-title">
            {{ $berita->judul_berita }}
        </div>

        <div class="berita-date">
            <small>Diterbitkan pada {{ \Carbon\Carbon::parse($berita->tanggal_terbit)->format('d M Y') }}</small>
        </div>

        <div class="d-flex justify-content-center mb-4">
            <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid berita-image" alt="Foto Berita">
        </div>

        <div class="d-flex justify-content-center">
            <div class="berita-content">
                {!! $berita->isi_berita !!}
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <a href="/berita" class="btn btn-kembali">
                ← Kembali ke Daftar Berita
            </a>
        </div>
    </div>
@endsection
