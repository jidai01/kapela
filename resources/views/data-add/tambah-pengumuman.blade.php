@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        .form-card {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #212d5a;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control,
        .form-select {
            border-radius: 6px;
        }

        .btn-submit {
            background-color: #212d5a;
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #f4f6fa;
            color: #212d5a;
        }

        .btn-back {
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .ql-editor {
            min-height: 200px;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-start mt-5 my-2" style="min-height: 100vh;">
        <div class="form-card">
            <div class="form-title">Form {{ $title }}</div>

            {{-- Error alert --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Success or error message --}}
            @if (session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form action="/kelola/kirim-pengumuman" method="post">
                @csrf

                <div class="mb-2">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        <em class="text-muted">(data wajib diisi)</em>
                    </label>
                </div>

                <div class="mb-3">
                    <label for="judul_pengumuman" class="form-label">Judul Pengumuman<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman"
                        placeholder="judul pengumuman" value="{{ old('judul_pengumuman') }}" required>
                </div>

                <div class="mb-3">
                    <label for="isi_pengumuman" class="form-label">Isi Pengumuman<span class="text-danger">*</span></label>
                    <div id="editor" style="min-height: 200px;">{!! old('isi_pengumuman') !!}</div>
                    <input type="hidden" name="isi_pengumuman" id="isi_pengumuman">
                </div>

                <div class="mb-3">
                    <label for="tanggal_terbit" class="form-label">Tanggal Terbit<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit"
                        value="{{ old('tanggal_terbit') }}" required>
                </div>

                <button type="submit" class="btn btn-submit w-100 mb-3">
                    <i class="bi bi-save"></i> {{ $title }}
                </button>

                <a href="/kelola/data-pengumuman" class="btn btn-outline-secondary w-100 btn-back">
                    <i class="bi bi-arrow-return-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

    {{-- Quill Editor --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        var form = document.querySelector('form');
        form.onsubmit = function() {
            var isi = document.querySelector('input[name=isi_pengumuman]');
            isi.value = quill.root.innerHTML;
        };
    </script>
@endsection
