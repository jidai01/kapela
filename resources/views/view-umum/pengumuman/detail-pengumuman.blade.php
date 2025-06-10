@extends('template.main')

@section('menu-navbar')
    @include('template.navbar')
@endsection

@section('content')
    <div class="container-fluid p-0 mt-5 mb-5">
        <h4 class="border-top border-bottom border-2 border-dark py-1 m-0 mb-3 text-center">
            {{ $pengumuman->judul_pengumuman }}
        </h4>

        <div class="text-center text-muted mb-3">
            <small>Diterbitkan pada {{ \Carbon\Carbon::parse($pengumuman->tanggal_terbit)->format('d M Y') }}</small>
        </div>

        <div class="d-flex justify-content-center">
            <div class="px-3 px-md-5" style="max-width: 800px; text-align: justify; text-indent: 2em;">
                {!! nl2br(e($pengumuman->isi_pengumuman)) !!}
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a href="/pengumuman" class="btn btn-secondary">
                ← Kembali ke Daftar Pengumuman
            </a>
        </div>
    </div>
@endsection
