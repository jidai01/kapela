@extends('template.main')

@section('menu-navbar')
    @include('template.navbar')
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap');

        .berita-section {
            padding: 3rem 1rem;
            background-color: #f9f9f9;
            font-family: 'Montserrat', sans-serif;
        }

        .berita-title {
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

        .berita-card {
            width: 100%;
            max-width: 950px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            transition: transform 0.2s ease;
        }

        .berita-card:hover {
            transform: scale(1.01);
        }

        .berita-card .card-title {
            font-size: 1.25rem;
            color: #212d5a;
            font-weight: 600;
        }

        .berita-card .card-text {
            font-size: 0.95rem;
            color: #555;
        }

        .berita-card small {
            font-size: 0.85rem;
        }

        .berita-card .btn-primary {
            background-color: #212d5a;
            border: none;
            font-size: 0.9rem;
        }

        .berita-card .btn-primary:hover {
            background-color: #1a2348;
        }

        .berita-image {
            max-height: 180px;
            width: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .no-data {
            font-style: italic;
            color: #888;
        }
    </style>

    <div class="container-fluid berita-section">
        <div class="berita-title">
            {{ $title }}
        </div>

        <div class="d-flex flex-column align-items-center">
            @forelse($berita as $item)
                <div class="card berita-card mb-4">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul_berita }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($item->isi_berita), 100) }}</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Diterbitkan pada {{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d M Y') }}
                                    </small>
                                </p>
                                <a href="{{ url('berita/' . $item->slug) }}" class="btn btn-sm btn-primary">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="berita-image" alt="Foto Berita">
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center no-data">Belum ada berita.</p>
            @endforelse

            <div class="mt-4">
                {{ $berita->links() }}
            </div>
        </div>
    </div>
@endsection
