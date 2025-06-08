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

            <form action="/kelola/kirim-kegiatan-kub" method="post">
                @csrf

                <div class="mb-3">
                    <label for="nama_kegiatan_kub" class="form-label">Nama Kegiatan Kub</label>
                    <input type="text" class="form-control" id="nama_kegiatan_kub" name="nama_kegiatan_kub"
                        placeholder="nama kegiatan kub" required>
                </div>

                <div class="mb-3">
                    <label for="id_kub" class="form-label">Nama Kub</label>
                    <select class="form-control mb-4" name="id_kub">
                        <option value="">-- Pilih Kub --</option>
                        @foreach ($kublist as $kub)
                            <option value="{{ $kub->id_kub }}">{{ $kub->nama_kub }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi"></textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan"
                        placeholder="tanggal kegiatan">
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i>
                    {{ $title }}</button>
                <a href="/kelola/data-kegiatan-kub" class="btn btn-outline-secondary w-100"><i class="bi bi-arrow-return-left"></i>
                    Kembali</a>
            </form>
        </div>
    </div>
@endsection
