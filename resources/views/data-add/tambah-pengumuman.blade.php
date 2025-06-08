@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-start mt-5 my-2" style="height: auto !important;">
        <div class="card shadow p-4" style="width: 100%; max-width: 600px;">
            <h4 class="bg-dark text-light text-center mb-4 p-2 rounded">Form {{ $title }}</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/kelola/kirim-pengumuman" method="post">
                @csrf

                <div class="mb-3">
                    <label for="judul_pengumuman" class="form-label">Judul Pengumuman</label>
                    <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman"
                        placeholder="judul pengumuman" required>
                </div>

                <div class="mb-3">
                    <label for="isi_pengumuman" class="form-label">Isi Pengumuman</label>
                    <textarea class="form-control" cols="50" rows="10" id="isi_pengumuman" name="isi_pengumuman" placeholder="isi pengumuman"></textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                    <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit"
                        placeholder="tanggal terbit">
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i>
                    {{ $title }}</button>
                <a href="/kelola/data-pengumuman" class="btn btn-outline-secondary w-100"><i
                        class="bi bi-arrow-return-left"></i> Kembali</a>
            </form>
        </div>
    </div>
@endsection
