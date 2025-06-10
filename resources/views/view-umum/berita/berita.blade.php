@extends('template.main')

@section('menu-navbar')
    @include('template.navbar')
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="container-fluid p-0 mt-5 mb-5">
        <h4 class="border-top border-bottom border-2 border-dark py-1 m-0 mb-3 text-center">
            {{ $title }}
        </h4>

        <div class="d-flex flex-column align-items-center">
            @forelse($berita as $item)
                <div class="card mb-3 w-75">
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
                                <a href="berita/{{ $item->slug }}" class="btn btn-sm btn-primary">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center p-2">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded"
                                alt="Foto Berita" style="max-height: 180px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada berita.</p>
            @endforelse

            <div class="mt-4">
                {{ $berita->links() }}
            </div>
        </div>
    </div>
@endsection
