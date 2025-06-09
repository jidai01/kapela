@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-start mt-5 my-2" style="min-height: 100vh;">
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

            <form action="/kelola/update-berita" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-1">
                    <label class="form-label"><span class="text-danger">*</span><em class="text-muted"> (data wajib diisi)</em></label>
                </div>

                <input type="hidden" name="id_berita" value="{{ $berita->id_berita }}">

                <div class="mb-3">
                    <label for="judul_berita" class="form-label">Judul Berita<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                        value="{{ old('judul_berita', $berita->judul_berita) }}" required>
                </div>

                <div class="mb-3">
                    <label for="isi_berita" class="form-label">Isi Berita<span class="text-danger">*</span></label>
                    <div id="editor" style="height: 200px;">
                        {!! old('isi_berita', $berita->isi_berita ?? '') !!}
                    </div>
                    <input type="hidden" name="isi_berita" id="isi_berita">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto<span class="text-danger">*</span></label>
                    <input type="file" class="form-control mb-2" name="foto" placeholder="foto">
                    @if ($berita->foto)
                        <p>Foto Saat Ini:</p>
                        <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid mb-3"
                            style="max-height: 200px;">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="tanggal_terbit" class="form-label">Tanggal Terbit<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit"
                        value="{{ old('tanggal_terbit', $berita->tanggal_terbit) }}" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i> Simpan Perubahan</button>
                <a href="/kelola/data-berita" class="btn btn-outline-secondary w-100"><i
                        class="bi bi-arrow-return-left"></i> Kembali</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            var form = document.querySelector('form');
            var hiddenInput = document.querySelector('#isi_berita');
            hiddenInput.value = quill.root.innerHTML;
            form.onsubmit = function() {
                hiddenInput.value = quill.root.innerHTML;
            };
        });
    </script>
@endsection
