@extends('template/main')

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap');

        .pengumuman-section {
            padding: 3rem 1rem;
            background-color: #f9f9f9;
            font-family: 'Montserrat', sans-serif;
        }

        .pengumuman-title {
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

        .pengumuman-card {
            width: 100%;
            max-width: 800px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            transition: transform 0.2s ease;
        }

        .pengumuman-card:hover {
            transform: scale(1.01);
        }

        .pengumuman-card .card-title {
            font-size: 1.2rem;
            color: #212d5a;
            font-weight: 600;
            text-align: center;
        }

        .pengumuman-card .card-text {
            font-size: 0.95rem;
            color: #555;
        }

        .pengumuman-card .btn-primary {
            background-color: #212d5a;
            border: none;
            font-size: 0.9rem;
        }

        .pengumuman-card .btn-primary:hover {
            background-color: #1a2348;
        }

        .no-data {
            font-style: italic;
            color: #888;
        }
    </style>

    <div class="container-fluid pengumuman-section">
        <div class="pengumuman-title">
            {{ $title }}
        </div>

        <div class="d-flex flex-column align-items-center">
            @forelse($pengumuman as $item)
                <div class="card pengumuman-card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul_pengumuman }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($item->isi_pengumuman), 100) }}</p>
                        <p class="card-text">
                            <small class="text-muted">
                                Diterbitkan pada {{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d M Y') }}
                            </small>
                        </p>
                        <div class="text-end">
                            <a href="{{ url('pengumuman/' . $item->slug) }}" class="btn btn-sm btn-primary">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center no-data">Belum ada pengumuman.</p>
            @endforelse

            <div class="mt-4">
                {{ $pengumuman->links() }}
            </div>
        </div>
    </div>
@endsection
