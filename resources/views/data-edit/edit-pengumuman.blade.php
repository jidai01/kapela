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

            <form action="/kelola/update-pengumuman" method="POST">
                @csrf
                <input type="hidden" name="id_pengumuman" value="{{ $pengumuman->id_pengumuman }}">

                <div class="mb-3">
                    <label for="judul_pengumuman" class="form-label">Judul Pengumuman</label>
                    <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman"
                        value="{{ old('judul_pengumuman', $pengumuman->judul_pengumuman) }}" required>
                </div>

                <div class="mb-3">
                    <label for="isi_pengumuman" class="form-label">Isi Pengumuman</label>
                    <div id="editor" style="height: 200px;">
                        {!! old('isi_pengumuman', $pengumuman->isi_pengumuman ?? '') !!}
                    </div>
                    <input type="hidden" name="isi_pengumuman" id="isi_pengumuman">
                </div>

                <div class="mb-3">
                    <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                    <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit"
                        value="{{ old('tanggal_terbit', $pengumuman->tanggal_terbit) }}" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i> Simpan Perubahan</button>
                <a href="/kelola/data-pengumuman" class="btn btn-outline-secondary w-100"><i
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
            var hiddenInput = document.querySelector('#isi_pengumuman');
            hiddenInput.value = quill.root.innerHTML;
            form.onsubmit = function() {
                hiddenInput.value = quill.root.innerHTML;
            };
        });
    </script>
@endsection
