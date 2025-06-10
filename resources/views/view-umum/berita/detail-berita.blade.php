@extends('template.main')

@section('menu-navbar')
    @include('template.navbar')
@endsection

@section('content')
    <div class="container-fluid p-0 mt-5 mb-5">
        <h4 class="border-top border-bottom border-2 border-dark py-1 m-0 mb-3 text-center">
            {{ $berita->judul_berita }}
        </h4>

        <div class="text-center text-muted mb-3">
            <small>Diterbitkan pada {{ \Carbon\Carbon::parse($berita->tanggal_terbit)->format('d M Y') }}</small>
        </div>

        <div class="d-flex justify-content-center mb-4">
            <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid rounded" alt="Foto Berita"
                style="max-height: 400px; object-fit: cover;">
        </div>

        <div class="d-flex justify-content-center">
            <div class="px-3 px-md-5" style="max-width: 800px; text-align: justify; text-indent: 2em;">
                {!! nl2br(e($berita->isi_berita)) !!}
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a href="/berita" class="btn btn-secondary">
                ← Kembali ke Daftar Berita
            </a>
        </div>
    </div>
@endsection
